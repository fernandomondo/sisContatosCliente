<?php

include_once("models/contatoDao.class.php");
include_once("models/contato.class.php");
include_once("models/loginValidator.class.php");
include_once("models/gerenciadorUsuarios.class.php");

class LoginController{
		
	private $contatoDao;
	private $contatoValidator;
	
	public function __construct(){		
		
		$this->contatoDao = new ContatoDao();
		$this->contatoValidator = new LoginValidator($this->contatoDao);
	}
	
	public function loginGet(){	
		
	}
		
	public function loginPost(){
		
		
	
	}
	
	
}

?>