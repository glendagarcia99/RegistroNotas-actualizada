<?php
    use PHPUnit\Framework\TestCase;

    require "ClaseConexion.php";

    class CursoTest extends TestCase{
        /** @test */
        public function test(){
            $curso = new pruebaCurso(); //

          
             $this->assertTrue($curso->insertar('5','Algoritmos','Ingenieria'));

             $this->assertTrue($curso->actualizar('3','Redes','Ingenieria'));

            
        }
    }
?>