<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Chamber Calendar</title>
    <link rel="icon" href="../img/logosus.png">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4e6911d35b.js" crossorigin="anonymous"></script>
    
  </head>
  <body id="body">
  <?php date_default_timezone_set('Chile/Continental'); //Zona Horaria ?>

<div class="row" id="BSupEventos">
  <div class="col-md-3"></div>
  <div class="col-md-2 text-center"style="font-family: 'Baloo Thambi 2'"><br/><br/><br/><br/>
    <a href="eventos.php" style="color: #8A8686;text-decoration:none">
      <i class="fa fa-list-alt"></i>&nbsp;Lista de Eventos
    </a>
  </div>

  <div class="col-md-2 text-center">
    <a href="index.php"><img href="index.php"src='https://i.imgur.com/mbvQ2Ad.jpg' style=' width: 80px; height: 80px; border-radius: 100%; border: 2px solid #fff; margin: 10px;' alt="..." class="img-fluid"></a>
      <h6 style="color:#8A8686"><i class="far fa-star"></i> Chamber Corporation </h6><br/>
  </div>

  <div class="col-md-2 text-center"style="font-family: 'Baloo Thambi 2'"><br/><br/><br/><br/>
    <a href="personas.php" style="color: #8A8686;text-decoration:none">
      <i class="fa fa-user-circle"></i>&nbsp;Lista de Personas
    </a>
  </div>
</div>

<div> <br/> </div>


<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-7"style="padding:10px 10px 25px;color:#000000;font-size:20px;margin-top:7px;border-radius:15px" id="center"> <!-- Inicio calendario (completo) -->
    <?php 
      if (isset($_POST["mes"])) {
        $month=$_POST["mes"];
      }else {
        $month=date("n");
      }
      $year=date("Y");
      $diaActual=date("j");
      $diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
      $ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));

      $meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
      "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    ?>

    <h4 class=" text-center"><b> <i class="far fa-calendar-check"></i> <?php echo $meses[$month]." ".$year?> </b></h4><hr> <!-- Print mes y a;o actual -->
      
    <table class="table; table-bordered text-center"style="border-color: black"> <!-- Inicio calendario (dias) -->
      <tr style="background-color: #0404046B; color: #B2AFAF;border-color: black">
          <td class="text-center" width="10%"><i class="fas fa-calendar-week"></i> Lunes</td>
          <td class="text-center" width="10%"><i class="fas fa-calendar-week"></i> Martes</td>
          <td class="text-center" width="10%"><i class="fas fa-calendar-week"></i> Miércoles</td>
          <td class="text-center" width="10%"><i class="fas fa-calendar-week"></i> Jueves</td>
          <td class="text-center" width="10%"><i class="fas fa-calendar-week"></i> Viernes</td>
          <td class="text-center" width="10%"><i class="fas fa-calendar-week"></i> Sábado</td>
          <td class="text-center" width="10%"><i class="fas fa-calendar-week"></i> Domingo</td>
      </tr>
      <tr style="border-color: black">
          <?php
          $last_cell = $diaSemana + $ultimoDiaMes;
          for($i=1;$i<=42;$i++){
            if($i==$diaSemana) {
              $day=1;
            }
            if($i<$diaSemana || $i>=$last_cell) {
              echo "<td>&nbsp;</td>";
            }else{
              // Dia Actual
              if( $day == $diaActual){
                  ?>
                  <td style="border: #2524248A 6px solid; padding: 2px 2px 2px 2px;">
                    <p style="letter-spacing: 2px; background-color: #C2BDBD91;">
                      <b style="font-size: 18px; color: black" > &nbsp; <?=$day?></b>
                    </p>

                  </td>
                <?php
              }else{
                ?>
                  <td style="border-color: black">
                    <b style="font-size: 18px; color: black"> &nbsp; <?=$day?> </b>
                  </td>
        <?php
              }
              $day++;
            } 	// Inicio de nueva columna
            if($i%7==0){
              echo "</tr><tr>\n";
            }
          }
        ?>
      </tr>
    </table> <!-- Fin calendario (dias)-->

    <hr>
    <div class="text-center"> <!-- Icono con modal nuevo evento -->
      <a href="#" style="color: black;text-decoration:none" data-bs-toggle="modal" data-bs-target="#nuevo_evento" >
      <i class="far fa-calendar-plus"></i>&nbsp;Registrar nuevo evento
      </a>
    </div>
  </div> <!-- Fin calendario (completo) -->
  <div class="modal fade" id="nuevo_evento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">&nbsp;Registrar nuevo evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  action="registrarevento.php" method="POST">
        <div class="modal-body">
          <div class="row">
          <div class="col-md-6 text-center"> 
              <div><i class="far fa-user-circle"></i>&nbsp;Título
                <input type="text" class="form-control" name="titulo" value="" placeholder="Nombre del Evento" required>
              </div><hr>
            </div> 

            <div class="col-md-6 text-center">  
              <div><i class="far fa-clock"></i>&nbsp;Tipo
                <select name="tipo" class="form-control">
                  <option value="Reuniones">Reuniones</option>
                  <option value="Presentacion de Titulo">Presentacion de Titulo</option>
                  <option value="Charlas">Charlas</option>
                  <option value="Clases">Clases</option>
                  <option value="Actividad Personal">Actividad Personal</option>
                </select>
              </div> <hr>
            </div> 

            <div class="col-md-12"> 
              <div><i class="far fa-edit"></i>&nbsp;Descripción <br>
                <textarea rows="2" cols="60" placeholder="Presentacion proyecto semestral"  name ="descripcion"required></textarea>
              </div> <hr>
            </div> 

            <div class="col-md-6">  
              <div><i class="far fa-clock"></i>&nbsp;Hora Inicio
                <input type="time" class="form-control" name="hora_inicio"  required>
              </div> <hr>
            </div>

            <div class="col-md-6">  
              <div><i class="far fa-clock"></i>&nbsp;Hora Termino
                <input type="time" class="form-control" name="hora_termino"  required>
              </div> <hr>
                </div> 

            <div class="col-md-6 text-center"> 
              <div><i class="far fa-calendar-alt"></i>&nbsp;Fecha Inicio
                <input type="date" class="form-control" name="fecha"  required>
              </div><hr>
            </div> 

            <div class="col-md-6 text-center"> 
              <div><i class="fas fa-users"></i>&nbsp;Público              
                <select name="publico" class="form-select">
                  <option value="no ingreso responsable">Ingrese responsable</option>
                    <?php
                        $con = mysqli_connect('localhost','root','','calendario');
                        $traeId = "SELECT idPublico,Tipo FROM publico";
                        $res = $con->query($traeId);
                        while ($row=$res->fetch_assoc()){
                        echo "<option value='{$row['idPublico']}'> {$row['Tipo']} </option>";
                      }
                      ?>
                </select>
              </div><hr>
            </div> 

            <div class="col-md-6 text-center"> 
              <div><i class="fas fa-users"></i>&nbsp;Persona a cargo
                <select name="persona" class="form-select">
                  <option value="no ingreso responsable">Ingrese responsable</option>
                <?php
              $con = mysqli_connect('localhost','root','','calendario');
              $traeId = "SELECT idpersona,Nombre,Apellido FROM persona";
              $res = $con->query($traeId);
              while ($row=$res->fetch_assoc()){
              echo "<option value='{$row['idpersona']}'> {$row['Nombre']} {$row['Apellido']}</option>";
             }
            ?>
                </select>
              </div><hr>
            </div> 

            <div class="col-md-6 text-center"> 
              <div><i class="far fa-building"></i>&nbsp;Ubicación
                <<textarea rows="1" cols="3" class="form-control" name="ubicacion"  placeholder="Carlos Cousiño 284, Lota, Bio Bio" required></textarea> 
              </div><hr>
            </div> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" name="registrar_evento" class="btn btn-success">Registrar </button>
        </div>
      </form>
    </div>
  </div>
