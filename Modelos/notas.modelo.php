<?php

require_once "conexion.php";


class ModeloNotas{
/*=============================================
	REGISTRO DE NOTAS 
	=============================================*/
	static public function mdlRegistroNotas($tabla, $datos){

		if(!empty($datos["IdCurso"])){
			$stmt=Conexion::conectar()->prepare("SELECT count(*)from $tabla where IdCurso= :IdCurso and IdEstudiante= :IdEstudiante");
			$stmt->bindvalue(":IdCurso",$datos["IdCurso"]);
			$stmt->bindvalue(":IdEstudiante",$datos["IdEstudiante"]);
			$stmt->execute();
			$count=$stmt->fetchColumn();

		 }
		 if($count==0){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nota1, Nota2, Nota3,IdEstudiante,IdCurso ) VALUES (:Nota1, :Nota2, :Nota3,:IdEstudiante,:IdCurso)");

		$stmt->bindParam(":Nota1", $datos["Nota1"], PDO::PARAM_STR);
		$stmt->bindParam(":Nota2", $datos["Nota2"], PDO::PARAM_STR);
		$stmt->bindParam(":Nota3", $datos["Nota3"], PDO::PARAM_STR);
        $stmt->bindParam(":IdEstudiante", $datos["IdEstudiante"], PDO::PARAM_STR);
		$stmt->bindParam(":IdCurso", $datos["IdCurso"], PDO::PARAM_STR);

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
	SELECCIONAR REGISTRO DE NOTAS 
	============================================= */

	static public function mdlSeleccionarRegistroNotas($tabla, $tablaC, $tablaE, $item, $valor){

		if($item == null && $valor == null){

			$stmt = Conexion::conectar()->prepare("SELECT IdNota, e.Nombre, c.Nombre AS nombre_curso, n.Nota1, n.Nota2, n.Nota3, ((Nota1 + Nota2 + Nota3)/3) 
			AS Promedio, n.IdEstudiante, n.IdCurso FROM $tabla AS n INNER JOIN $tablaE AS e ON e.IdEstudiante = n.IdEstudiante 
			INNER JOIN $tablaC AS c ON c.IdCurso = n.IdCurso WHERE e.Estado = 1 ORDER BY IdNota ");
			
			$stmt->execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT IdNota, e.Nombre, c.Nombre AS nombre_curso, n.Nota1, n.Nota2, n.Nota3, ((Nota1 + Nota2 + Nota3)/3) 
			AS Promedio, n.IdEstudiante, n.IdCurso FROM $tabla AS n INNER JOIN $tablaE AS e ON e.IdEstudiante = n.IdEstudiante 
			INNER JOIN $tablaC AS c ON c.IdCurso = n.IdCurso WHERE $item = :$item ORDER BY IdNota ");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt -> fetch();
		}

		$stmt->close();

		$stmt = null;	

	}

	/*=============================================
	ACTUALIZAR REGISTRO DE NOTAS 
	=============================================*/

	static public function mdlActualizarRegistroNotas($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nota1=:Nota1, Nota2=:Nota2, Nota3=:Nota3,IdEstudiante=:IdEstudiante,IdCurso=:IdCurso WHERE IdNota = :IdNota");

		$stmt->bindParam(":Nota1", $datos["Nota1"], PDO::PARAM_STR);
		$stmt->bindParam(":Nota2", $datos["Nota2"], PDO::PARAM_STR);
		$stmt->bindParam(":Nota3", $datos["Nota3"], PDO::PARAM_STR);
		$stmt->bindParam(":IdNota", $datos["IdNota"], PDO::PARAM_INT);
		$stmt->bindParam(":IdCurso", $datos["IdCurso"], PDO::PARAM_INT);
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