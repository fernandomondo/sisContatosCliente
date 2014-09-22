<?php

class Livro{
	
	private $id;
	private $nome;
	private $autor;	
	
	public function getId(){		
		return $this->id;		
	}	
	
	public function setId($id){		
		$this->id = $id;		
	}
	
	public function getAutor(){		
		return $this->autor;		
	}
	
	public function setAutor($autor){		
		$this->autor = $autor;		
	}
	
	public function getNome(){		
		return $this->nome;		
	}
	
	public function setNome($nome){		
		$this->nome = $nome;		
	}
	
}
?>
