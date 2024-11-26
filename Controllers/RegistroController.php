<?php
class RegistroController extends Controller{

    public function index(){
        $this->carregarEstrutura('RegistroView');
    }
    
    public function incluir()
    {
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $data_nascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : '';
        $nome_mae = isset($_POST['nome_mae']) ? $_POST['nome_mae'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
        $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
        $logradouro = isset($_POST['logradouro']) ? $_POST['logradouro'] : '';
        $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        $login = isset($_POST['login']) ? $_POST['login'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
        
        $obj = new UsuarioModel();
        $obj->setCpf($cpf);
        $obj->setNome($nome);
        $obj->setDataNascimento($data_nascimento);
        $obj->setNomeMae($nome_mae);
        $obj->setEmail($email);
        $obj->setCelular($celular);
        $obj->setCep($cep);
        $obj->setLogradouro($logradouro);
        $obj->setNumero($numero);
        $obj->setComplemento($complemento);
        $obj->setBairro($bairro);
        $obj->setCidade($cidade);
        $obj->setEstado($estado);
        $obj->setLogin($login);
        $obj->setSenha($senha);

        $daoUsuario = new UsuarioDAO();

        if($daoUsuario->buscar($obj->getCpf()))
        {
            $this->carregarEstrutura('RegistroView');
            echo    "<script>
                        document.getElementById('errormessage').innerHTML = 'CPF já cadastrado';
                    </script>";
            return;
        }
        if($daoUsuario->buscar($obj->getLogin()))
        {
            $this->carregarEstrutura('RegistroView');
            echo "<script>document.getElementById('errormessage').innerHTML = 'Login já cadastrado';</script>";
            return;
        }
        if($daoUsuario->buscar($obj->getEmail()))
        {
            $this->carregarEstrutura('RegistroView');
            echo "<script>document.getElementById('errormessage').innerHTML = 'Email já cadastrado';</script>";
            return;
        }
        $daoUsuario->inserir($obj);
        header('Location: /projetoMVC/Dashboard');
    }
}
?>