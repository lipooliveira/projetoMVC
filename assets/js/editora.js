$(function(){

    var dados = $('#dados-editora').data('editora')
    CarregarDados(dados);

    //* Botão Visualizar Registro */
    $('.visualiza').click(function(event) {
        event.preventDefault(); // Previne o comportamento padrão do link
        $("#boxLocalizar").hide();
        $("#boxCadastro").show();
        $('#salvar').attr("disabled", "disabled");
        $('#formulario :input').attr("disabled", "disabled");

        var id = $(this).data('id');  
        Visualizar(id);
    });  
    /** */

    //* Botão Editar Registro */
    $('.altera').click(function(event) {
        event.preventDefault(); // Previne o comportamento padrão do link
        $("#boxLocalizar").hide();
        $("#boxCadastro").show();
        $('#salvar').removeAttr('disabled');
        $('#formulario :input').removeAttr("disabled");

        var id = $(this).data('id');  
        Visualizar(id);
        $("#acao").val("alterar");
        $('#idRegistro').val(id);
    }); 
    /** */

    //* Botão Excluir Registro */
	var idParaExclusão;
    $('.exclui').click(function(event) {
        event.preventDefault();
        idParaExclusao = $(this).data('id');
        var confirmarExclusao = confirm("Tem certeza de que deseja excluir este registro?");
        
        if (confirmarExclusao) {
            Excluir(idParaExclusao); 
        }
    });
    /** */

});

/**
 * FUNÇÕES EXECUTADAS FORA DO Document Ready Handler
 */

/** Carregar tabela com Registros */
function CarregarDados(dados) { 
    $('#linhas').empty();
    dados.forEach(function(dado, index) { 
        var row = '<tr>' +
            '<td style="width: 10%;">' + dado.idEditora + '</td>' +
            '<td style="width: 20%;">' + dado.nomeEditora + '</td>' +
            '<td style="width: 40%;">' + (dado.endereco ? dado.endereco : "---") + '</td>' +
            '<td style="width: 5%;"><a href="#" class="visualiza" data-id="' + dado.idEditora + '"><i class="fa fa-search"></i></a></td>' +
            '<td style="width: 5%;"><a href="#" class="altera" data-id="' + dado.idEditora + '"><i class="fa fa-pencil"></i></a></td>' +
            '<td style="width: 5%;"><a href="#" class="exclui" data-id="' + dado.idEditora + '"><i class="fa fa-trash"></i></a></td>' +
            '</tr>';
        $('#linhas').append(row);
    });
}
/** */

/** Preencher formulário para nova Editora */
function Adicionar(){
    $("#boxLocalizar").hide();
    $("#boxCadastro").show();
    $('#salvar').removeAttr('disabled');
    $('#formulario :input').removeAttr("disabled");

    $("#acao").val("incluir");
}
/** */

/** Cancelar Operação */
function Cancelar(){
    LimparCampos();
    $("#boxLocalizar").show();
    $("#boxCadastro").hide();
    $('#alerta').fadeOut();   

    var baseUrl = window.location.origin + '/av3-template-mvc/Editora'; // Base URL
    history.replaceState(null, null, baseUrl); 
}
/** */

/** Limpar campos do formulário de Cadastro de Cliente */
function LimparCampos(){
    $('#nome').val('');
    $('#endereco').val('');
}
/** */

/** Desabilitar todos os campos do Formulário */
function DesabilitarCampos(){
    $('#nome').attr("disabled", "disabled");
    $('#endereco').attr("disabled", "disabled");
}
/** */

/** Validar os campos obrigatórios no formulário de editoras */
function ValidarCampos(){
    //Validação de campos
	if ( $('#nome').val() == ''){
		$('#alertaW').fadeIn();
		setTimeout(function(){
			$('#alertaW').fadeOut();
		}, 3000);
		return false;
	}
    return true;
}
/** */

/** Carregar o Registro que deseja visualizar no formulário */
function CarregarEditora(resposta){
    $('#nome').val(resposta.nomeEditora);
    $('#endereco').val(resposta.endereco);
}
/** */


/**
 * 
 * REQUISIÇÕES AJAX 
 */

/** Salvar um NOVO registro de Editora ou uma ATUALIZAÇÃO de Editora */
function Salvar(){
    if (!ValidarCampos()){
        return;
    }

    //Verifica ação: Incluir ou Editar
    if ($("#acao").val() == "incluir"){
        var metodo = 'incluir';
        var parametro = '';
        var href = window.location.origin + '/av3-template-mvc/Editora/' + metodo;
    }else{
        var metodo = 'alterar';
        var parametro = $("#idRegistro").val();
        var href = window.location.origin + '/av3-template-mvc/Editora/' + metodo + '/' + parametro;
    }

    history.replaceState(null, null, href);

    // Serializa os dados do formulário
    var formData = $('#formCadastroEditora').serialize();

    // Envia o formulário usando $.ajax
    $.ajax({
        url: href,  // URL que inclui a classe e o método
        type: 'POST',
        data: formData + '&id=' + encodeURIComponent(parametro),
        success: function() {
            $('#alerta').fadeIn();
            $('#salvar').attr("disabled", "disabled");
            DesabilitarCampos();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Processa erros
            alert('Erro: ' + textStatus + " - " + errorThrown);
        }
    });   
}
/** */

/** Visualizar um Registro de Editora */
function Visualizar(id){
    LimparCampos();
    var parametro = id;  
    var href = window.location.origin + '/av3-template-mvc/Editora/visualizar/' + parametro;
    history.replaceState(null, null, href); 

    $.ajax({
        url: href,
        type: "POST",
        dataType: "json",
        data: {id: parametro},
        success: function(resposta){
            CarregarEditora(resposta);
        }
    });
}
/** */

/** Excluir um registro de Cliente */
function Excluir(id){
    var parametro = id;  
    var href = window.location.origin + '/av3-template-mvc/Editora/excluir/' + parametro;
    history.replaceState(null, null, href); 

    $.ajax({
        url: href,
        method: 'POST',
        data: { id: parametro },
        success: function() {
            $('#confirmacaoExclusaoModal').modal('hide');
            $('#alerta').fadeIn();
            setTimeout(function(){
                $('#alerta').fadeOut();
            }, 3000);

            // Remover a linha da tabela correspondente ao cliente excluído
            $('a.exclui[data-id="' + parametro + '"]').closest('tr').remove();
        },
        error: function(xhr, status, error) {
            // Tratamento de erro
            console.error("Erro ao excluir editora:", error);
        }
    });

    var baseUrl = window.location.origin + '/av3-template-mvc/Editora'; // Base URL
    history.replaceState(null, null, baseUrl); 
}
/** */

/** Realizar um pesquisa de Editoras a partir de um filtro */
function Pesquisar(){

    var parametro = $('#txtpesquisa').val();
    var href = window.location.origin + '/av3-template-mvc/Editora/pesquisar/' + parametro;
    //history.replaceState(null, null, href); 

    $.ajax({
        url: href,
        type: 'POST',
        dataType: 'json',
        data: { pesquisa: parametro },
        success: function(resposta) {
            CarregarDados(resposta);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
/** */

