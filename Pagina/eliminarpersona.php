<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once "../Clases/conexionbd.php";
include_once "../Clases/Persona.php";

if (isset($_GET["eliminar_persona"])){
    $datos = array();
    $datos["idpersona"] = $_GET["idpersona"];
    $conexion = new Conexionbd('localhost','root','','calendario');
    $persona = new Persona($datos["idpersona"],'','','');
    $cantidad_registros = $persona->eliminar_persona($conexion,$datos);
    $listar_persona = $persona ->listar_personas($conexion);
?>
&nbsp;
<script>swal.fire({title: 'Persona eliminada correctamente',icon: 'success'});</script>
<?php
header("Refresh:1; url=personas.php");
}
else{
?> 
&nbsp;
<script>swal.fire({title: 'Error al eliminar persona ',icon: 'error'});</script>
<?php
header("Refresh:1; url=personas.php");
}