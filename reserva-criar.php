<?php

include_once("controllers/reservasController.class.php");

$controller = new ReservasController();

$model;

if($_SERVER['REQUEST_METHOD'] === 'POST')
	$model = $controller->criarReservaPost();
else
	$model = $controller->criarReservaGet();
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
<?php include("menu.php"); ?>
<div class="container">
	<h1>Cadastrar Reserva</h1>
	<div class="col-md-6">	
		<form action="reserva-criar.php" method="post" role="form">
		  <div class="form-group">
		    <label for="nome">Id</label>
		    <input type="text" class="form-control" id="id" name="id" placeholder="codigo da reserva">
		  </div>
		  <div class="form-group">
		    <label for="nome">Aluno</label>
		    <select name="idAluno" class="form-control">
		    <?php foreach ($model->alunos as $item) { ?>
       			<option value="<?php echo $item->getId(); ?>"> <?php echo $item->getNome(); ?> </option>
			<?php } ?>
			</select>		    
		  </div>
		  <div class="form-group">
		    <label for="nome">Livro</label>
		    <select name="idLivro" class="form-control">
		    <?php foreach ($model->livros as $item) { ?>
       			<option value="<?php echo $item->getId(); ?>"> <?php echo $item->getNome(); ?> </option>
			<?php } ?>
			</select>		    
		  </div>
		  <div class="form-group">
		    <label for="dataEntrega">Data de entrega</label>
		    <input type="date" class="form-control" id="dataEntrega" name="dataEntrega" placeholder="data prevista de entrega">
		  </div>
		  <ul>
			  <?php foreach ($model->errors as $item) { ?>
	       			<li><?php echo $item; ?></li>
			 <?php } ?>
		  </ul> 
		  <button type="submit" class="btn btn-default">Salvar</button>
		</form>
	</div>		
</div>
</body>
</html>