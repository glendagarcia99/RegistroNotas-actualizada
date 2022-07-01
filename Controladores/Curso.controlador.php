<?php 

    
    Class ControladorCurso{

        /*==== Registro Curso ====*/
        static public function ctrAgregarCurso(){

            if(isset($_POST["agregarCurso"])){
    
                $tabla = "curso";
    
                $datos = array("Nombre" => $_POST["agregarCurso"],
                               "Descripcion" => $_POST["agregarDesc"]);
    
                $respuesta = CursoModelo::mdlAgregarCurso($tabla, $datos);
    
                return $respuesta;
    
            }
    
        }

        /*==== Seleccionar curso ====*/

        static public function ctrSeleccionarRegistroCurso($item, $valor){

            $tabla = "curso";
    
            $respuesta = CursoModelo::mdlSeleccionarCurso($tabla, $item, $valor);
    
            return $respuesta;
    
        }

         /*==== Actualizar curso ====*/

        static public function ctrActualizarCurso(){

            if(isset($_POST["actualizarNombreCurso"])){
    
                $tabla = "curso";
    
                $datos = array (
                    "IdCurso"=> $_POST["IdCurso"],
                    "Nombre"=> $_POST["actualizarNombreCurso"],
                    "Descripcion"=> $_POST["actualizarDescripcion"]
                );
                $respuesta = CursoModelo::mdlActualizarCurso($tabla,$datos);
    
                return $respuesta;
    
            }

        }

         /*==== Eliminar curso ====*/

            
	     public function ctrEliminarCurso(){

		if(isset($_POST["eliminarCurso"])){

			$tabla = "curso";
			$valor = $_POST["eliminarCurso"];

			$respuesta = CursoModelo::mdlEliminarCurso($tabla, $valor);

			if($respuesta == "ok"){

				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?pagina=inicioCurso";

				</script>';

			}

		}


    }
}
    


