<?php
	require_once "libs/Pdf.php" ;
	require_once "libs/Sesion.php" ;
	require_once "libs/Database.php" ;
	//require_once "libs/libreria.php" ;

	// obtenemos la instancia de la sesión
	$ses = Sesion::getInstance() ;

	// comprobar si hay una sesión activa (Solo los usuarios registrados pueden VER esta página)
	if (!$ses->checkActiveSession())
		 $ses->redirect("index.php") ;

	// hay sesión activa
	// obtenemos el usuario
	$usr = $ses->getUsuario();

	//obtenemos sus privilegios (premium o no)
	//$prem = $ses->getPremium();

	// conectamos con la base de datos
	$db = Database::getInstance("root", "", "PDF4you") ;

	// obtenemos el identificador del pdf
	$id = $_GET["id"]??null ;

	// en función del COP recibido...
	$cop = $_GET["cop"]??null ;

	switch($cop){
		case "add":
			$db->query("INSERT INTO usuario_pdf VALUES (".$usr->getIdUsu().", $id, 0) ;") ;
		break;

		case "delete":
			$db->query("DELETE FROM usuario_pdf WHERE (idUsu=".$usr->getIdUsu().") AND (idPdf=$id) ;") ;
		break;
	}

	// importamos la cabecera de la página
	include_once "libs/navbar.php" ;
	
?>
		<script>
			$(document).ready(function() {
				function query(pto)
				{
					$.ajax({

						method: "get",
						url   : "operaciones.php",
						data  : { "cop" : 2,
								  "ids" : $("#ids").val(), 
								  "ptos": pto }
					})
					  .done(function(data) {

					  	$("#modal").modal({ "show" : true, "backdrop": "static" }) ;
					  	$(".modal-body").html(data) ;

					  }) ;
				}

				// cuando hagamos clic sobre una estrella, actualizamos
				// la puntuación de la serie.
				$("input").click(function(data) 
				{
					query($(data.target).val()) ;
				}) ;

				// cuando se nos pida resetear la puntuación, lo hacemos
				$("#reset").click(function() { query(0) ; })

				//
				$("#delete").click(function() {
					$("#cop").attr("value","delete") ;
				}) ;

			}) ;

		</script>

		<div class="content">
		<?php

			

			// buscamos la serie
			$sql = "SELECT P.*, UP.puntuacion FROM pdf P
					LEFT JOIN usuario_pdf UP
					ON (P.idPdf=UP.idPdf)
					WHERE (P.idPdf=$id) ; " ;

			if (!$db->query($sql)):
				mostrarAlerta("No se encuentra el pdf en la base de datos.", "danger") ;
			else:

				// obtenemos info del serie
				$pdfData = $db->getObject("Pdf") ;
				//Obtenemos el enlace de descarga
				$download = $pdfData->getDownloadPdf();
		?>
			<form method="get">
				
				<input id="ids" type="hidden" name="id" value="<?= $pdfData->getIdPdf() ?>" />
				<input id="cop" type="hidden" name="cop" value="add" />

				<div class="card mb-3 mx-auto" style="max-width: 50rem; background-color: rgba(0,0,0,0.15);">
					<div class="row no-gutters align-items-center h-100">
						<div class="col-md-4">
							<img src="<?= $pdfData->getImgPortada() ?>" class="card-img">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title"><?= $pdfData->getNombrePdf() ?></h5>
								<p class="card-text text-justify"><?= $pdfData->getInfoPdf() ?></p>
								

								<!-- rating -->
								<div class="rating">
									<button id="reset" type="button" class="btn btn-primary btn-sm">reset</button>&nbsp;&nbsp;
									<input type="radio" id="es1" name="ptos" value="5" <?= ($pdfData->puntuacion==5)?"checked":"" ?>/>
									<label for="es1"></label>
									<input type="radio" id="es2" name="ptos" value="4" <?= ($pdfData->puntuacion==4)?"checked":"" ?>/>
									<label for="es2"></label>
									<input type="radio" id="es3" name="ptos" value="3" <?= ($pdfData->puntuacion==3)?"checked":"" ?>/>
									<label for="es3"></label>
									<input type="radio" id="es4" name="ptos" value="2" <?= ($pdfData->puntuacion==2)?"checked":"" ?>/>
									<label for="es4"></label>
									<input type="radio" id="es5" name="ptos" value="1" <?= ($pdfData->puntuacion==1)?"checked":"" ?>/>
									<label for="es5"></label>
								</div>

							</div>	<!-- end-card-body -->
						</div>	<!-- end-col -->
					</div>	<!-- end-row -->

					<div class="card-footer text-right">
						<a class="btn btn-primary" href="pdf<?= $download ?>" role="button">Ver online</a>
						
						<button id="delete" class="btn btn-primary">Eliminar de vistos</button>
						<button class="btn btn-primary">Añadir a vistos</button>

					</div>	<!-- end-card-foter -->

				</div>	<!-- end-card -->

			</form>

		<?php

			endif ;
		?>

		</div>	<!-- end-content -->

	</div>	<!-- end-container -->

	

	<!-- -->
	
	
</body>
</html>

	

	
