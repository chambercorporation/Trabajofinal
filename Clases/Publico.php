<?php
include_once ("../Clases/Conexionbd.php");
class Publico{
    public $id;
    public $tipo_evento;
    public function __construct($id_out,$tipo_evento_out){
        $this->id = $id_out;
        $this->tipo_evento = $tipo_evento_out;
    }
    public function listar_publico($conexion){
        $conexion_bbdd = $conexion -> conectar();
        $query = "SELECT * FROM publico";
        $resultado = $conexion -> consulta_recibir($query,$conexion_bbdd);
        $fila = array();
        $filas= array();
        while ($line = mysqli_fetch_row($resultado)){
            $fila["idpublico"]= $line[0];
            $fila["Tipo"] = $line[1];
            array_push($filas,$fila);
        }
        return $filas;
    }
    public function insertpublico($conexion,$datos){
        $conexion_bbdd = $conexion -> conectar();
        $query = "INSERT INTO publico (Tipo) VALUES 
        ('".$datos['tipo_evento']."')";
        $resultado = $conexion -> consulta_enviar($query,$conexion_bbdd);
    }
    public function editar_publico($conexion,$datos){
        $conexion_bbdd = $conexion -> conectar();
        $query = "UPDATE publico SET Tipo='".$datos['tipo_evento']."' WHERE idpublico='".$datos['idpublico']."'";
        $resultado = $conexion -> consulta_enviar($query,$conexion_bbdd);
    }
    public function eliminarpublico($conexion,$datos){
        $conexion_bbdd = $conexion -> conectar();
        $query = "DELETE FROM publico WHERE idpublico='".$datos['idpublico']."'";
        $resultado = $conexion -> consulta_enviar($query,$conexion_bbdd);
    }
}

?>