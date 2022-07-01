<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include_once ("../Clases/conexionbd.php");
include_once ("../Clases/juegos.php");
  error_reporting(0) ; 
  $conexion = new Conexionbd();
  $conexion_bbdd = $conexion->conectar();
  if (isset($_POST["registrar_jugador"]))//si se ha pulsado el boton manda los datos a en donde se llama
  $datos = array();
  $datos['id_usuario'] = $_POST['id_usuario'];
  $datos['dedicacion'] = $_POST["dedicacion"]; //dedicacion del jugador
  $datos['tipo'] = $_POST["tipo"];//tipo jugador (socializador,anarquista, etc)
  $datos['preferencias'] = $_POST["preferencias"]; // preferencias de jugador
  $datos['historial'] = $_POST["historial"]; //historial personal
  $datos['conocimientos'] = $_POST["conocimientos"]; //experiencia de jugador
  $datos['pericia'] = $_POST["pericia"];//pericia o nivel del jugador
  $datos['juego'] = $_POST["juego"]; //categoria del juego
    $sql="SELECT * FROM dedicacion where ID_dedicacion=".$datos['dedicacion'];
    $resultado = $conexion->conectar()->query($sql);
    while($fila=$resultado->fetch_assoc()){
      $sumar_dedicacion = $fila['Valor_dedicacion']; 
    }  
    $sql="SELECT * FROM tipo_jugador where ID_tipo=".$datos['tipo'];
    $resultado = $conexion->conectar() -> query($sql);
    while($fila=$resultado->fetch_assoc()){
      $sumar_tipo = $fila['Valor_tipo'];

    }
    $sql="SELECT * FROM preferencias_personales where ID_preferencias=".$datos['preferencias'];
    $resultado = $conexion->conectar() -> query($sql);
    while($fila=$resultado->fetch_assoc()){
      $sumar_preferencias = $fila['Valor_preferencias'];

    }
    $sql="SELECT * FROM historial where ID_historial=".$datos['historial'];
    $resultado = $conexion->conectar() -> query($sql);
    while($fila=$resultado->fetch_assoc()){
      $sumar_historial = $fila['Valor_historial'];

    }
    $sql="SELECT * FROM experiencia where ID_externos=".$datos['conocimientos'];
    $resultado = $conexion->conectar() -> query($sql);
    while($fila=$resultado->fetch_assoc()){
      $sumar_experiencia = $fila['Valor_experiencia'];

    }
    $sql="SELECT * FROM pericia where ID_pericia=".$datos['pericia'];
    $resultado = $conexion->conectar() -> query($sql);
    while($fila=$resultado->fetch_assoc()){
      $sumar_pericia = $fila['Valor_pericia'];

    }
    $sql="SELECT * FROM categoria where ID_categoria=".$datos['juego'];
    $resultado = $conexion->conectar() -> query($sql);
    while($fila=$resultado->fetch_assoc()){
      $sumar_categorias= $fila['Valor_categoria'];

    }
  $sumatotal=$sumar_dedicacion+$sumar_tipo+$sumar_preferencias+$sumar_historial+$sumar_experiencia+$sumar_pericia+$sumar_categorias; 
  $sql="SELECT * FROM resultado where Valor_final=$sumatotal";
    $resultado = $conexion->conectar() -> query($sql);
      while($fila=$resultado->fetch_assoc()){ //traemos la id del juego que se corresponde con el valor final
      $datos['id_juego'] = $fila['ID_resultado'];
      $resul = $fila['Juego_resultado'];
      }
      if ($datos['id_juego']>=1) {
    $jugador = new Jugador('','','','','','','','','','');
    $jugador->insert_res($conexion,$datos);//insertar jugador en la base de datos?> 
     &nbsp;
    <script>swal.fire({title: 'Su juego se ha registrado correctamente',icon: 'success'});</script>
    <?php
     header("Refresh:1; url=../home/index.php");
      }
    else{
      ?> 
     &nbsp;
    <script>swal.fire({title: 'No se encontró un juego , hacer formulario ',icon: 'error'});</script>
    <?php
      header("Refresh:1; url=../home/home.php");
    }
     
    ?>
