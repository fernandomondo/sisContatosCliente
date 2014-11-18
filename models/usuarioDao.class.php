<?php

include_once("models/dao.class.php");

class UsuarioDao extends Dao{
		
	public function existeUsuario($usuario, $senha){	
		parent::find("*"," nome = " . $usuario . " and senha = " . $senha)  > 0;
	}	
}
?>
