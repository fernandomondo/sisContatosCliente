<?php

include_once("controllers/contatosController.class.php");

$controller = new LoginController();

$model = $controller->listaContatos()

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<title>Sistema de Contatos</title>
</head>
<body>
<?php include("menu.php") ?>
<div class="container"> 

	<h1>Login</h1>
	
	<div class="col-md-6">	
		<form action="contato-criar.php" method="post" role="form">	
		
			<?php if (isset($_GET["editar"])){			
				echo '<input type="hidden" name="editar">';
			}?>
			  
		  <div class="form-group">
		    <label for="nome">Usuario</label>
		    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $model->contato->getNome(); ?>" placeholder="nome do aluno" required maxlength="50"  <?php if (isset($_GET["editar"])) { echo 'readonly="readonly"'; } ?>>
		  </div>
		  <div class="form-group">
		    <label for="apelido">Senha</label>
		    <input type="text" class="form-control" id="apelido" name="apelido" value="<?php echo $model->contato->getApelido(); ?>" placeholder="apelido do contato" required maxlength="20">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Salvar</button>
		  <a href="/contatos.php" class="btn btn-default">Cancelar</a>
		</form>
	</div>
</div>
</body>
</html>