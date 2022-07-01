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
if(isset($_GET["IdNota"])){

	$item = "IdNota";
	$valor = $_GET["IdNota"];

	$usuario = Controladornotas::ctrSeleccionarRegistrosNotas($item, $valor);

}

?>


<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">
         <div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-book"></i>
					</span>
				</div>

				<input type="number" class="form-control" value="<?php echo $usuario["Nota1"]; ?>" placeholder="Escriba la nueva nota 1:" id="Nota1" name="actualizarNota1">

			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-book"></i>
					</span>
				</div>

				<input type="number" class="form-control" value="<?php echo $usuario["Nota2"]; ?>" placeholder="Escriba la nueva nota 2:" id="Nota2" name="actualizarNota2">

			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-book"></i>
					</span>
				</div>

				<input type="number" class="form-control" value="<?php echo $usuario["Nota3"]; ?>" placeholder="Escriba la nueva nota 3:" id="Nota3" name="actualizarNota3">
			
			</div>
			

		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">

					</span>
				</div>

				<input type="hidden" class="form-control" value="<?php echo $usuario["IdCurso"]; ?>" placeholder="Escriba el nuevo Id Curso:" id="IdCurso" name="actualizarIdCurso">
				<input type="hidden" class="form-control" value="<?php echo $usuario["IdEstudiante"]; ?>" placeholder="Escriba el Id Estudiante:" id="IdEstudiante" name="actualizarIdEstudiante">
				<input type="hidden" name="IdNota" value="<?php echo $usuario["IdNota"]; ?>">

			</div>

		</div>


		<?php

		$actualizar = Controladornotas::ctrActualizarRegistroNotas();

		if($actualizar == "ok"){

			echo '<script>

			if ( window.history.replaceState ) {

				window.history.replaceState( null, null, window.location.href );

			}

			</script>';

			echo '<div class="alert alert-success">Las notas han sido actualizado</div>


			<script>

				setTimeout(function(){
				
					window.location = "index.php?pagina=InicioNotas";

				},3000);

			</script>

			';

		}

		?>
		
		<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>

</div>