<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include('../Clases/conexionbd.php');
error_reporting(0);
$usuario=$_POST['username'];
$contraseña=$_POST['user_password'];
$select="SELECT * FROM usuario WHERE Nombre = '$usuario' AND contrasenna = '$contraseña'"; //select para preguntar lo los datos del login coinciden con los de la base de datos con los datos de la base de datos
$conexion = new Conexionbd();
$conexion_bbdd=$conexion->conectar();
$res=mysqli_query($conexion_bbdd,$select);//entrega el resultado de la consulta
$filas=mysqli_num_rows($res);//cuanta las filas que trajo el resultado de la consulta
while($row=$res->fetch_assoc()){
  $id_persona=$row['ID_usuario'];
  $nombre=$row['Nombre'];
}
$select2 = "SELECT j.resultado_ID_resultado, r.Juego_resultado AS juego FROM jugador as j JOIN resultado as r ON j.resultado_ID_resultado=r.ID_resultado WHERE usuario_ID_usuario = '$id_persona'";
$res2=mysqli_query($conexion_bbdd,$select2);
$filas2=mysqli_num_rows($res2);
if($filas2>=1){
  while ($row2=$res2->fetch_assoc()) {
    $Juego_resultado=$row2['juego'];
  }
}else{
  $Juego_resultado="Juego No Encontrado";
}
if($filas>=1){
  session_start(); //inicimos el modo session
  $_SESSION['autentificado']="SI";
  $_SESSION['usuario']=$id_persona;
  $_SESSION['nombre']=$nombre;
  $_SESSION['juegoasignado']=$Juego_resultado;
  session_name("$usuario");
  header("location:../home/home.php"); //redireccionamos a la pagina home
}else{
  ?>  &nbsp;
  <script>swal.fire({title: 'Usuario no encontrado',icon: 'error'});</script>

<?php header("Refresh: 1; url=../home/index.php");//si no coinciden los datos de login, se muestra un mensaje de error

}
  mysqli_free_result($res); //libera el resultado de la consulta
  mysqli_close($conexion_bbdd); //cierra la conexion con la base de datos

 ?>
