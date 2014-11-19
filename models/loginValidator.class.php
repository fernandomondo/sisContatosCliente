<?php

include_once("models/contato.class.php");

class LoginValidator{
	
	private $loginDao;
	
	public function __construct($loginDao){
		$this->loginDao = $loginDao;
	}	
	
	public function validate($user){	
		
		$errors = array();
		return $errors;		
	}
}

?>