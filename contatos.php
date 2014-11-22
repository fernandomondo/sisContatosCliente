<?php
include_once ("controllers/contatosController.class.php");

$controller = new ContatosController ();

$model = $controller->listaContatos ()?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="en" />
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<title>Sistema de Contatos</title>
</head>
<body>
<?php include("menu.php")?>
<div class="container">

		<h1>Contatos</h1>

		<a href="contato-criar.php" class="btn btn-primary">Criar Novo</a>
		<table class="table">
			<tr>
				<th>Nome</th>
				<th>Apellido</th>
				<th>Telefone</th>
				<th>Celular</th>
				<th>Email</th>
				<th>Data Nascimento</th>
				<th>Id Usuario</th>
				<th></th>
			</tr>
		<?php foreach ($model->contatos as $contato) { ?>
	    <tr>
				<td><?php echo $contato->getNome(); ?></td>
				<td><?php echo $contato->getApelido(); ?></td>
				<td><?php echo $contato->getTelefone(); ?></td>
				<td><?php echo $contato->getCelular(); ?></td>
				<td><?php echo $contato->getEmail(); ?></td>
				<td><?php echo $contato->getDataNasc(); ?></td>
				<td><?php echo $contato->getIdUsuario(); ?></td>
				<td><a class="btn btn-sm btn-default"
					href="contato-criar.php?editar=<?php echo $contato->getNome();?>">Editar</a></td>
			</tr>   
		<?php } ?>
	</table>
	</div>
</body>
</html>