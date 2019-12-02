<?php
	require_once("libs/Sesion.php") ;

	// instanciamos la sesión
	$ses = Sesion::getInstance() ;

	// comprobamos si hay sesión activa
	if ($ses->checkActiveSession())
		$ses->redirect("index.php") ;

	// comprobar si hemos recibido información
	// a través del formulario ($_POST)
	if (!empty($_POST)){

		$email = $_POST["email"] ;
		$password  = $_POST["password"] ;

		// intentamos loguearnos
		$ok = $ses->login($email, $password) ;

		// Redirigimos al main si hay login correcto
		if ($ok) $ses->redirect("index.php") ;
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>· PDF4you ·</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="css/pdf4youcss.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body>

	<div class="container">

		<!-- logotipo -->
		<div class="row">
			<div class="col-sd-12 mx-auto">
				<img class="logo" src="images/logo-PDF4you.png" alt="PDF4you" />
			</div>
		</div>

		<!-- formulario de login -->
		<form method="post">

			<!-- email -->
			<div class="row mt-5 form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="text" 
						   name="email" placeholder="email@PDF4you.com" required />
				</div>
			</div>

			<!-- contraseña -->
			<div class="row form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="text" name="password" placeholder="contraseña" required />
				</div>
			</div>

			<?php
				if ((isset($ok)) && (!$ok)):
			?>
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="alert alert-danger w-50" role="alert">
					  Usuario o contraseña incorrectas.
					</div>
				</div>
			</div>
			<?php
				endif ;
			?>

			<!-- botón LOGIN -->
			<div class="row form-group">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary w-25" type="submit">Entrar</button>
				</div>
			</div>

		</form>

		<!-- acceso REGISTRO -->
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="registro.php" class="btn btn-link">¡Regístrate!</a>
			</div>
		</div>

	</div> <!-- container -->

</body>
</html>