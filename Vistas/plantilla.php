<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Registro Notas MVC</title>

	<!--=====================================
	Archivo CSS
	======================================-->	
	<link rel="stylesheet" href="recursos/css/estilos.css">

	<!--=====================================
	PLUGINS DE CSS
	======================================-->	

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!--=====================================
	PLUGINS DE JS
	======================================-->	

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Latest compiled Fontawesome-->
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

	<!--icono de la app-->

	<link rel="shortcut icon" href="Recursos/img/logo.png" type="image/x-icon ">


</head>
<body>

	<!--=====================================
	LOGOTIPO
	======================================-->

	

	<!--=====================================
	BOTONERA
	======================================-->

	<div class="barra">
		<div>
			
			<h3 class="text-center py-3">Registro de Notas</h3>

		</div>
		
		<div class="container">

			<ul class="nav nav-justified py-2 ">
			
			<?php if (isset($_GET["pagina"])): ?>
				

				<?php if ($_GET["pagina"] == "registroEstudiante"): ?>
					<li class="nav-item">
						<a class="nav-link active" href="index.php?pagina=registroEstudiante">Registro Estudiante</a>
					</li>
					<?php else: ?>

					<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=registroEstudiante">Registro Estudiante</a>
					</li>
				<?php endif ?>

			    <?php if ($_GET["pagina"] == "registroCurso"): ?>
					<li class="nav-item">
						<a class="nav-link active" href="index.php?pagina=registrarCurso">Registrar Curso</a>
					</li>
					<?php else: ?>

					<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=registrarCurso">Registrar Curso</a>
					</li>
				<?php endif ?>

				<?php if ($_GET["pagina"] == "inicioEstudiante"): ?>
					<li class="nav-item">
						<a class="nav-link active" href="index.php?pagina=inicioEstudiante">Mostrar Estudiante</a>
					</li>
					<?php else: ?>
						<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=inicioEstudiante">Mostrar Estudiante</a>
					</li>
					<?php endif ?>

					<?php if ($_GET["pagina"] == "InicioNotas"): ?>
					<li class="nav-item">
						<a class="nav-link active" href="index.php?pagina=InicioNotas">Mostrar Notas</a>
					</li>
					<?php else: ?>
						<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=InicioNotas">Mostrar Notas</a>
					</li>
					<?php endif ?>

					<?php if ($_GET["pagina"] == "inicioCurso"): ?>
					<li class="nav-item">
						<a class="nav-link active" href="index.php?pagina=inicioCurso">Mostrar Curso</a>
					</li>
					<?php else: ?>
						<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=inicioCurso">Mostrar Curso</a>
					</li>
					<?php endif ?>
					<?php if ($_GET["pagina"] == "salir"): ?>
					<li class="nav-item">
						<a class="nav-link active" href="index.php?pagina=salir">Salir</a>
					</li>
					<?php else: ?>
						<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=salir">Salir</a>
					</li>
					<?php endif ?>

				

		
			<?php else: ?>

				<!-- GET: $_GET["variable"] Variables que se pasan como parámetros Vía URL ( También conocido como cadena de consulta a través de la URL) 
				Cuando es la primera variable se separa con ?
				las que siguen a continuación se separan con &
				-->
				
				<li class="nav-item">
					<a class="nav-link" href="index.php?Vistas=inicioSesion">Iniciar Sesion</a>
				</li>
				
			<?php endif ?>

			</ul>

		</div>

	</div>

	<!--=====================================
	CONTENIDO
	======================================-->

	<div class="fondo">
		
		<div class="container py-5">

			<?php 

				#ISSET: isset() Determina si una variable está definida y no es NULL

				if(isset($_GET["pagina"])){

					if($_GET["pagina"] == "registroEstudiante" ||
					   $_GET["pagina"] == "inicioEstudiante" ||
					   $_GET["pagina"] == "InicioNotas" ||
					   $_GET["pagina"] == "editarEstudiante" ||
					   $_GET["pagina"] == "registrarNotas" ||
					   $_GET["pagina"] == "registrarCurso" ||
					   $_GET["pagina"] == "editarNotas" ||
					   $_GET["pagina"] == "inicioCurso" ||
					   $_GET["pagina"] == "editarCurso"||
					   $_GET["pagina"] == "salir"){
					

						include "paginas/".$_GET["pagina"].".php";

					}else{

						include "paginas/error404.php";
					}


				}else{

					include "Vistas/inicioSesion.php";


				}

			 ?>

		</div>

	</div>


	
</body>
</html>