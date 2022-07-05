<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include_once("../Clases/conexionbd.php");
include_once("../Clases/Publico.php");
if(isset($_POST["editar_publico"])){
$datos = array();
$datos["idpublico"] = $_POST["idpublico"];
$datos["tipo_evento"] = $_POST["Tipo"];  
$conexion = new Conexionbd('localhost','root','','calendario');
$publico = new Publico ('','');
$cantidad_registros = $publico -> editar_publico($conexion,$datos);
?>
&nbsp;
<script>swal.fire({title: 'Publico actualizado correctamente',icon: 'success'});</script>
<?php
header("Refresh:1; url=publico.php");
}
else{
?> 
&nbsp;
<script>swal.fire({title: 'Error al actualizar publico',icon: 'error'});</script>
<?php
header("Refresh:1; url=publico.php");
}



