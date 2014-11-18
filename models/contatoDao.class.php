<?php

include_once("models/contato.class.php");
include_once("models/dao.class.php");

class ContatosDao extends Dao{
	
		
	public function retornarContatoPorId($id){	
		  		
	}
	
	public function retornarTodosOsContatos(){		
		
		parent::find("*","");
		
		$rows = parent::getRecordSet()
		
		foreach ($rows as $row){
			$contato = new Contato();
			$contato->setCelular($row["celular"]);
			$contato->setApelido($row["apelido"]);
			$contato->setEmail($row["email"]);
			$contato->setTelefone($row["telefone"]);
			$contato->setDataNasc($row["dataNasc"]);
			
		}
		
		return $alunos;
	}	
	
}
?>
