<?php
class UsuarioModel{
    private $id;
    private $cpf;
    private $nome;
    private $data_nascimento;
    private $nome_mae;
    private $email;
    private $celular;
    private $cep;
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $login;
    private $senha;
    private $perfil;

    public function __construct($id = null, $cpf = null, $nome = null, $data_nascimento = null, $nome_mae = null, $email = null, $celular = null, $cep = null, $logradouro = null, $numero = null, $complemento = null, $bairro = null, $cidade = null, $estado = null, $login = null, $senha = null, $perfil = null) {
        $this->id = $id;
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->data_nascimento = $data_nascimento;
        $this->nome_mae = $nome_mae;
        $this->email = $email;
        $this->celular = $celular;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->login = $login;
        $this->senha = $senha;
        $this->perfil = $perfil;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDataNascimento() {
        return $this->data_nascimento;
    }

    public function setDataNascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    public function getNomeMae() {
        return $this->nome_mae;
    }

    public function setNomeMae($nome_mae) {
        $this->nome_mae = $nome_mae;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'cpf' => $this->cpf,
            'nome' => $this->nome,
            'data_nascimento' => $this->data_nascimento,
            'nome_mae' => $this->nome_mae,
            'email' => $this->email,
            'celular' => $this->celular,
            'cep' => $this->cep,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'login' => $this->login,
            'senha' => $this->senha,
            'perfil' => $this->perfil,
        ];
    }
}
?>