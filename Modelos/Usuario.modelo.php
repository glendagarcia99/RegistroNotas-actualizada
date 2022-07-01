<?php 

require_once "conexion.php";

class ModeloUsuario{

    /*=============================================
    Seleccionar Usuario
    =============================================*/

    static public function mdlSeleccionarUsuario($tabla, $item, $valor){

        if($item == null && $valor == null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY IdUsuario DESC");

            $stmt->execute();

            return $stmt -> fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY IdUsuario DESC");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt -> fetch();
        }

        $stmt->close();

        $stmt = null;	

    }

    /*=============================================
	Actualizar Usuario
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre=:Nombre, Email=:Email, Password=:Password,FechaIngreso=:FechaIngreso, IdRol=:IdRol WHERE IdUsuario = :IdUsuario");

		$stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Email", $datos["Email"], PDO::PARAM_STR);
		$stmt->bindParam(":Password", $datos["Password"], PDO::PARAM_STR);
        $stmt->bindParam(":FechaIngreso", $datos["FechaIngreso"], PDO::PARAM_STR);
        $stmt->bindParam(":IdRol", $datos["IdRol"], PDO::PARAM_STR);
        $stmt->bindParam(":IdUsuario", $datos["IdUsuario"], PDO::PARAM_INT);

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