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

		$contato;
		
		if(isset($_GET["editar"])){
			$nome = $_GET["editar"];
			$contato = $this->contatoDao->retornarContatoPorNome($nome);
		}else
		{
			$contato = new Contato();			
		}
		
		return (object) array("contato" => $contato, "errors" => array());
	}
		
	public function criarContatoPost(){
		
		$contato;
		
		if (isset($_POST["editar"]))
		{
			$contato = $this->contatoDao->retornarContatoPorNome($_POST["nome"]);
		}
		else{	
			$contato = new Contato();
		}
					
        $contato->setNome($_POST["nome"]);
        $contato->setApelido($_POST["apelido"]);
        $contato->setTelefone($_POST["telefone"]);
        $contato->setCelular($_POST["celular"]);
        $contato->setEmail($_POST["email"]);
        $contato->setDataNasc($_POST["dataNasc"]);
        $contato->setIdUsuario(1);        
        
        $errors = $this->contatoValidator->validate($contato);
        
        if (count($errors) == 0){
        
        	if (isset($_POST["editar"]))
        	{
        		$this->contatoDao->atualizarContato($contato);    
        	}
        	else{
        		$this->contatoDao->salvarContato($contato);    
        	}
        
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