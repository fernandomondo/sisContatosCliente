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
			$errors["id"] = "Id nÃ£o informado";
		
		/*
		 * não pode repetir mesmo livro para o mesmo aluno para a mesma data de retirada
		 * verificar se os campos foram informados
		 * não deixar gravar a reserva para o mesmo livro
		 * 
		 */
		
		$reservas = $this->banco->retornarTodasAsReservas();
		
		if ($reserva->getDataEntrega() < $reserva->getDataRetirada())
			$errors["dataEntrega"] = "data de entrega deve ser maior que a data de retirada.";
		
		if($reserva->getLivro() == null)
			$errors["id"] = "livro nÃ£o informado";
		
		if($reserva->getAluno() == null)
			$errors["id"] = "aluno nÃ£o informado";
			
			
		$quantidade = 0;
		foreach ( $reservas as $item ) {       		
       		if($reserva->getLivro()->getId() == $item->getLivro()->getId())
       			$quantidade++;       		
		}
		
		if($reserva->getLivro()->getQuantidade() == $quantidade)
			 $errors["idLivro"] = "não é possivel fazer a reserva pois ultrapassa o número de exemplares.";			
			
		foreach ( $reservas as $item ) {
       		
       		if($reserva->getLivro()->getId() == $item->getLivro()->getId()){
       			$errors["idLivro"] = "nÃ£o deixar gravar a reserva para o mesmo livro";
       			break;
       		}
       		
       		if($reserva->getAluno()->getId() == $item->getAluno()->getId())
       			if($reserva->getLivro()->getId() == $item->getLivro()->getId())
       			  if($reserva->getDataRetirada() == $item->getDataRetirada()){       			
       					$errors["idLivro"] = "mesmo livro para mesmo aluno na mesma data nÃ£o permitido.";
       					break;
       				}
       		
		}		
			
		return $errors;
		
	}
}

?>