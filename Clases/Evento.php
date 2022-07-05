<?php
include_once ("conexionbd.php");
class Evento extends Conexionbd{
    private $id;
    private $persona_run;
    public $titulo,$descripcion,$fecha,$hora_inicio,$fecha_fin,$tipo,$ubicacion;
    function __construct($id_out,$titulo_out,$descripcion_out,$fecha_out,$hora_inicio_out,$fecha_fin_out,$tipo_out,$ubicacion_out,$persona_id_out,$id_publico_out)
   {
    $this->id=$id_out;
    $this->titulo=$titulo_out;
    $this->descripcion=$descripcion_out;
    $this->fecha=$fecha_out;
    $this->hora_inicio=$hora_inicio_out;
    $this->fecha_fin=$fecha_fin_out;
    $this->tipo=$tipo_out;
    $this->ubicacion=$ubicacion_out;
    $this->personaid=$persona_id_out;
    $this->id_publico=$id_publico_out;


   }
    public function getid(){
         return $this->id;
    }
    public function getPersona_run(){
         return $this->persona_run;
    }
    public function listar_eventos($conexion){
        $conexion_bbdd = $conexion -> conectar();
        $query = "SELECT * FROM ver_datos";
        $resultado = $conexion -> consulta_recibir($query,$conexion_bbdd);
        $fila = array();
        $filas= array();
        while($line = mysqli_fetch_row($resultado)){
            $fila["ID_Evento"]= $line[0];
            $fila["Titulo"] = $line[1];
            $fila["Descripcion"] = $line[2];
            $fila["Fecha"] = $line[3];
            $fila["Hora_Inicio"] = $line[4];
            $fila["Hora_termino"] = $line[5];
            $fila["Tipo"] = $line[6];
            $fila["Ubicacion"]  = $line[7];
            $fila["Nombre"] = $line[8];
            $fila["Apellido"] = $line[9];
            $fila["Tipo_publico"] = $line[10];
            array_push($filas,$fila);
        }
        return $filas;
    }
    public function insertar_evento($conexion,$datos){
        $conexion_bbdd = $conexion -> conectar();
        $query = "INSERT INTO evento (ID_Evento,Titulo,Descripcion,
        Fecha,Hora_inicio,Hora_termino,Tipo,Ubicacion,idpersona_,idpublico_) VALUES
        ('','".$datos["Titulo"]."','".$datos["Descripcion"]."','".$datos["Fecha"]."',
        '".$datos["Hora_inicio"]."','".$datos["Hora_termino"]."','".$datos["Tipo"]."',
        '".$datos["Ubicacion"]."','".$datos["Persona_Run"]."','".$datos["publico"]."')";
        $resultado = $conexion -> consulta_enviar($query,$conexion_bbdd);
    }
    public function editar_evento($conexion,$datos){
        $conexion_bbdd = $conexion -> conectar();
        $query = "UPDATE evento SET Titulo='".$datos["Titulo"]."',Descripcion='".$datos["Descripcion"]."',
        Fecha='".$datos["Fecha"]."',Hora_inicio='".$datos["Hora_inicio"]."',Hora_termino='".$datos["Hora_termino"]."',
            Tipo='".$datos["Tipo"]."',Ubicacion='".$datos["Ubicacion"]."',idpublico_='".$datos["ID_publico"]."' 
        WHERE ID_Evento='".$datos["ID_Evento"]."'";
        $resultado = $conexion->consulta_enviar($query,$conexion_bbdd);
    }
    public function eliminar_evento($conexion,$datos){
        $conexion_bbdd = $conexion -> conectar();
        $query = "DELETE FROM evento WHERE ID_Evento='".$datos["ID_Evento"]."'";
        $resultado = $conexion->consulta_enviar($query,$conexion_bbdd);
    }

}

?>
