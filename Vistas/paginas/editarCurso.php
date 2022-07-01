<?php
 if(!isset($_SESSION["validarIngreso"])){

    echo '<script>window.location = "index.php?Vistas=inicioSesion";</script>';

    return;

}else{

    if($_SESSION["validarIngreso"] != "ok"){

        echo '<script>window.location = "index.php?Vistas=inicioSesion";</script>';

        return;
    }
    
}
if(isset($_GET["IdCurso"])){

	$item = "IdCurso";
	$valor = $_GET["IdCurso"];

	$usuario = ControladorCurso::ctrSeleccionarRegistroCurso($item, $valor);

}

?>

<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-user"></i>
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $usuario["Nombre"]; ?>" placeholder="Escriba el nuevo nombre" id="Nombre" name="actualizarNombreCurso">

			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-envelope"></i>
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $usuario["Descripcion"]; ?>" placeholder="Escriba la nueva descripcion" id="Curso" name="actualizarDescripcion">
                <input type="hidden" name="IdCurso" value="<?php echo $usuario["IdCurso"]; ?>">
			
			</div>
			
		</div>


		<?php

		$actualizar = ControladorCurso::ctrActualizarCurso();

		if($actualizar == "ok"){

			echo '<script>

			if ( window.history.replaceState ) {

				window.history.replaceState( null, null, window.location.href );

			}

			</script>';

			echo '<div class="alert alert-success">El curso ha sido actualizado</div>


			<script>

				setTimeout(function(){
				
					window.location = "index.php?pagina=inicioCurso";

				},3000);

			</script>

			';

		}

		?>
		
		<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>

</div>