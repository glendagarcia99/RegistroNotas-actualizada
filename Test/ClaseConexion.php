<?php
    require "Modelos/conexion.php";

    class pruebaCurso extends Conexion{

        public function insertar($IdCurso,$Nombre,$Descripcion){

            $stmt = Conexion::conectar()->prepare("INSERT INTO testcurso (IdCurso,Nombre, Descripcion) VALUES (:IdCurso,:Nombre,:Descripcion)");
            $stmt->bindParam(':IdCurso',$IdCurso,PDO::PARAM_INT);
            $stmt->bindParam(':Nombre',$Nombre,PDO::PARAM_STR, 25);
            $stmt->bindParam(':Descripcion',$Descripcion,PDO::PARAM_STR,25);
            if($stmt->execute()){

                return true;
    
            }else{

              return false;
        }
    }



       public function actualizar($IdCurso, $Nombre,$Descripcion){
          $stmt = Conexion::conectar()->prepare("UPDATE testcurso SET Nombre=:Nombre, Descripcion=:Descripcion WHERE IdCurso = :IdCurso");
            $stmt->bindParam(':IdCurso',$IdCurso,PDO::PARAM_INT);
            $stmt->bindParam(':Nombre',$Nombre,PDO::PARAM_STR, 25);
            $stmt->bindParam(':Descripcion',$Descripcion,PDO::PARAM_STR,25);
            if($stmt->execute()){

                return true;
    
            }else{

              return false;

        }
    }

       
}

?>