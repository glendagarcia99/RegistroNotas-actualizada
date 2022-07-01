<?php

require_once "conexion.php";

class ModeloEstudiante{

	/*=============================================
	Ingresar Estudiante
	=============================================*/

	static public function mdlIngresarEstudiante($tabla, $datos){

		if(!empty($datos["Correo"])){
			$stmt=Conexion::conectar()->prepare("SELECT count(*)from $tabla where Correo = :Correo ");
			$stmt->bindvalue(":Correo",$datos["Correo"]);
			$stmt->execute();
			$count=$stmt->fetchColumn();

		 }
		 if($count==0){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nombre,Correo,Telefono ,FechaIngreso) VALUES (:Nombre,:Correo,:Telefono,:FechaIngreso)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
		$stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":FechaIngreso", $datos["FechaIngreso"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	
		 }else{

		return "existe";

		 }

	}

	/*=============================================
	Seleccionar Registro
	=============================================*/

	static public function mdlSeleccionarRegistro($tabla, $item, $valor){
//esta parte es la que falla para levantar la tabla de estudiantes
		if($item == null && $valor == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY IdEstudiante ");

			$stmt->execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla WHERE $item = :$item ORDER BY IdEstudiante ");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt -> fetch();
		}

		$stmt->close();

		$stmt = null;	

	}

	/*=============================================
	Actualizar Estudiante
	=============================================*/

	static public function mdlActualizarEstudiante($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre=:Nombre, Correo=:Correo, Telefono=:Telefono,FechaIngreso=:FechaIngreso, Estado=:Estado WHERE IdEstudiante = :IdEstudiante");

		$stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
		$stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":FechaIngreso", $datos["FechaIngreso"], PDO::PARAM_STR);
		$stmt->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);
		$stmt->bindParam(":IdEstudiante", $datos["IdEstudiante"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}


}