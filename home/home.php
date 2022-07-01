<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Ubuntu+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://cutt.ly/0HkfhuV" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home - Chamber</title>
</head>
<body id="body">
<div class="row" id="BSupEventos"> <!-- Inicio linea barra superior-->
  <div class="col-md-2 text-center"><br/><br/><br/>  </div> <!-- Inicio/Fin div limitacion izquierda-->

  <div class="col-md-8 text-center" > <!-- Inicio div logo-->
  <a href="home.php"><img href="#"src='https://i.imgur.com/mbvQ2Ad.jpg' style=' width: 80px; height: 80px; border-radius: 100%; border: 2px solid #fff; margin: 10px;' alt="..." class="img-fluid"></a>
    <h6 style="color: white"><i class="far fa-star"></i> Chamber Corporation </h6><br/>
  </div> <!-- Fin div logo-->
</div> <!-- Fin linea barra superior-->
<?php
include ("../LoginPHP/seguridad.php");
?>
<div class="container">
    <div class="row">
      <div class="cl-md-12">&nbsp;</div>
      <div class="col-md-5">
        <div class="col-md-12 principal-title text-center"style="padding:10px 10px 25px;color:#000000;font-size:20px;margin-top:7px;border-radius:15px" id="center">
            <div><h3><i class="far fa-user-circle"></i> Bienvenid@ <?php echo $_SESSION["nombre"]?> a Chamber Corporation</h3><hr/></div>
              <a href="../LoginPHP/cerrarsesion.php" style="color: #781E1E; text-decoration: none"><i class="fas fa-door-open"></i>&nbsp;Cerrar Sesion</a>

        </div>

        <div> <br/> </div>

        <div class="col-md-12 text-center" id="center" style="font-family: 'Baloo Thambi 2'"><i class="fas fa-gamepad"></i><b> Formulario Gaming</b>
          <hr>
          <div>· Bienvenid@ al formulario en el cual usted determinar sus preferencias de los juegos.</div>

          <div> <br> </div>

          <div ><b>· En la cual al final del formulario le recomendaremos un juego acorde a sus preferencias.</b></div>

          <div> <br> </div>

          <div>· Solo podra completar el formulario una vez, por lo cual asigne bien sus preferencias.</div>

          <hr/>
        </div>
      </div>

      <div class="col-md-2"></div>
      <div class="col-md-5">
        <div class="col-md-12 principal-title text-center"style="padding:10px 10px 25px;color:#000000;font-size:20px;margin-top:7px;border-radius:15px" id="center">
          <div><h3><i class="	fas fa-gamepad"></i> Su juego adecuado</h3><hr/></div>
        </div>

        <div> <br> </div>


        <?php
        $id=$_SESSION['usuario'];
        $select = "SELECT COUNT(usuario_ID_usuario) AS validarFormulario FROM jugador WHERE usuario_ID_usuario = '$id'";
        include("../Clases/conexionbd.php");
        $con = new Conexionbd();
        $conexion = $con->conectar();
        $resultado=mysqli_query($conexion,$select);
        while ($row=$resultado->fetch_assoc()) {
          $validaEnvio=$row['validarFormulario'];
          if ($validaEnvio=='1') {
            $juego=$_SESSION['juegoasignado'];
            echo "<div class='col-md-12 text-center' id='positive' style='font-family: 'Baloo Thambi 2'><i class='	fa fa-check'></i><b> Usted posee un juego definido</b>
              <hr>
              <div>· Parece que usted ya ha completado el formulario, su juego perfecto es: $juego </div>
              <hr/>
            </div>";


          }else{
            echo "<div class='col-md-12 text-center' id='negative' style='font-family: 'Baloo Thambi 2''><i class='fas fa-exclamation-triangle'></i><b> Usted no posee un juego definido</b>
              <hr>
              <div>· Parece que usted no ha completado o enviado el formulario, por favor completelo para poder saber su juego</div>
              <div> <br> </div>
              <a href='#' style='color: white;text-decoration:none'data-bs-toggle='modal' data-bs-target='#nuevo_test'>
                <i class='far fa-check-circle'></i> Comenzar test</a>

            </div>";
          }
        }
        ?>

      </div>
    </div>
</div>


