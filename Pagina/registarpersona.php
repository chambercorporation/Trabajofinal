<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once "../Clases/Conexionbd.php";
include_once "../Clases/Persona.php";

if (isset($_POST['registrar_persona'])) {
    $conexion = new Conexionbd();
$conexion_bbdd = $conexion -> conectar();
$persona = new Persona('','','','','');
    $datos = array();
    $datos['run'] = $_POST['run'];
    $datos['nombre'] = $_POST['nombre'];
    $datos['apellido'] = $_POST['apellido'];
    $cantidad_registros = $persona->insertar_persona($conexion,$datos);
?>
&nbsp;
<script>swal.fire({title: 'Persona registrada correctamente',icon: 'success'});</script>
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