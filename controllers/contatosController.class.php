<?php

include_once("models/contatoDao.class.php");
include_once("models/contato.class.php");
include_once("models/contatoValidator.class.php");


class ContatosController{
		
	private $contatoDao;
	private $contatoValidator;
	
	public function __construct(){		
		$this->contatoDao = new ContatoDao();
		$this->contatoValidator = new ContatoValidator($this->contatoDao);
	}
	
	public function criarContatoGet(){		
		return (object) array("contato" => new Contato(), "errors" => array());
	}
	
	
	public function criarContatoPost(){
		
		$contato = new Contato();
						
        $contato->setNome($_POST["nome"]);
        $contato->setApelido($_POST["apelido"]);
        $contato->setTelefone($_POST["telefone"]);
        $contato->setCelular($_POST["celular"]);
        $contato->setEmail($_POST["email"]);
        $contato->setDataNasc($_POST["dataNasc"]);
        $contato->setIdUsuario(1);        
        
        $errors = $this->contatoValidator->validate($contato);
        
        if (count($errors) == 0){
        
        	$this->contatoDao->salvarContato($contato);    
        
       		header("Location: /sisContatosCliente/contatos.php");
			die();
        }
        
                
        return (object) array("contato" => $contato, "errors" => $errors); 	
	
	}
	
	public function listaContatos(){
		
	    return 	(object) array("contatos" => $this->contatoDao->retornarTodosOsContatos());		
	}
	
	
}

?>