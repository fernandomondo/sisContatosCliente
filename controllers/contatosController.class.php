<?php

include_once("models/bancoDados.class.php");
include_once("models/contato.class.php");


class AlunosController{
	
	
	private $contatoDao;
	private $contatoValidator;
	
	public function __construct(){		
		$this->contatoDao = new ContatoDao();
		$this->contatoValidator = new ContatoValidator();
	}
	
	public function criarContatoGet(){		
		return (object) array("contato" => new Contato(), "errors" => array());
	}
	
	
	public function criarContatoPost(){
		
		$contato = new Contato();
				
		$contato->setId($_POST["id"]);
        $contato->setNome($_POST["nome"]);
        $contato->setApelido($_POST["apelido"]);
        $contato->setTelefone($_POST["telefone"]);
        $contato->setCelular($_POST["celular"]);
        $contato->setEmail($_POST["email"]);
        $contato->setDataNasc($_POST["email"]);
        
        $errors = $this->contatoValidator->validate($contato);
        
        if (count($errors) == 0){
        
        $this->contatoDao->salvarContato($contato);    
        
       		header("Location: /contatos.php");
			die();
        }
        
                
        return (object) array("contato" => $contato, "errors" => $errors); 	
	
	}
	
	public function contatos(){
		
	    return 	$this->contatoDao->retornarTodosOsContatos();		
	}
	
	
}

?>