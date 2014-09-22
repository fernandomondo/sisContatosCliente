<?php

include_once("models/aluno.class.php");
include_once("models/livro.class.php");
include_once("models/reserva.class.php");

class BancoDados{
	
	public function retornarReservasPorAluno(){		
		$arquivo =  fopen("livros.txt", "a+");
		
		fclose($arquivo);
	}
		
	public function retornarAlunoPorId($id){	
		$arquivo =  fopen("livros.txt", "a+");		
		$aluno = null;
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);  
        	if($dados[0] == $id){        	   	
        	$aluno = new Livro();
        	$aluno->setId($dados[0]);
        	$aluno->setNome($dados[1]);        	
        	break;
        	}        	
    	}				
		fclose($arquivo); 
		
		return $aluno;	  		
	}
	
	public function retornarTodosOsAlunos(){		
		$arquivo =  fopen("alunos.txt", "a+");
		$alunos = array();
		
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);          	   	
        	$aluno = new Aluno();
        	$aluno->setId($dados[0]);
        	$aluno->setNome($dados[1]);
        	array_push($alunos, $aluno);
    	}				
		fclose($arquivo); 
		
		return $alunos;
	}
	
	public function retornarLivroPorId($id){
		$arquivo =  fopen("livros.txt", "a+");		
		$livro = null;
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);  
        	if($dados[0] == $id){        	   	
        	$livro = new Livro();
        	$livro->setId($dados[0]);
        	$livro->setNome($dados[1]);
        	$livro->setAutor($dados[2]);
        	break;
        	}        	
    	}				
		fclose($arquivo); 
		
		return $livro;		
	}
	
	public function retornarTodosOsLivros(){		
		$arquivo =  fopen("livros.txt", "a+");
		$livros = array();
		
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);          	   	
        	$livro = new Livro();
        	$livro->setId($dados[0]);
        	$livro->setNome($dados[1]);
        	$livro->setAutor($dados[2]);
        	array_push($livros, $livro);
    	}				
		fclose($arquivo); 
		
		return $livros;
	}
	
	public function retornarTodasAsReservas(){		
		$arquivo =  fopen("reservas.txt", "a+");
		$reservas = array();
		
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);          	   	
        	$reserva = new Reserva();
        	$reserva->setId($dados[0]);
        	$reserva->setAluno($this->retornarAlunoPorId($dados[1]));
        	$reserva->setLivro($this->retornarLivroPorId($dados[2]));
        	$reserva->setDataRetirada($dados[3]);
        	$reserva->setDataEntrega($dados[4]);
        	array_push($reservas, $reserva);
    	}				
		fclose($arquivo); 
		
		return $reservas;
	}
	
	public function salvarLivro($livro){
				
		$arquivo =  fopen("livros.txt", "a+");
		fwrite($arquivo, $livro->getId() . "||" . $livro->getNome() . "||" . $livro->getAutor() . "\r\n");
		fclose($arquivo);  
	}
	
	public function salvarAluno($aluno){
				
		$arquivo =  fopen("alunos.txt", "a+");
		fwrite($arquivo, $aluno->getId() . "||" . $aluno->getNome() . "\r\n");
		fclose($arquivo); 
	}
	
	public function salvarReserva($reserva){
				
		$arquivo =  fopen("reservas.txt", "a+");
		fwrite($arquivo, $reserva->getId() . "||" . $reserva->getAluno()->getId() . "||" . $reserva->getLivro()->getId() . "||" . $reserva->getDataRetirada() . "||" . $reserva->getDataEntrega() . "\r\n");
		fclose($arquivo); 
	}
	
}



?>
