<?php
class UsuarioController extends Controller{
    public function index(){
        $this->carregarEstrutura('ConfiguracaoView');
    }   

    public function atualizar(){
        $usuario = unserialize($_SESSION['usuario']);

        $this->carregarEstrutura('AtualizarUsuarioView', $usuario->toArray());
    }

    public function editar(){

        if(empty($_SESSION)){
            header('Location: '.BASE_URL.'/Login');
            return;
        }
        $sessionUser = unserialize($_SESSION['usuario']);

        $usuario = new UsuarioModel();
        $usuario->setId($sessionUser->getId());
        $usuario->setCpf($sessionUser->getCpf());
        $usuario->setNomeMae($sessionUser->getNomeMae());
        $usuario->setNome($sessionUser->getNome());
        $usuario->setDataNascimento($sessionUser->getDataNascimento());
        $usuario->setPerfil($sessionUser->getPerfil());
        $usuario->setLogin($sessionUser->getLogin());

        $usuario->setEmail($_POST['email']);
        $usuario->setCelular($_POST['celular']);
        $usuario->setCep($_POST['cep']);
        $usuario->setNumero($_POST['numero']);
        $usuario->setComplemento($_POST['complemento']);
        $usuario->setBairro($_POST['bairro']);
        $usuario->setCidade($_POST['cidade']);
        $usuario->setEstado($_POST['estado']);
        $usuario->setSenha($_POST['senha']);
        $daoUsuario = new UsuarioDAO();
        $daoUsuario->atualizar($usuario);

        $_SESSION['usuario'] = serialize($usuario);

        header('Location: '.BASE_URL.'/Usuario');
    }
}

?>