<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
include_once("../Clases/conexionbd.php");
include_once("../Clases/Publico.php");
if(isset($_POST["registrar_publico"])){
$conexion = new Conexionbd('localhost','root','','calendario');
$publico = new Publico ('','');
    $datos = array();
    $datos["tipo_evento"] = $_POST["Tipo"];
    $cantidad_registros = $publico -> insertpublico($conexion,$datos);    
      ?>
     &nbsp;
    <script>swal.fire({title: 'Publico registrado correctamente',icon: 'success'});</script>
    <?php
     header("Refresh:1; url=publico.php");
      }
    else{
      ?> 
     &nbsp;
    <script>swal.fire({title: 'Error al registrar publico',icon: 'error'});</script>
    <?php
      header("Refresh:1; url=publico.php");
    }


 