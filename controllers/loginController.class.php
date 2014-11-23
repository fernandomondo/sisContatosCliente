<?php
session_start();
include_once ("models/usuario.class.php");
include_once ("models/gerenciadorUsuarios.class.php");
class LoginController {
	private $usuarioDao;
	private $gerenciadorUsuarios;
	public function __construct() {
		$this->usuarioDao = new UsuarioDao ();
		$this->gerenciadorUsuarios = new GerenciadorUsuarios ( $this->usuarioDao );
	}
	public function loginGet() {
		return ( object ) array (
				"usuario" => new Usuario (),
				"errors" => array () 
		);
	}
	public function loginPost() {
		$usuario = $this->usuarioDao->retornarUsuario ( $_POST ["nome"], $_POST ["senha"] );
		
		if ($usuario != null) {
			$this->gerenciadorUsuarios->autenticar ( $usuario );
			
			header ( "Location: /sisContatosCliente/index.php" ); // autentica e redirecionar para a home
			die ();
		}
		
		$errors = array (
				"nome" => "Usuario não encontrado" 
		);
		
		$usuario = new Usuario ();
		$usuario->setNome ( $_POST ["nome"] );
		$usuario->setSenha ( $_POST ["senha"] );
		
		return ( object ) array (
				"usuario" => $usuario,
				"errors" => $errors 
		);
	}
}

?>