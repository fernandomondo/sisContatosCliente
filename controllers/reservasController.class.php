<?php

include_once("models/bancoDados.class.php");
include_once("models/livro.class.php");
include_once("models/reservaValidator.class.php");

class ReservasController{
	
	
	private $banco;
	
	public function __construct(){		
		$this->banco = new BancoDados();
	}
	
	public function criarReservaGet(){		
		return (object) array( "errors" => array(),
								"alunos" => $this->banco->retornarTodosOsAlunos(), 
							    "livros" => $this->banco->retornarTodosOsLivros(),
								"reserva" => new Reserva());
	}	
	
	public function criarReservaPost(){
		
		$reserva = new Reserva();
		
		$reserva->setId($_POST["id"]);
        $reserva->setAluno($this->banco->retornarAlunoPorId($_POST["idAluno"]));
        $reserva->setLivro($this->banco->retornarLivroPorId($_POST["idLivro"]));
        $reserva->setDataEntrega($_POST["dataEntrega"]);
        $reserva->setDataRetirada(date("m-d-Y"));
        
        $reservaValidator = new ReservaValidator($this->banco);
        
        $errors = $reservaValidator->validate($reserva);
        
        if(count($errors) == 0){
        	
        	 $this->banco->salvarReserva($reserva);        	
        }
        
        return (object) array("errors" => $errors, 
							   "alunos" => $this->banco->retornarTodosOsAlunos(), 
							   "livros" => $this->banco->retornarTodosOsLivros(),
						       "reserva" => $reserva);
	
	}
	
	public function reservas(){		
	    return 	$this->banco->retornarTodasAsReservas();		
	}
	
	
}

?>