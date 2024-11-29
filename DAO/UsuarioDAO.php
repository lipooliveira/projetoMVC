<?php
require_once 'Conexao.php';

class UsuarioDAO{
    private $con;
    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    private function carregarObjeto($item)
    {
        $obj = new UsuarioModel();
        $obj->setId($item['id']);
        $obj->setNome($item['nome']);
        $obj->setNomeMae($item['nome_mae']);
        $obj->setDataNascimento($item['data_nascimento']);
        $obj->setCpf($item['cpf']);
        $obj->setEmail($item['email']);
        $obj->setCelular($item['celular']);
        $obj->setCep($item['cep']);
        $obj->setLogradouro($item['logradouro']);
        $obj->setNumero($item['numero']);
        $obj->setComplemento($item['complemento']);
        $obj->setBairro($item['bairro']);
        $obj->setCidade($item['cidade']);
        $obj->setEstado($item['estado']);
        $obj->setSenha($item['senha']);
        $obj->setLogin($item['login']);
        $obj->setPerfil($item['perfil']);
        
        return $obj;
  
    }

    public function listar()
    {
        $dados = array();
        $qry = $this->con->query('select * from usuario');
        $dados = $qry->fetchall(PDO::FETCH_ASSOC);

        $listaObjs = array();
        foreach($dados as $dado)
        {
            $listaObjs[] = $this->carregarObjeto($dado);
        }

        return $listaObjs;
    }

    public function inserir($obj)
    {
        $qry = $this->con->prepare('INSERT INTO usuario (cpf, nome, data_nascimento, nome_mae, email, celular, cep, logradouro, numero, complemento, bairro, cidade, estado, login, senha) VALUES (:cpf, :nome, :data_nascimento, :nome_mae, :email, :celular, :cep, :logradouro, :numero, :complemento, :bairro, :cidade, :estado, :login, :senha)' );

        $qry->bindValue(':cpf',             $obj->getCpf());
        $qry->bindValue(':nome',            $obj->getNome());
        $qry->bindValue(':data_nascimento', $obj->getDataNascimento());
        $qry->bindValue(':nome_mae',        $obj->getNomeMae());
        $qry->bindValue(':email',           $obj->getEmail());
        $qry->bindValue(':celular',         $obj->getCelular());
        $qry->bindValue(':cep',             $obj->getCep());
        $qry->bindValue(':logradouro',      $obj->getLogradouro());
        $qry->bindValue(':numero',          $obj->getNumero());
        $qry->bindValue(':complemento',     $obj->getComplemento());
        $qry->bindValue(':bairro',          $obj->getBairro());
        $qry->bindValue(':cidade',          $obj->getCidade());
        $qry->bindValue(':estado',          $obj->getEstado());
        $qry->bindValue(':login',           $obj->getLogin());
        $qry->bindValue(':senha',           $obj->getSenha());
        $qry->execute();
          
    }

    public function retornar($id)
    {
        $qry = $this->con->query('select * from usuario where id='.$id);
        $dado = $qry->fetch(PDO::FETCH_ASSOC);
        $obj = $this->carregarObjeto($dado);
        return $obj;
    }

    public function atualizar($obj) 
    {
        $qry = $this->con->prepare('UPDATE usuario SET cpf = :cpf, nome = :nome, data_nascimento = :data_nascimento, nome_mae = :nome_mae, email = :email, celular = :celular, cep = :cep, logradouro = :logradouro, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, estado = :estado, login = :login, senha = :senha, perfil = :perfil WHERE id =:id');
        
        $qry->bindValue(':id',              $obj->getId());
        $qry->bindValue(':cpf',             $obj->getCpf());
        $qry->bindValue(':nome',            $obj->getNome());
        $qry->bindValue(':data_nascimento', $obj->getDataNascimento());
        $qry->bindValue(':nome_mae',        $obj->getNomeMae());
        $qry->bindValue(':email',           $obj->getEmail());
        $qry->bindValue(':celular',         $obj->getCelular());
        $qry->bindValue(':cep',             $obj->getCep());
        $qry->bindValue(':logradouro',      $obj->getLogradouro());
        $qry->bindValue(':numero',          $obj->getNumero());
        $qry->bindValue(':complemento',     $obj->getComplemento());
        $qry->bindValue(':bairro',          $obj->getBairro());
        $qry->bindValue(':cidade',          $obj->getCidade());
        $qry->bindValue(':estado',          $obj->getEstado());
        $qry->bindValue(':login',           $obj->getLogin());
        $qry->bindValue(':senha',           $obj->getSenha());
        $qry->bindValue(':perfil',          $obj->getPerfil());
        $qry->execute();
   
    }

    public function deletar($id)
    {
        $qry = $this->con->prepare('DELETE FROM usuario WHERE id =:id');
        $qry->bindValue(':id', $id);
        $qry->execute();
    }

    public function buscarUsuario($login){
        $qry = $this->con->query('select * from usuario where login="'.$login.'"');
        $dado = $qry->fetch(PDO::FETCH_ASSOC);
        $obj = $this->carregarObjeto($dado);
        return $obj;
    }

    public function buscar($parametro)
    {
        $dados = array();
        $paramNumero = '';
        if (is_numeric($parametro)) {
            $paramNumero = ' id = ' . $parametro . ' OR';
        }
        $paramLike = ' "%' . $parametro . '%" ';

        $qry = $this->con->query('SELECT * from usuario WHERE'
                                . $paramNumero 
                                . ' nome like ' . $paramLike 
                                . ' OR cpf like ' . $paramLike 
                                . ' OR email like ' . $paramLike
                                . ' OR login like ' . $paramLike);

        $dados = $qry->fetchall(PDO::FETCH_ASSOC);
        $listausuarios = array();
        foreach($dados as $dado)
        {
            $listausuarios[] = $this->carregarObjeto($dado);
        }
        return $listausuarios;
    }

}
?>