<!DOCTYPE html>
<html lang="es">
<head>
	<title>PDF4You</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="css/pdf4youcss.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/navbarcss.css" >
	<script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
	
	<!--<script src="https://code.jquery.com/jquery-3.4.1.js"></script>-->

</head>
<body>

	<div class="container-flex">		
		<div class="navbar navbar-expand-lg navbar-light bg-success">
			<a class="navbar-brand logopdf4you" href="#">PDF4yo♥</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
				</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Inicio</a>
					</li>

					<?php
						if ($ses->checkActiveSession()){ // Si hay sesión activa
					?>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Salir</a>
					</li>
					<?php }	else { //Si NO hay sesión activa ?> 
					<li class="nav-item active">
						<a class="nav-link" href="registro.php">Regístrate</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="login.php">Logueate</a>
					</li>
					<?php } ?>
				</ul> 

			</div>	<!-- end-collapse -->
			<?php
				if ($ses->checkActiveSession()){ // Si hay sesión activa
			?>
			<div class="navbar-text">
				Bienvenido/a, <?= $usr ?> 
			</div>
			<?php }	else {?>
				<div class="navbar-text">
					Bienvenido/a, invitado/a.
				</div>
			<?php } ?>
		</div>	<!-- end-navbar -->