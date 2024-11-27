<?php
class AuthController extends Controller{

    public function index(){
        $this->carregarEstrutura('RegistroView');
    }

    public function login(){
        $this->carregarEstrutura('LoginView');
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

        $errors = [];
        if($daoUsuario->buscar($obj->getCpf())) {
            $errors[] = 'CPF já cadastrado';
        }
        if($daoUsuario->buscar($obj->getLogin())) {
            $errors[] = 'Login já cadastrado';
        }
        if($daoUsuario->buscar($obj->getEmail())) {
            $errors[] = 'Email já cadastrado';
        }

        if (!empty($errors)) {
            $this->carregarEstrutura('RegistroView');
            echo "<script>document.getElementById('errormessage').innerHTML = '" . implode('<br>', $errors) . "';</script>";
            return;
        }
        
        $daoUsuario->inserir($obj);
        $this->logar($obj->getLogin(), $obj->getSenha());
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
                $daoLog = new LogDAO();
                $modelLog = new LogModel();
                $modelLog->setIdUsuario($usuario->getId());
                $daoLog->inserir($modelLog);
                
                $_SESSION['usuario'] = serialize($usuario);
                header('Location: '.BASE_URL.'/');

            }
            $this->carregarEstrutura('LoginView');
            echo "<script>document.getElementById('errormessage').innerHTML = 'Usuário ou senha incorreta';</script>";
        }
    }

    public function logado()
    {
        if(isset($_SESSION['usuario']))
        {
            $usuario = unserialize($_SESSION['usuario']);
            echo $usuario->getNome();
        }
    }

    public function isMaster()
    {
        if(isset($_SESSION['usuario']))
        {
            $usuario = unserialize($_SESSION['usuario']);
            if($usuario->getPerfil() == 1)
            {
                return true;
            }
        }
        return false;
    }

    public function sair()
    {
        unset($_SESSION['usuario']);
        header('Location: '.BASE_URL.'/');
    }
}
?>