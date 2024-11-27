<?php
class LogModel{
    private $id;
    private $timestamp;
    private $id_usuario;

    public function __construct($id = null, $timestamp = null, $id_usuario = null) {

        $this->id = $id;
        $this->timestamp = $timestamp;
        $this->id_usuario = $id_usuario;

    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    public function toArray(){
        return array(
            'id' => $this->id,
            'timestamp' => $this->timestamp,
            'id_usuario' => $this->id_usuario
        );
    }
}
?>