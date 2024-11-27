<?php
class MasterController extends Controller{

    public function index(){
        $auth = new AuthController();
        if(!$auth->isMaster())
        {
            $this->carregarEstrutura('ErroView');
            exit;
        }
        $this->listarTodos();
    }

    

    public function pesquisar()
    {
        $auth = new AuthController();
        if(!$auth->isMaster())
        {
            $this->carregarEstrutura('ErroView');
            exit;
        }
        $query = isset($_POST['query']) ? $_POST['query'] : '';
        $daoUsuario = new UsuarioDAO();
        $dados = $daoUsuario->buscar($query);

        $dadosArray = array_map(function($obj) {
            return $obj->toArray();
        }, $dados);
        $dadosJson = json_encode($dadosArray);

        $this->carregarEstrutura('MasterView', $dadosJson);        
    }

    public function editar($id)
    {
        $auth = new AuthController();
        if(!$auth->isMaster())
        {
            $this->carregarEstrutura('ErroView');
            exit;
        }
        $daoUsuario = new UsuarioDAO();
        $usuario = $daoUsuario->retornar($id);
        $this->carregarEstrutura('EditarView', $usuario->toArray());
    }

    public function excluir($id)
    {
        $auth = new AuthController();
        if(!$auth->isMaster())
        {
            $this->carregarEstrutura('ErroView');
            exit;
        }
        $daoUsuario = new UsuarioDAO();
        $daoUsuario->deletar($id);
        $this->listarTodos();
    }

    public function atualizar(){
        $auth = new AuthController();
        if(!$auth->isMaster())
        {
            $this->carregarEstrutura('ErroView');
            exit;
        }
        $usuario = new UsuarioModel();
        $usuario->setId($_POST['id']);
        $usuario->setCpf($_POST['cpf']);
        $usuario->setNome($_POST['nome']);
        $usuario->setDataNascimento($_POST['data_nascimento']);
        $usuario->setNomeMae($_POST['nome_mae']);
        $usuario->setEmail($_POST['email']);
        $usuario->setCelular($_POST['celular']);
        $usuario->setCep($_POST['cep']);
        $usuario->setLogradouro($_POST['logradouro']);
        $usuario->setNumero($_POST['numero']);
        $usuario->setComplemento($_POST['complemento']);
        $usuario->setBairro($_POST['bairro']);
        $usuario->setCidade($_POST['cidade']);
        $usuario->setEstado($_POST['estado']);
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setPerfil($_POST['perfil']);

        $daoUsuario = new UsuarioDAO();
        $daoUsuario->atualizar($usuario);
        $this->listarTodos();
    }

    public function listarTodos()
    {
        $daoUsuario = new UsuarioDAO();
        $dados = $daoUsuario->listar();

        $dadosArray = array_map(function($obj) {
            return $obj->toArray();
        }, $dados);
        $dadosJson = json_encode($dadosArray);
        
        $this->carregarEstrutura('MasterView', $dadosJson);        

    }

    public function log($id)
    {
        $auth = new AuthController();
        if(!$auth->isMaster())
        {
            $this->carregarEstrutura('ErroView');
            exit;
        }
        $daoLog = new LogDAO();
        $dados = $daoLog->buscarPorUsuario($id);

        $dadosArray = array();


        $daoUsuario = new UsuarioDAO();
        $usuario = $daoUsuario->retornar($id);
        $nome = $usuario->getNome();
        
        $dadosArray[0] = $nome;

        $dadosArray[1] = array_map(function($obj) {
            return $obj->toArray();
        }, $dados);
        $dadosJson = json_encode($dadosArray);
        $this->carregarEstrutura('LogView', $dadosJson);
    }
}

?>