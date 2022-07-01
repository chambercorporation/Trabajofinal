<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
  include("../Clases/conexionbd.php");
  include("../Clases/usuario.php");
  $conexion=new Conexionbd();
  $conexion_bbdd=$conexion->conectar();
  $usuario=new Usuario('','','','');
if($_SERVER['REQUEST_METHOD'] == "POST" AND ISSET($_POST['registrar_persona'])){
  $datos= array();
  $datos['nombre']=$_POST["usuario"];
  $datos['clave']=$_POST["clave"];
  $datos['correo']=$_POST["correo"];
  $usuario->insertarusuario($conexion,$datos);
}?> &nbsp;
<script>swal.fire({title: 'Usuario registrado correctamente',icon: 'success'});</script>
<?php header("Refresh:1; url=../home/index.php");?>