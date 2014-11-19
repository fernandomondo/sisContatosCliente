<?php

class Contato {
	
    private $nome;
    private $apelido;
    private $telefone;
    private $celular;
    private $email;
    private $dataNasc;
    private $idUsuario;
      	
    public function getNome() {
		return $this->nome;	
	} 
	
	public function getApelido() {
		return $this->apelido;	
	} 
	
	public function getTelefone() {
		return $this->telefone;	
	} 
	
	public function getCelular() {
		return $this->celular;	
	} 
	
	public function getEmail() {
		return $this->email;	
	} 
	
	public function getDataNasc() {
		return $this->dataNasc;	
	}
	
	public function getIdUsuario() {
		return $this->idUsuario;
	}

	public function setNome($nome) {
		 $this->nome = $nome;	
	} 
	
	public function setApelido($apelido) {
		 $this->apelido = $apelido;	
	} 
	
	public function setTelefone($telefone) {
		 $this->telefone = $telefone;	
	} 
	
	public function setCelular($celular) {
		 $this->celular = $celular;	
	} 
	
	public function setEmail($email) {
		 $this->email = $email;	
	} 
	
	public function setDataNasc($dataNasc) {
		 $this->dataNasc = $dataNasc;	
	}  
	
	public function setIdUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}
	
	
    
}
?>