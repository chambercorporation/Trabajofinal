<?php
include_once ("conexionbd.php");
class Jugador {
    public $id_usuario;
    public $id_dedicacion;
    public $id_tipo_jugador;
    public $preferencias;
    public $id_historial;
    public $id_experiencia;
    public $id_pericia;
    public $id_catgoria;
    public $id_resultado;

    public function __construct($id_usuario_out,$id_dedicacion_out,$id_tipo_jugador_out,$preferencias_out,$id_historial_out,$id_experiencia_out,$id_pericia_out,$id_catgoria_out,$id_resultado_out)
    {
        $this->id_usuario=$id_usuario_out; 
        $this->id_dedicacion=$id_dedicacion_out;  
        $this->id_tipo_jugador=$id_tipo_jugador_out; 
        $this->preferencias=$preferencias_out; 
        $this->id_historial=$id_historial_out; 
        $this->id_experiencia=$id_experiencia_out;
        $this->id_pericia=$id_pericia_out; 
        $this->id_catgoria=$id_catgoria_out; 
        $this->id_resultado=$id_resultado_out; 
    }
    public function insert_res($conexion,$datos){
    $conexion_bbdd = $conexion -> conectar();
    $query = "INSERT INTO jugador(usuario_ID_usuario, dedicacion_ID_dedicacion, 
    tipo_jugador_ID_Tipo, preferencias_personales_ID_preferencias, historial_ID_historial,
    experiencia_ID_externos, pericia_ID_pericia, categoria_ID_categoria,resultado_ID_resultado)
    VALUES('".$datos['id_usuario']."','".$datos['dedicacion']."','".$datos['tipo']."',
    '".$datos['preferencias']."','".$datos['historial']."','".$datos['conocimientos']."',
    '".$datos['pericia']."','".$datos['juego']."','".$datos['id_juego']."')";
    $resultado = $conexion->consulta_enviar($query,$conexion_bbdd);
    }
}                      

?>