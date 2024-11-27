<?php

class LogDAO{
    private $con;
    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    private function carregarObjeto($item)
    {
        $obj = new LogModel();
        $obj->setId($item['id']);
        $obj->setTimestamp($item['timestamp']);
        $obj->setIdUsuario($item['id_usuario']);

        return $obj;
    }

    public function listar()
    {
        $dados = array();
        $qry = $this->con->query('select * from log');
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
        if ($obj->getTimestamp() === null) {
            $qry = $this->con->prepare('INSERT INTO log (id_usuario) VALUES (:id_usuario)');
        } else {
            $qry = $this->con->prepare('INSERT INTO log (timestamp, id_usuario) VALUES (:timestamp, :id_usuario)');
            $qry->bindValue(':timestamp', $obj->getTimestamp());
        }
        $qry->bindValue(':id_usuario', $obj->getIdUsuario());

        $qry->execute();
    }

    public function retornar($id)
    {
        $qry = $this->con->prepare('select * from log where id = :id');
        $qry->bindValue(':id', $id);
        $qry->execute();
        $dado = $qry->fetch(PDO::FETCH_ASSOC);

        return $this->carregarObjeto($dado);
    }

    public function deletar($id)
    {
        $qry = $this->con->prepare('DELETE FROM log WHERE id = :id');
        $qry->bindValue(':id', $id);
        $qry->execute();
    }

    public function deletarPorUsuario($id_usuario)
    {
        $qry = $this->con->prepare('DELETE FROM log WHERE id_usuario = :id_usuario');
        $qry->bindValue(':id_usuario', $id_usuario);
        $qry->execute();
    }

    public function buscarPorUsuario($id_usuario)
    {
        $dados = array();
        $qry = $this->con->prepare('select * from log where id_usuario = :id_usuario');
        $qry->bindValue(':id_usuario', $id_usuario);
        $qry->execute();
        $dados = $qry->fetchall(PDO::FETCH_ASSOC);

        $listaObjs = array();
        foreach($dados as $dado)
        {
            $listaObjs[] = $this->carregarObjeto($dado);
        }

        return $listaObjs;
    }
}