<?php

include_once("models/bancoDados.class.php");
include_once("models/aluno.class.php");


class AlunosController{
	
	
	private $banco;
	
	public function __construct(){		
		$this->banco = new BancoDados();
	}
	
	public function criarAlunoGet(){		
		return new Aluno();
	}
	
	
	public function criarAlunoPost(){
		
		$aluno = new Aluno();
		
		$aluno->setId($_POST["id"]);
        $aluno->setNome($_POST["nome"]);
        	
        $this->banco->salvarAluno($aluno);      	
	
	}
	
	public function alunos(){
		
	    return 	$this->banco->retornarTodosOsAlunos();		
	}
	
	
}

?>