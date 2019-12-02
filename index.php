<?php
	require_once "libs/Pdf.php" ;
	require_once "libs/Sesion.php" ;
	require_once "libs/Database.php" ;
	//require_once "libs/libreria.php" ;

	define("MAX_COL", 3) ;	// número de columnas
	define("MAX_ITEM", 6) ;	// ítems por página

	// obtenemos la instancia de la sesión
	$ses = Sesion::getInstance() ;

	// comprobar si hay una sesión activa
	if (!$ses->checkActiveSession()){
		$usr = "invitado";
	} else {
		// Si hay sesión activa, obtenemos el usuario
		$usr = $ses->getUsuario();
	}
		 /*$ses->redirect("index.php") ;*/
		 
	// importación de la cabecera de la página
	require_once "libs/navbar.php" ;
?>
		<div class="content">

			<?php

				// conectamos con la base de datos
				$db = Database::getInstance("root", "", "pdf4you") ;

				// calculamos el total de registros
				$db->query("SELECT COUNT(*) AS total FROM pdf ;") ;
				//echo "<pre>".print_r($db,true)."</pre>" ; //Pruebas
				//echo "<pre>".print_r($db,true)."</pre>" ; //Pruebas
				//echo "<pre>".print_r($_POST,true)."</pre>" ; //Pruebas
				$item = $db->getObject() ;
				$total = $item->total ;

				// obtenemos el número de página
				// si no se nos pasa ninguna, fijamos la primera
				$pag = isset($_GET["p"])?$_GET["p"]:1 ;

				// determinamos el punto de partida para la consulta
				$ini = ($pag - 1) * MAX_ITEM ;

				// buscamos las series correspondientes a la página actual
				if (!$db->query("SELECT * FROM pdf LIMIT $ini, " . MAX_ITEM . " ;")){
					mostrarAlerta("No existen PDFs en la base de datos", "danger") ;
				} else {
					echo "<div class=\"row pb-5 pt-3 fondoPdf\">" ;
					$contCol = 0;
					do {

						$col = 0;
						while (($col < MAX_COL) && ($item = $db->getObject("Pdf"))){
			?>
							<div class="col col-lg-4">
								<div class="card mx-auto" style="width:12rem;">
									<img src="<?= $item->getImgPortada() ?>" class="card-img-top" />

									<div class="card-body text-center bg-info rounded-bottom">
										<a href="verPdf.php?id=<?= $item->getIdPdf() ?>">
											<h6 class="card-title"><?= $item->getNombrePdf() ?></h6>
										</a>
									</div>	<!-- end-card-body -->
								</div>	<!-- end-card -->
							</div>	<!-- end-col -->

			<?php
							$col++ ;
							$contCol++;
						}
						//echo "</div>" ;
						if ($contCol == MAX_COL){echo "</div><div class=\"row pb-5 pt-3 fondoPdf\">" ; }

					}  while ($item);
					echo "</div>" ;
					// añadimos una paginación sencilla
					$ant_cond = ($pag==1) ;
					$sig_cond = (($pag*MAX_ITEM) >= $total) ;

			?>

			
			<nav aria-label="paginación">
				<ul class="pagination justify-content-center">

					<!-- anterior -->
					<li class="page-item <?= $ant_cond?"disabled":"" ?>">
						<a class="page-link" href="<?= $ant_cond?"#":"index.php?p=".($pag-1) ?>">anterior</a>
					</li>	
					
					<!-- siguiente -->
					<li class="page-item <?= $sig_cond?"disabled":"" ?>">
						<a class="page-link" href="<?= $sig_cond?"#":"index.php?p=".($pag+1) ?>">siguiente</a>
					</li>
				</ul>
			</nav>
			<?php

				}
			?>

		</div>	<!-- end-content -->

	</div>	<!-- end-container -->
	
</body>
</html>