<?php
include_once ("conexionbd.php");
class Usuario{
    public $id_usuario;
    public $nombre;
    public $contrasenna;
    public $correo;
    public function __construct($id_usuario_out,$nombre_out,$contrasenna_out,$correo_out)
    {
        $this->id_usuario=$id_usuario_out;
        $this->nombre=$nombre_out;
        $this->contrasenna=$contrasenna_out;
        $this->correo=$correo_out;
    }
    
    public function insertarusuario($conexion,$datos){
        $conexion_bbdd = $conexion -> conectar();
        $query = "INSERT INTO usuario(ID_usuario,Nombre,contrasenna,Correo) VALUES('','".$datos['nombre']."','".$datos['clave']."','".$datos['correo']."')";
        $resultado = $conexion->consulta_enviar($query,$conexion_bbdd);
    }
}

?>