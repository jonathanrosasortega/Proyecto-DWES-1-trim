<?php
	require_once "libs/Pdf.php" ;
	require_once "libs/Sesion.php" ;
	require_once "libs/Database.php" ;
	require_once "libs/libreria.php" ;

	// obtenemos la instancia de la sesión
	$ses = Sesion::getInstance() ;

	// comprobar si hay una sesión activa
	if (!$ses->checkActiveSession())
		 $ses->redirect("index.php") ;

	// hay sesión activa
	// obtenemos el usuario
	$usr = $ses->getUsuario() ;

	// conectamos con la base de datos
	$db = Database::getInstance("root", "", "PDF4you") ;

	// obtenemos el identificador del pdf
	$id = $_GET["id"]??null ;

	// en función del COP recibido...
	$cop = $_GET["cop"]??null ;

	switch($cop):

		case "add":
				$db->query("INSERT INTO usuario_pdf VALUES (" . $usr->getIdUsu() . ", $id, 0) ;") ;
			break ;

		case "delete":
				$db->query("DELETE FROM usuario_pdf WHERE (idUsu=".$usr->getIdUsu().") AND (idPdf=$id) ;") ;
			break ;

	endswitch ;


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
<!--SELECT S.*, ifnull(US.puntuacion, 0)
FROM serie S INNER JOIN usuario_serie US ON (S.idSer=ifnull(US.idSer, S.idSer))
WHERE (S.idSer=5) AND (US.idUsu=1)

	SELECT S.*, US.puntuacion
FROM serie S LEFT JOIN usuario_serie US ON (S.idSer=US.idSer)
WHERE (S.idSer=5) ;

SELECT S.*, US.puntuacion FROM serie S
					LEFT JOIN usuario_serie US
					ON (S.idSer=US.idSer)
					WHERE (S.idSer=$id) ;

SELECT S.*, US.puntuacion FROM serie S
					LEFT JOIN usuario_serie US
					ON (S.idSer=US.idSer)
					WHERE (S.idSer=$id) ; 
-->

		<div class="content">
		<?php

			

			// buscamos la serie
			$sql = "SELECT S.*, US.puntuacion FROM pdf S
					LEFT JOIN usuario_pdf US
					ON (S.idPdf=US.idPdf)
					WHERE (S.idPdf=$id) ; " ;

			if (!$db->query($sql)):
				mostrarAlerta("No se encuentra el pdf en la base de datos.", "danger") ;
			else:

				// obtenemos info de la serie
				$show = $db->getObject("Pdf") ;
		?>
			<form method="get">
				
				<input id="ids" type="hidden" name="id" value="<?= $show->getIdPdf() ?>" />
				<input id="cop" type="hidden" name="cop" value="add" />

				<div class="card mb-3 mx-auto" style="max-width: 50rem;">
					<div class="row no-gutters align-items-center h-100">
						<div class="col-md-4">
							<img src="<?= $show->getPoster() ?>" class="card-img">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title"><?= $show->getTitulo() ?></h5>
								<p class="card-text text-justify"><?= $show->getArgumento() ?></p>
								<p class="card-text">
									<strong>Género:</strong> <?= $show->getGenero() ?><br/>
									<strong>Plataforma:</strong> <?= $show->getPlataforma() ?><br/>
									<strong>Fecha de estreno:</strong> <?= date("d/m/Y", strtotime($show->getFecEmision())) ?>
								</p>

								<!-- rating -->
								<div class="rating">
									<button id="reset" type="button" class="btn btn-primary btn-sm">reset</button>&nbsp;&nbsp;
									<input type="radio" id="es1" name="ptos" value="5" <?= ($show->puntuacion==5)?"checked":"" ?>/>
									<label for="es1"></label>
									<input type="radio" id="es2" name="ptos" value="4" <?= ($show->puntuacion==4)?"checked":"" ?>/>
									<label for="es2"></label>
									<input type="radio" id="es3" name="ptos" value="3" <?= ($show->puntuacion==3)?"checked":"" ?>/>
									<label for="es3"></label>
									<input type="radio" id="es4" name="ptos" value="2" <?= ($show->puntuacion==2)?"checked":"" ?>/>
									<label for="es4"></label>
									<input type="radio" id="es5" name="ptos" value="1" <?= ($show->puntuacion==1)?"checked":"" ?>/>
									<label for="es5"></label>
								</div>

							</div>	<!-- end-card-body -->
						</div>	<!-- end-col -->
					</div>	<!-- end-row -->

					<div class="card-footer text-right">
						<button id="delete" class="btn btn-primary">Eliminar de vistos</button>
						<button class="btn btn-primary">Añadir a vistos</button>
						<!--<a class="btn btn-primary" href="info.php?cop=delete&id=<?= $id ?>">Eliminar de vistos</a>
						<a class="btn btn-primary" href="info.php?cop=add&id=<?= $id ?>">Añadir a vistos</a>-->
					</div>	<!-- end-card-foter -->

				</div>	<!-- end-card -->

			</form>

		<?php

			endif ;
		?>

		</div>	<!-- end-content -->

	</div>	<!-- end-container -->

	<!-- modal -->
	<div id="modal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">PDF4you</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Modal body text goes here.</p>
				</div>
			</div>
		</div>
	</div>

	<!-- -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</body>
</html>

	

	
