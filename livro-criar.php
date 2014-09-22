<?php

include_once("controllers/livrosController.class.php");

$controller = new LivrosController();

$model;

if($_SERVER['REQUEST_METHOD'] === 'POST')
	$model = $controller->criarLivroPost();
else
	$model = $controller->criarLivroGet();
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
	<h1>Cadastrar Livro</h1>
	<div class="col-md-6">	
		<form action="livro-criar.php" method="post" role="form">
		  <div class="form-group">
		    <label for="nome">Id</label>
		    <input type="text" class="form-control" id="id" name="id" placeholder="codigo do livro">
		  </div>
		  <div class="form-group">
		    <label for="nome">Nome</label>
		    <input type="text" class="form-control" id="nome" name="nome" placeholder="nome do livro">
		  </div>
		  <div class="form-group">
		    <label for="autor">Autor</label>
		    <input type="text" class="form-control" id="autor" name="autor" placeholder="autor do livro">
		  </div>		 
		  <button type="submit" class="btn btn-default">Salvar</button>
		</form>
	</div>		
</div>
</body>
</html>