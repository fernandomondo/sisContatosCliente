<?php

include_once("models/bancoDados.class.php");
include_once("models/livro.class.php");


class LivrosController{
	
	
	private $banco;
	
	public function __construct(){		
		$this->banco = new BancoDados();
	}
	
	public function criarLivroGet(){		
		return new Livro();
	}
	
	
	public function criarLivroPost(){
		
		$livro = new Livro();
		
		$livro->setId($_POST["id"]);
        $livro->setNome($_POST["nome"]);
        $livro->setAutor($_POST["autor"]);
        	
        $this->banco->salvarLivro($livro);      	
	
	}
	
	public function livros(){
		
	    return 	$this->banco->retornarTodosOsLivros();		
	}
	
	
}

?>