</div>
  <div class="col-md-3 text-center" style="padding:10px 10px 25px;;border-radius:15px; margin: 7px 0px 7px 20px;font-family: 'Baloo Thambi 2'" id="center"> 
    Últimos eventos registrados <hr> <!-- Inicio div 3-->
    <table class="table" style="font-size:15px;color: black;margin-top:7px;margin-bottom:7px;border-radius:15px">  <!-- Inicio tabla -->
      <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Tipo</th>
      <th>Fecha</th>
      </tr>
      
      <?php
      include_once "../Clases/Conexionbd.php";
          $conec=new Conexionbd();
          $cone=mysqli_connect('localhost', 'root', '', 'calendario');
          $sql="SELECT * FROM evento 
          order by Fecha DESC
          limit 3";
          $result = $cone->query($sql);
      
      while($mostrar=$result->fetch_assoc()){
          echo "<tr>
          <td>{$mostrar["ID_Evento"]}</td>
          <td>{$mostrar["Titulo"]}</td>
          <td>{$mostrar["Tipo"]}</td>
          <td>{$mostrar["Fecha"]}</td>
          </tr>";
          }
      ?>
    </table> <!-- Fin tabla -->
    <div class="text-center"> <!-- Envio a la lista de evento-->
      <a href="eventos.php" style="color: black;text-decoration:none;font-size:17px">
      <i class="far fa-chart-bar"></i>&nbsp;Acceder a la lista
      </a>
    </div>
  </div>  <!-- Fin div 3 -->  
</div> <!-- Fin row -->
<!-- Archivo con todos los modals -->

</body>
</html>