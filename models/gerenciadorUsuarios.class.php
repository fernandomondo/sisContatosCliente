<?php

include_once("models/usuarioDao.class.php");

class GerenciadorUsuarios{
		
	private $usuarioDao;
	
	public function __construct(){		
		$this->usuarioDao = new UsuarioDao();
	}
	
	public function autenticar($usuario, $senha){		
		if($this->usuarioDao->existeUsuario($usuario, $senha)){
			header("Location: /login.php"); //redirecionar para o login
			die();
		}
	}
}

?>