<!-- Modal formulario -->
<div class="modal fade" id="nuevo_test" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title; principal-title" id="exampleModalLabel">&nbsp;Formulario de Juegos</div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="text-center"style="font-size: 10px">Las descripciones de los Tipos de Jugadores y las Pericias se mostraran una vez  <br> cruzando el cursor sobre la categoria correspondiente</div>
    <form class="" action="registrar.php" method="POST">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 text-center">
            <div><span tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Socializador: Genera comunidades y alianzas dentro de un juego
                    Anarquista: No asume rol y va libremente por su afan personal
                    Conquistador: Jugador experimentado en armas y en combates cuerpo a cuerpo
                    Competidor: Se desempeña bien en escuadras y que es un pilar fundamental para su equipo
                    Explorador: Recorre grandes extensiones de juego explorando distintas alternativas de recursos o armas para él y su equipo">
                <i class="fas fa-users"></i>&nbsp;Tipo de Jugador
              <select name="tipo" class="form-control">
                <?php
                $con = mysqli_connect('localhost','root','','juegos');
                $traeId = "SELECT ID_Tipo,Tipo_jugador,Valor_tipo FROM tipo_jugador";
                $res = $con->query($traeId);
                while ($row=$res->fetch_assoc()){
                echo "<option value='{$row['ID_Tipo']}'>{$row['Tipo_jugador']}</option>";
               }
              ?>
              </select>
            </div>  <hr>
          </div>
                <?php
                echo "<input type='hidden' name='id_usuario' value='$_SESSION[usuario]'>";
                ?>
          <div class="col-md-6 text-center">
            <div><i class="far fa-address-card"></i>&nbsp;Historial Personal
              <select name="historial" class="form-control">
                <?php
              $con = mysqli_connect('localhost','root','','juegos');
              $traeId = "SELECT ID_historial,Tipo_historial FROM historial";
              $res = $con->query($traeId);
              while ($row=$res->fetch_assoc()){
              echo "<option value='{$row['ID_historial']}'>{$row['Tipo_historial']}</option>";
             }
            ?>
              </select>
            </div> <hr>
          </div>

         <div class="col-md-6 text-center">
            <div><i class="fas fa-jedi"></i>&nbsp;Conocimientos
              <select name="conocimientos" class="form-control">
              <?php
              $con = mysqli_connect('localhost','root','','juegos');
              $traeId = "SELECT ID_externos,Tipo_experiencia FROM experiencia";
              $res = $con->query($traeId);
              while ($row=$res->fetch_assoc()){
              echo "<option value='{$row['ID_externos']}'>{$row['Tipo_experiencia']}</option>";
             }
            ?>
              </select>
            </div> <hr>
          </div>

          <div class="col-md-6 text-center">
            <div><span tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="
            Neofito: Recientemente se incorporó y forma parte de una colectividad.
            Novato: Nuevo en una actividad determinada, por lo que carece de experiencia.
            Amateur: Practica por placer una actividad.
            Training: En entrenamiento para mejorar.
            Intermedio: Persona ni buena ni mala en los juegos.
            Rooki: Se encuentra en su primer año como profesional y tiene poca o ninguna experiencia profesional.
            Senior: Muy hábil y su experiencia es media.
            Semipro: Es buen jugador pero no dedica tiempo completo.
            Experto: Muy hábil y tiene gran experiencia.
            Profesional: Profesional experimentado.
            Veterano: Posee bastante experiencia y profesionalismo."><i class="fas fa-award"></i>&nbsp;Pericia
              <select name="pericia" class="form-control">
              <?php
              $con = mysqli_connect('localhost','root','','juegos');
              $traeId = "SELECT ID_pericia,Tipo_pericia FROM pericia";
              $res = $con->query($traeId);
              while ($row=$res->fetch_assoc()){
              echo "<option value='{$row['ID_pericia']}'>{$row['Tipo_pericia']}</option>";}
            ?>
              </select>
            </div><hr>
          </div>

          <div class="col-md-6 text-center">
            <div><i class="fas fa-chess"></i>&nbsp;Preferencias de Juego
              <select name="preferencias" class="form-control">
              <?php
              $con = mysqli_connect('localhost','root','','juegos');
              $traeId = "SELECT ID_preferencias,Preferencias FROM preferencias_personales";
              $res = $con->query($traeId);
              while ($row=$res->fetch_assoc()){
              echo "<option value='{$row['ID_preferencias']}'>{$row['Preferencias']}</option>";}
            ?>
              </select>
            </div> <hr>
          </div>

          <div class="col-md-6 text-center">
            <div><i class="fas fa-chess"></i>&nbsp;Tipo de Juego
              <select name="juego" class="form-control">
              <?php
              $con = mysqli_connect('localhost','root','','juegos');
              $traeId = "SELECT ID_categoria,Tipo_categoria FROM categoria";
              $res = $con->query($traeId);
              while ($row=$res->fetch_assoc()){
              echo "<option value='{$row['ID_categoria']}'>{$row['Tipo_categoria']}</option>";}
            ?>
              </select>
            </div> <hr>
          </div>

            <div class="col-md-6 text-center">
            <div><i class="fas fa-chess"></i>&nbsp;Dedicacion
            <select name="dedicacion" class="form-control">
              <?php
              $con = mysqli_connect('localhost','root','','juegos');
              $traeId = "SELECT ID_dedicacion,Tipo_dedicacion FROM dedicacion";
              $res = $con->query($traeId);
              while ($row=$res->fetch_assoc()){
              echo "<option value='{$row['ID_dedicacion']}'>{$row['Tipo_dedicacion']}</option>";}
              ?>
              </select>
            </div> <hr>
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" name="registrar_jugador" class="btn btn-success">Enviar </button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>$(function (){ $('[data-toggle="popover"]').popover();});</script>
<script> var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
</script>
</body>
</html>
