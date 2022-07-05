<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once "../Clases/conexionbd.php";
include_once "../Clases/Evento.php";
if (isset($_GET["eliminar_evento"])) {
    $datos = array ();
    $datos["ID_Evento"] = $_GET["ID_Evento"];
    $conexion = new Conexionbd('localhost','root','','calendario');
    $evento = new Evento($datos["ID_Evento"],'','','','','','','','','','');
    $cantidad_registros = $evento->eliminar_evento($conexion,$datos);  // Para verificar que se elimino el evento}
    $listar_eventos = $evento->listar_eventos($conexion);
?>
&nbsp;
<script>swal.fire({title: 'Evento eliminado correctamente',icon: 'success'});</script>
<?php
header("Refresh:1; url=eventos.php");
}
else{
?> 
&nbsp;
<script>swal.fire({title: 'Error al eliminar evento ',icon: 'error'});</script>
<?php
header("Refresh:1; url=eventos.php");
}