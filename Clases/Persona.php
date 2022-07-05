<?php
include_once "../Clases/Conexionbd.php";
class Persona{
    private $run;
    private $nombre;
    private $apellido;
    public function __construct($run_out,$nombre_out,$apellido_out){
        $this->run = $run_out;
        $this->nombre = $nombre_out;
        $this->apellido = $apellido_out;
    }   
    public function getRun(){
        return $this->run;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function listar_personas($conexion){
        $conexion_bbdd = $conexion -> conectar();
        $query = "SELECT * FROM persona";
        $resultado = $conexion -> consulta_recibir($query,$conexion_bbdd);
        $fila = array();
        $filas= array();
        while($line = mysqli_fetch_row($resultado)){
            $fila["idpersona"]= $line[0];
            $fila["Run"] = $line[1];
            $fila["Nombre"] = $line[2];
            $fila["Apellido"] = $line[3];
            array_push($filas,$fila);
        }
        return $filas;
    }
    public function insertar_persona($conexion,$datos){
        $conexion_bbdd = $conexion -> conectar();
        $query = "INSERT INTO persona (Run,Nombre,Apellido) VALUES 
        ('".$datos['run']."','".$datos['nombre']."','".$datos['apellido']."')";
        $resultado = $conexion -> consulta_enviar($query,$conexion_bbdd);

    }
    public function editar_persona($conexion,$datos){
        $conexion_bbdd = $conexion -> conectar();
        $query = "UPDATE persona SET Run='".$datos['run']."',Nombre='".$datos['nombre']."',
        Apellido='".$datos['apellido']."' WHERE idpersona='".$datos['idpersona']."'";
        $resultado = $conexion -> consulta_enviar($query,$conexion_bbdd);

    }   
    public function eliminar_persona($conexion,$datos){
        $conexion_bbdd = $conexion -> conectar();
        $query = "DELETE FROM persona WHERE idpersona = '".$datos['idpersona']."'";
        $resultado = $conexion -> consulta_enviar($query,$conexion_bbdd);
  
    }
    
}
?>