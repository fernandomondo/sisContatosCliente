<?php

include_once("models/reserva.class.php");

class ReservaValidator{
	
	private $banco;
	
	public function __construct($banco){
		$this->banco = $banco;
	}	
	
	public function validate($reserva){		
		
		$errors = array();
		
		//verificar se os campos foram informados
		
		if($reserva->getId() == null)
			$errors["id"] = "Id não informado";
		
		/*
		 * n�o pode repetir mesmo livro para o mesmo aluno para a mesma data de retirada
		 * verificar se os campos foram informados
		 * n�o deixar gravar a reserva para o mesmo livro
		 * 
		 */
		
		$reservas = $this->banco->retornarTodasAsReservas();
		
		if ($reserva->getDataEntrega() < $reserva->getDataRetirada())
			$errors["dataEntrega"] = "data de entrega deve ser maior que a data de retirada.";
		
		if($reserva->getLivro() == null)
			$errors["id"] = "livro não informado";
		
		if($reserva->getAluno() == null)
			$errors["id"] = "aluno não informado";
						
		$quantidade = 0;
		foreach ( $reservas as $item ) {       		
       		if($reserva->getLivro()->getId() == $item->getLivro()->getId())
       			$quantidade++;       		
		}
		
		if($reserva->getLivro()->getQuantidade() == $quantidade)
			 $errors["idLivro"] = "n�o � possivel fazer a reserva pois ultrapassa o n�mero de exemplares.";			
			
		foreach ( $reservas as $item ) {
       		
       		/*if($reserva->getLivro()->getId() == $item->getLivro()->getId()){
       			$errors["idLivro"] = "não deixar gravar a reserva para o mesmo livro";
       			break;
       		}*/
       		
       		if($reserva->getAluno()->getId() == $item->getAluno()->getId())
       			if($reserva->getLivro()->getId() == $item->getLivro()->getId())
       			  if($reserva->getDataRetirada() == $item->getDataRetirada()){       			
       					$errors["idLivro"] = "mesmo livro para mesmo aluno na mesma data não permitido.";
       					break;
       				}
       		
		}		
			
		return $errors;
		
	}
}

?>