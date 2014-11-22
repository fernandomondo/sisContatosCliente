<?php
include_once ("models/contato.class.php");
class ContatoValidator {
	private $contatoDao;
	public function __construct($contatoDao) {
		$this->contatoDao = $contatoDao;
	}
	public function validate($contato) {
		$errors = array ();
		
		if ($contato->getNome () == null)
			$errors ["nome"] = "Nome não informado";
		
		return $errors;
	}
}

?>