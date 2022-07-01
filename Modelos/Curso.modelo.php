<?php 

    require_once "conexion.php";

    class CursoModelo{
        
            /*==== Agregar curso ==== */

            static public function mdlAgregarCurso($tabla, $datos){

                #statement: declaración
        
                #prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.
        
                $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nombre, Descripcion) VALUES (:Nombre, :Descripcion)");
        
                #bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        
                $stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
                $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
        
                if($stmt->execute()){
        
                    return "ok";
        
                }else{
        
                    print_r(Conexion::conectar()->errorInfo());
        
                }
        
                $stmt->close();
        
                $stmt = null;	
        
            }

            /*==== Seleccionar curso ====*/

            static public function mdlSeleccionarCurso($tabla, $item, $valor){

                if($item == null && $valor == null){
        
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY IdCurso");
        
                    $stmt->execute();
        
                    return $stmt -> fetchAll();
        
                }else{
        
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY IdCurso");
        
                    $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        
                    $stmt->execute();
        
                    return $stmt -> fetch();
                }
        
                $stmt->close();
        
                $stmt = null;	
        
            }

             /*==== Actualizar curso ====*/

            static public function mdlActualizarCurso($tabla, $datos){
	
                $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre=:Nombre, Descripcion=:Descripcion WHERE IdCurso = :IdCurso");
        
                $stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
                $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
                $stmt->bindParam(":IdCurso", $datos["IdCurso"], PDO::PARAM_INT);
        
                if($stmt->execute()){
        
                    return "ok";
        
                }else{
        
                    print_r(Conexion::conectar()->errorInfo());
        
                }
        
                $stmt->close();
        
                $stmt = null;	
        
            }

            /*==== Eliminar curso ====*/

            static public function mdlEliminarCurso($tabla, $valor){
	
                $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IdCurso = :IdCurso");
        
                $stmt->bindParam(":IdCurso", $valor, PDO::PARAM_STR);
        
                if($stmt->execute()){
        
                    return "ok";
        
                }else{
        
                    print_r(Conexion::conectar()->errorInfo());
        
                }
        
                $stmt->close();
        
                $stmt = null;	
        
            }



    }


?>