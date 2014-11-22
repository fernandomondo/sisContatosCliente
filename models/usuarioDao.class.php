<?php

include_once("models/dao.class.php");

class UsuarioDao extends Dao{

	public function __construct(){
		parent::__construct("usuarios");
	}
	
	private function converter($row) {
		$usuario = new Usuario();
		$usuario.setId($row["id"]);
		$usuario.setNome($row["nome"]);
		$usuario.setSenha($row["senha"]);
		return $usuario;
	}
	
	
	public function existeUsuario($usuario, $senha){	
		return parent::find("*"," nome = " . $usuario . " and senha = " . $senha)  > 0;
	}	
	
	public function retornarUsuario($usuario, $senha){
		parent::find("*"," nome = " . $usuario . " and senha = " . $senha);
		
		$rows = parent::getRecordSet ();
		
		for($i = 0; $i < count ( $rows ); $i ++) {
			$row = $rows [$i];
		
			return $this->converter ( $row );
		}
		
		return null;		
	}
}
?>
