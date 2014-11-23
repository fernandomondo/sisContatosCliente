<?php
include_once ("controllers/loginController.class.php");
include_once ("models/usuario.class.php");

$controller = new LoginController ();

$model;

if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
	$model = $controller->loginPost ();
} else
	$model = $controller->loginGet ();

?>

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

		<h1>Login</h1>

		<div class="col-md-6">
			<form action="login.php" method="post" role="form">

				<div class="form-group">
					<label for="nome">Usuario</label> <input type="text"
						class="form-control" id="nome" name="nome"
						value="<?php echo $model->usuario->getNome(); ?>"
						placeholder="nome do usuario" required maxlength="50"
						<?php if (isset($_GET["editar"])) { echo 'readonly="readonly"'; } ?>>
				</div>
				<div class="form-group">
					<label for="senha">Senha</label> <input type="text"
						class="form-control" id="senha" name="senha"
						value="<?php echo $model->usuario->getSenha(); ?>"
						placeholder="senha do usuario" required maxlength="20">
				</div>

				<ul>
			  <?php foreach ($model->errors as $item) { ?>
	       			<li><?php echo $item; ?></li>
			 <?php } ?>
		  </ul>


				<button type="submit" class="btn btn-primary">Logar</button>
				<!--  a href="/contatos.php" class="btn btn-default">Cancelar</a>-->
			</form>
		</div>
	</div>
</body>
</html>