<?php
include_once ("models/usuarioDao.class.php");
class GerenciadorUsuarios {
	private $usuarioDao;
	public function __construct() {
		$this->usuarioDao = new UsuarioDao ();
	}
	public function autenticar($usuario) {		
		if ($usuario != null) {
			$_SESSION ["usuario"] = $usuario->getId ();
		} else {
			header ( "Location: /sisContatosCliente/login.php" ); // redirecionar para o login
			die ();
		}
	}
	
	public static function verificarUsuarioAutenticado() {
		if (! isset( $_SESSION ["usuario"])){			
			header ( "Location: /sisContatosCliente/login.php" ); // redirecionar para o login
			die ();
		}
	}
	
	public static function getIdUsuario() {
		return parseInt($_SESSION ["usuario"]);
	}
}

?>