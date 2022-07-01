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
if(isset($_GET["IdEstudiante"])){

	$item = "IdEstudiante";
	$valor = $_GET["IdEstudiante"];

	$usuario = ControladorEstudiante::ctrSeleccionarRegistroEstudiante($item, $valor);

}
$cursos = ControladorCurso::ctrSeleccionarRegistroCurso(null, null);

?>

<div class="d-flex justify-content-center text-center">

<form class="p-5 bg-light" method="post">
    <div class="form-group">
        <label for="Nota">Nota 1:</label>

        <div class="input-group">
            
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-book"></i>
                </span>
            </div>

            <input type="text" class="form-control" id="Nota1" name="registroNota1">

        </div>
        
    </div>

    <div class="form-group">

        <label for="Nota">Nota 2:</label>

        <div class="input-group">
            
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-book"></i>
                </span>
            </div>

            <input type="text" class="form-control" id="Nota2" name="registroNota2">
        
        </div>
        
    </div>

    <div class="form-group">
        <label for="Nota">Nota 3:</label>

        <div class="input-group">
            
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-book"></i>
                </span>
            </div>

            <input type="text" class="form-control" id="Nota3" name="registroNota3">
           
        </div>
        

        <div class="form-group">
        <label for="Nota"> Curso:</label>

		<select name="registroIdCurso" class="form-control" >
		<option value="">Seleccione el curso:</option>
		<?php 
			foreach ($cursos as $key => $value):
				echo '<option value="'.$value["IdCurso"].'">'.$value["Nombre"].'</option>';
			endforeach;
		?>
		</select>

          
            <input type="hidden" id="IdEstudiante" name="registroIdEstudiante" value="<?php echo $usuario["IdEstudiante"]; ?>">
        </div>
        
    </div>

    <?php 

    /*=============================================
    FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO NO ESTÁTICO 
    =============================================*/
    
    // $registro = new ControladorFormularios();
    // $registro -> ctrRegistro();

    /*=============================================
    FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO ESTÁTICO 
    =============================================*/

    $registro = ControladorNotas::ctrRegistroNotas();

    if($registro == "ok"){

        echo '<script>

            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href );

            }

        </script>';

        echo '<div class="alert alert-success">Las notas han sido registradas con exito</div>';
    
    }else if($registro == "existe"){
        echo '<script>

            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href );

            }

        </script>';

        echo '<div class="alert alert-warning"> Ups! El registro de esta materia ya existe</div>';
    }

    ?>
    
    <button type="submit" class="boton-notas">Agregar nota</button>

</form>

</div>