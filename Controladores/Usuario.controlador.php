<?php 


    class ControladorUsuario{
        
	/*=============================================
	Seleccionar usuario
	=============================================*/

	static public function ctrSeleccionarUsuario($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuario::mdlSeleccionarUsuario($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Ingreso usuario
	=============================================*/

        public function ctrIngresoUsuario(){

            if(isset($_POST["ingresoEmail"])){

                    $tabla = "usuario";
                    $item = "Email";
                    $valor = $_POST["ingresoEmail"];

                    $respuesta = ModeloUsuario::mdlSeleccionarUsuario($tabla,$item, $valor);

                    if($respuesta["Email"] === $_POST["ingresoEmail"] && $respuesta["Password"] === $_POST["ingresoPassword"]){

                        $_SESSION["validarIngreso"] = "ok";

                        echo '<script>

                            if ( window.history.replaceState ) {

                                window.history.replaceState( null, null, window.location.href );

                            }
                             
                            window.location = "index.php?pagina=registroEstudiante";

                        </script>';   
                        echo '<div class="alert alert-danger">Se Ingreso al sistema, el email y la contraseña coinciden</div>';

                    }else{

                        echo '<script>

                            if ( window.history.replaceState ) {

                                window.history.replaceState( null, null, window.location.href );

                            }

                        </script>';

                        echo '<div class="alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinciden</div>';
                        
                    }
                    
                    

                }

	    }

    }

?>