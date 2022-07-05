<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once "../Clases/conexionbd.php";
include_once "../Clases/Evento.php";
if (isset($_POST["editar_evento"])) {
  $datos = array ();
  $datos["ID_Evento"] = $_GET["ID_Evento"];
  $datos["Titulo"] = $_POST["titulo"];
  $datos["Descripcion"] = $_POST["descripcion"];
  $datos["Fecha"] = $_POST["fecha"];
  $datos["Hora_inicio"] = $_POST["hora_inicio"];
  $datos["Hora_termino"] = $_POST["hora_termino"];
  $datos["Tipo"] = $_POST["tipo"];
  $datos["Ubicacion"] = $_POST["ubicacion"];
  $datos["ID_publico"] =  $_POST["publico"];
  $conexion = new Conexionbd('localhost','root','','calendario');
  $evento = new Evento( $datos["ID_Evento"],$datos["Titulo"],$datos["Descripcion"],$datos["Fecha"]
  ,$datos["Hora_inicio"],$datos["Hora_termino"],$datos["Tipo"],$datos["Ubicacion"]
  ,$datos["ID_publico"],$datos["ID_publico"]); 
  $cantidad_registros = $evento->editar_evento($conexion,$datos);
  $listar_eventos = $evento->listar_eventos($conexion);
?>
&nbsp;
<script>swal.fire({title: 'Evento editado correctamente',icon: 'success'});</script>
<?php
header("Refresh:1; url=eventos.php");
}
else{
?> 
&nbsp;
<script>swal.fire({title: 'Error al editar evento',icon: 'error'});</script>
<?php
header("Refresh:1; url=eventos.php");
}




   