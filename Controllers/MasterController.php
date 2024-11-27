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
}

?>