<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    include_once "../Clases/conexionbd.php";
    include_once "../Clases/Evento.php";
    
    if (isset($_POST["registrar_evento"])) {
      $conexion = new Conexionbd('localhost','root','','calendario');
      $evento = new Evento('','','','','','','','','','');
      $datos = array ();
      $datos["Titulo"] = $_POST["titulo"];
      $datos["Descripcion"] = $_POST["descripcion"];
      $datos["Fecha"] = $_POST["fecha"];
      $datos["Hora_inicio"] = $_POST["hora_inicio"];
      $datos["Hora_termino"] = $_POST["hora_termino"];
      $datos["Tipo"] = $_POST["tipo"];
      $datos["Persona_Run"] = $_POST["persona"];
      $datos["publico"] = $_POST["publico"];
      $datos["Ubicacion"] = $_POST["ubicacion"];
      $cantidad_registros = $evento->insertar_evento($conexion,$datos);
?>
&nbsp;
<script>swal.fire({title: 'Evento registrado correctamente',icon: 'success'});</script>
<?php
header("Refresh:1; url=eventos.php");
}
else{
?> 
&nbsp;
<script>swal.fire({title: 'Error al registar evento ',icon: 'error'});</script>
<?php
header("Refresh:1; url=eventos.php");
}