<?php
class LoginController extends Controller{

    public function index(){
        $this->carregarEstrutura('LoginView');
    }

    public function logar()
    {
        $login = isset($_POST['login']) ? $_POST['login'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

        $daoUsuario = new UsuarioDAO();
        $usuario = $daoUsuario->buscar($login)[0];
        

        if($usuario)
        {
            if($usuario->getSenha() == $senha)
            {
                $_SESSION['usuario'] = $usuario;
                header('Location: '.BASE_URL.'/');
            }
        }else{
            $this->carregarEstrutura('LoginView');
            echo "<script>document.getElementById('errormessage').innerHTML = 'Usuário ou senha incorreta';</script>";
        }
    }
}

?>