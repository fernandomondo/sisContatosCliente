<?php

include_once("controllers/livrosController.class.php");

$controller = new LivrosController();

$model = $controller->livros();



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
	<h1>Livros</h1>
	
	<a href="livro-criar.php" class="btn btn-primary">Criar Novo</a>
	<table class="table">
		<tt>
			<th>Id</th>
			<th>Nome</th>
			<th>Autor</th>
		</tr>
		<?php foreach ($model as $item) { ?>
	    <tr>
			<td><?php echo $item->getId(); ?></td>
			<td><?php echo $item->getNome(); ?></td>
			<td><?php echo $item->getAutor(); ?></td>
		</tr>   
		<?php } ?>
	</table>

			
</div>
</body>
</html>