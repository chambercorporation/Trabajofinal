<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include_once ("../Clases/conexionbd.php");
include_once ("../Clases/Publico.php");
if(isset($_GET["eliminar_publico"])){
$conexion = new Conexionbd('localhost','root','','calendario');
$publico = new Publico ('','');
$datos = array();
$datos["idpublico"] = $_GET["idpublico"];
$cantidad_registros = $publico -> eliminarpublico($conexion,$datos);
?>
&nbsp;
<script>swal.fire({title: 'Publico eliminado correctamente',icon: 'success'});</script>
<?php
header("Refresh:1; url=publico.php");
}
else{
?> 
&nbsp;
<script>swal.fire({title: 'Error al eliminar publico',icon: 'error'});</script>
<?php
header("Refresh:1; url=publico.php");
}



?>