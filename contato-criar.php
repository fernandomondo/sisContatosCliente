<?php

include_once("controllers/contatosController.class.php");

$controller = new ContatosController();

$model;

if($_SERVER['REQUEST_METHOD'] === 'POST')
	$model = $controller->criarContatoPost();
else
	$model = $controller->criarContatoGet();
?>
	

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<title>Sistema Biblioteca</title>
</head>
<body>
<?php include("menu.php") ?>
<div class="container">
	<h1>Cadastrar Aluno</h1>
	<div class="col-md-6">	
		<form action="contato-criar.php" method="post" role="form">		  
		  <div class="form-group">
		    <label for="nome">Nome</label>
		    <input type="text" class="form-control" id="nome" name="nome" placeholder="nome do aluno" required maxlength="50">
		  </div>
		  <div class="form-group">
		    <label for="apelido">Apelido</label>
		    <input type="text" class="form-control" id="apelido" name="apelido" placeholder="apelido do contato" required maxlength="20">
		  </div>
		  <div class="form-group">
		    <label for="telefone">Telefone</label>
		    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone do contato" required maxlength="10">
		  </div>
		  <div class="form-group">
		    <label for="celular">Celular</label>
		    <input type="text" class="form-control" id="celular" name="celular" placeholder="celular do contato" required maxlength="10">
		  </div>
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="text" class="form-control" id="email" name="email" placeholder="email do contato" required maxlength="30">
		  </div>
		  <div class="form-group">
		    <label for="dataNasc">Data de Nascimento</label>
		    <input type="text" class="form-control" id="dataNasc" name="dataNasc" placeholder="dataNasc do contato" required>
		  </div>
		  <button type="submit" class="btn btn-default">Salvar</button>
		</form>
	</div>		
</div>
</body>
</html>