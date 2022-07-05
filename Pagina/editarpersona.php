<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once ("../Clases/conexionbd.php");
include_once ("../Clases/Persona.php");
if (isset($_POST['editarpersona'])){
$datos = array();
$datos["idpersona"] = $_POST["idpersona"];
$datos["run"] = $_POST["run"];
$datos["nombre"] = $_POST["nombre"];
$datos["apellido"] = $_POST["apellido"];
$conexion = new Conexionbd ('localhost','root','','calendario');
$persona = new Persona($datos["idpersona"],$datos["run"],$datos["nombre"],$datos["apellido"]);
$cantidad_registros = $persona->editar_persona($conexion,$datos);
?>
&nbsp;
<script>swal.fire({title:'Persona editada correctamente',icon: 'success'});</script>
<?php
header("Refresh:1; url=personas.php");
}
else{
?> 
&nbsp;
<script>swal.fire({title: 'Error al editar persona',icon: 'error'});</script>
<?php
header("Refresh:1; url=personas.php");
}