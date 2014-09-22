<?php

class Reserva{
	
	private $id;
	private $livro;
	private $aluno;
	private $dataRetirada;
	private $dataEntrega;
	
	
	public function getId(){		
		return $this->id;
	}
		
	public function setId($id){		
		$this->id = $id;
	}
	
	public function getLivro(){		
		return $this->livro;
	}
		
	public function setLivro($livro){		
		$this->livro = $livro;
	}
	
	public function getAluno(){		
		return $this->aluno;
	}
		
	public function setAluno($aluno){		
		$this->aluno = $aluno;
	}
	
	public function getDataRetirada(){		
		return $this->dataRetirada;
	}
		
	public function setDataRetirada($dataRetirada){		
		$this->dataRetirada = $dataRetirada;
	}
	
	public function getDataEntrega(){		
		return $this->dataEntrega;
	}
		
	public function setDataEntrega($dataEntrega){		
		$this->dataEntrega = $dataEntrega;
	}
}

?>