<?php

include_once("controllers/reservasController.class.php");

$controller = new ReservasController();

$model = $controller->reservas();
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
<?php   include("menu.php"); ?>
<div class="container">
	<h1>Reservas</h1>
	
	<a href="reserva-criar.php" class="btn btn-primary">Criar Nova</a>
	<table class="table">
		<tt>
			<th>Id</th>
			<th>Aluno</th>
			<th>Livro</th>
			<th>Data Retirada</th>
			<th>Data Entrega</th>
		</tr>
		<?php foreach ($model as $item) { ?>
	    <tr>
			<td><?php echo $item->getId(); ?></td>
			<td><?php echo $item->getAluno()->getId(); ?></td>
			<td><?php echo $item->getLivro()->getId(); ?></td>
			<td><?php echo $item->getDataRetirada(); ?></td>
			<td><?php echo $item->getDataEntrega(); ?></td>
		</tr>   
		<?php } ?>
	</table>

			
</div>
</body>
</html>