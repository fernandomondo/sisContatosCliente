<?php
include_once ("models/contato.class.php");
include_once ("models/dao.class.php");
class ContatoDao extends Dao {
	public function __construct() {
		parent::__construct ( "contatos" );
	}
	private function converter($row) {
		$contato = new Contato ();
		$contato->setNome( $row ["nome"] );
		$contato->setCelular ( $row ["celular"] );
		$contato->setApelido ( $row ["apelido"] );
		$contato->setEmail ( $row ["email"] );
		$contato->setTelefone ( $row ["telephone"] );
		$contato->setDataNasc ( $row ["dt_nasc"] );
		$contato->setIdUsuario( $row ["idUsuario"] );
		return $contato;
	}
	public function retornarContatoPorNome($nome) {
		parent::find ( "*", " nome = " + $nome );
	}
	public function retornarTodosOsContatos() {
		parent::find ( "*", "" );
		
		$rows = parent::getRecordSet ();
		
		$contatos = array ();
		
		for($i = 0; $i < count ( $rows ); $i ++) {
			$row = $rows [$i];
			
			array_push ( $contatos, $this->converter ( $row ) );
		}
		
		return $contatos;
	}
	public function salvarContato($contato) {
		
		$nome = $contato->getNome ();
		$apelido = $contato->getApelido ();
		$telefone = $contato->getTelefone ();
		$celular = $contato->getCelular ();
		$email = $contato->getEmail();
		$dataNasc = $contato->getDataNasc();
		$idUsuario = $contato->getIdUsuario ();
		
		$values = "'$nome','$apelido','$telefone','$celular','$email','$dataNasc',$idUsuario";
		
		$rowsAffected = parent::insert ( "nome, apelido, telephone, celular, email, dt_nasc, idUsuario", $values );
		
		if ($rowsAffected != 1) {
			throw new Exception ( "Ocorreu um erro ao salvar o contato. rowsAffected: $rowsAffected" );
		}
	}
}
?>
