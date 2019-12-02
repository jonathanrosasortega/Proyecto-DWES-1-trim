<?php
	if (!empty($_POST)){
		/*echo "<pre>".print_r($_POST,true)."</pre>" ; //Para pruebas*/

		// capturamos los datos del formulario
		$ema = $_POST["email"] ;
		$nom = $_POST["nombre"] ;
		$ape = $_POST["apellidos"] ;
		$pas = $_POST["password"] ;
		$con = $_POST["conf"] ;
		

		// comprobar que las contraseñas son iguales
		if ($pas==$con){

			// intentamos conectar
			try {
				$pdo = new PDO("mysql:host=localhost;dbname=pdf4you","root","") ;
			} catch (PDOException $e) {
				die("ERROR:: ".$e->getMessage()) ;
			}

			// Construcción de la sentecia
			$sql = "INSERT INTO usuario (email, password, nombre, apellidos, permisos) VALUES (:ema, md5(:pas), :nom, :ape, 0) ;" ;

			// preparamos la sentencia
			$sqlp = $pdo->prepare($sql) ;

			// vinculado los parámetros a la consulta SQL
			$sqlp->bindValue(":ema", $ema, PDO::PARAM_STR) ;
			$sqlp->bindValue(":nom", $nom, PDO::PARAM_STR) ;
			$sqlp->bindValue(":ape", $ape, PDO::PARAM_STR) ;
			$sqlp->bindValue(":pas", $pas, PDO::PARAM_STR) ;
			

			// ejecutamos la consulta
			if (!$sqlp->execute())
				$error = "Error en la creación del usuario" ;
			
			// cerramos la conexión
			$pdo = null ;

		} else {
			$error = "Las contraseñas no coinciden" ;
		}

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

		<!-- nota -->
		<div class="row">
			<div class="col-sd-12 mx-auto mb-5">
				<h4>Registro de Usuarios</h4>
			</div>
		</div>

		
		<?php
			if (isset($error)):
				echo "<div class=\"alert alert-danger w-50 mx-auto\">" ;
				echo $error ;
				echo "</div>" ;
			endif ;
		?>

		<!-- formulario de registro -->
		<form method="post">
			
			<!-- nombre de usuario -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="email">Dirección de email:</label>
					<input class="form-control" type="email" name="email" placeholder="PDF4you@email.com" required />
				</div>
			</div>

			<!-- nombre -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="nombre">Nombre:</label>
					<input class="form-control" type="text" name="nombre" required />
				</div>
			</div>

			<!-- apellidos -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="apellidos">Apellidos:</label>
					<input class="form-control" type="text" name="apellidos" required />
				</div>
			</div>

			<!-- contraseña -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="password">Contraseña:</label>
					<input class="form-control" type="password" name="password" 
						   required />
				</div>
			</div>

			<!-- confirmación contraseña -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="conf">Confirmación contraseña:</label>
					<input class="form-control" type="password" name="conf" 
						   required />
					<input type="checkbox" class="form-check-input">
					<label class="form-check-label">Acepto vender mi alma a Gangsters coreanos</label>
				</div>
			</div>
			
			<!-- registro -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<button class="btn btn-primary w-100" type="submit">Registrar</button>
				</div>
			</div>
		</form>

		<!-- Logueate -->
		<div class="row">
			<div class="col-md-4 mx-auto text-center">
				¿Tienes cuenta?
				<a href="http://localhost/pdf4you/login.php" class="btn btn-link">logueate</a>
			</div>
		</div>

		<!-- volver atrás -->
		<div class="row">
			<div class="col-md-4 mx-auto text-center">
				<a href="http://localhost/pdf4you" class="btn btn-link">volver atrás</a>
			</div>
		</div>

	</div> <!-- container -->

	<br/>

</body>
</html>