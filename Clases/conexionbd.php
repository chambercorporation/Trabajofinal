<?php
class Conexionbd{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "calendario";
    public function conectar(){
        $conexion = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if($conexion->connect_error){
            die("Error de conexion: ".$conexion->connect_error);
        }
        return $conexion;
    }
    public function cerrar_conexion($conexion){
        mysqli_close($conexion);
      }

    // select
      public function consulta_recibir($consulta,$con_bbdd){
          $resultado = mysqli_query($con_bbdd, $consulta);
          return $resultado;
      }
      
    // insert, update, delete
      public function consulta_enviar($consulta,$con_bbdd){
          $resultado = mysqli_query($con_bbdd, $consulta);
          return $resultado;

      }

}


?>
