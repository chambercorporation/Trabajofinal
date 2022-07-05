<!DOCTYPE html>
<html lang="es" dir="ltr">
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

<div class="row" id="BSupEventos">
  <div class="col-md-3"></div>
  <div class="col-md-2 text-center"style="font-family: 'Baloo Thambi 2'"><br/><br/><br/><br/>
    <a href="calendario.php" style="color: #8A8686;text-decoration:none">
        <i class="far fa-calendar-alt"></i>&nbsp;Calendario de Eventos<!--head-->
    </a>
  </div>

  <div class="col-md-2 text-center">
    <a href="index.php"><img href="index.php"src='https://i.imgur.com/mbvQ2Ad.jpg' style=' width: 80px; height: 80px; border-radius: 100%; border: 2px solid #fff; margin: 10px;' alt="..." class="img-fluid"></a>
      <h6 style="color:#8A8686"><i class="far fa-star"></i> Chamber Corporation </h6><br/><!--head-->
  </div>

  <div class="col-md-2 text-center"style="font-family: 'Baloo Thambi 2'"><br/><br/><br/><br/>
    <a href="personas.php" style="color: #8A8686;text-decoration:none">
      <i class="fa fa-user-circle"></i>&nbsp;Lista de Personas<!--head-->
    </a>
  </div>
</div>

<div> <br/> </div>

<div class="container"> 
  <div class="col-md-12"style="padding:10px 20px 25px;font-size:16px;margin-top:7px;border-radius:15px;font-family: 'Baloo Thambi 2'" id="center"> <!-- Inicio registro de eventos -->
    <div class="row"> 
      <table class="table">
        <thead>  
        <tr class="text-center">
        <th>ID</th>
        <th>Título</th>
        <th>Tipo</th>
        <th>Descripción</th>
        <th>Hora de Inicio</th>
        <th>Hora de Fin</th>
        <th>Fecha</th>
        <th>Ubicacion</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Publico</th>
        <th>Editar</th>
        <th>Eliminar</th>
        </tr>
      </thead>
      <tbody class="text-center">
          <?php
          include_once "../Clases/conexionbd.php";
          include_once "../Clases/Evento.php";
          $conexion = new Conexionbd('localhost','root','','calendario');
          $evento = new Evento('','','','','','','','','','');
          $listar_eventos = $evento->listar_eventos($conexion);
              for ($i=0; $i < count($listar_eventos); $i++) {
                ?>
                <tr>
                  <td> <?=$listar_eventos[$i]["ID_Evento"]?> </td>
                  <td> <?=$listar_eventos[$i]["Titulo"]?> </td>
                  <td> <?=$listar_eventos[$i]["Tipo"]?> </td>
                  <td> <?=$listar_eventos[$i]["Descripcion"]?> </td>
                  <td> <?=$listar_eventos[$i]["Hora_Inicio"]?> </td>
                  <td> <?=$listar_eventos[$i]["Hora_termino"]?> </td>
                  <td> <?=$listar_eventos[$i]["Fecha"]?> </td>
                  <td> <?=$listar_eventos[$i]["Ubicacion"]?> </td>
                  <td> <?=$listar_eventos[$i]["Nombre"]?> </td>
                  <td> <?=$listar_eventos[$i]["Apellido"]?> </td>
                  <td> <?=$listar_eventos[$i]["Tipo_publico"]?> </td>
            <td class="text-center"> <b><a href="#" style="color: black;text-decoration:none" data-bs-toggle="modal" data-bs-target="#editar_evento<?=$i?>">
              <i class="far fa-edit"></i></a> 
            
            <!-- Modal editar evento -->
            <div class="modal fade" id="editar_evento<?=$i?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">&nbsp;Editar evento</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="" action="editarevento.php?ID_Evento=<?=$listar_eventos[$i]["ID_Evento"]?>" method="POST">
                      <div class="modal-body">
                        <div class="row">

                        <div class="col-md-6 text-center">
                            <div><i class="far fa-user-circle"></i>&nbsp;Título
                              <input type="text" class="form-control" name="titulo" value="<?=$listar_eventos[$i]["Titulo"]?>" placeholder="" required>
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
                            <div><i class="far fa-edit"></i>&nbsp;Descripción
                              <input type="text" class="form-control" name="descripcion" value="<?=$listar_eventos[$i]["Descripcion"]?>" placeholder="" required>
                            </div>  <hr>
                          </div>
                          <div class="col-md-6">
                            <div><i class="far fa-clock"></i>&nbsp;Hora Inicio
                              <input type="time" class="form-control" name="hora_inicio" value="<?=$listar_eventos[$i]["Hora_Inicio"]?>" required>
                            </div> <hr>
                          </div>

                          <div class="col-md-6">
                            <div><i class="far fa-clock"></i>&nbsp;Hora Termino
                              <input type="time" class="form-control" name="hora_termino" value="<?=$listar_eventos[$i]["Hora_termino"]?>" required>
                            </div> <hr>
                              </div>

                          <div class="col-md-6 text-center">
                            <div><i class="far fa-calendar-alt"></i>&nbsp;Fecha Inicio
                              <input type="date" class="form-control" name="fecha" value="<?=$listar_eventos[$i]["Fecha"]?>" required>
                            </div><hr>
                          </div>
                          
                          <div class="col-md-6 text-center"> 
                          <div><i class="fas fa-users"></i>&nbsp;Público              
                            <select name="publico" class="form-select">
                                <?php
                                    $con = new Conexionbd('localhost','root','','calendario');
                                    $traeId = "SELECT idPublico,Tipo FROM publico";
                                    $res = $con->conectar()->query($traeId);
                                    while ($row=$res->fetch_assoc()){
                                    echo "<option value='{$row['idPublico']}'> {$row['Tipo']} </option>";
                                  }
                                  ?>
                            </select>
              </div><hr>
            </div> 
                  <div class="col-md-12 text-center">
                    <div><i class="far fa-building"></i>&nbsp;Ubicación
                      <input type="text" class="form-control" name="ubicacion" value="<?=$listar_eventos[$i]["Ubicacion"]?>" placeholder="" required>
                    </div><hr>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" name="editar_evento" class="btn btn-success">Guardar Cambios </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td></b>
    <td class="text-center"> <b><a href="#" style="color: black;text-decoration:none" data-bs-toggle="modal" data-bs-target="#delete_evento<?=$i?>" >
      <i class="far fa-trash-alt"></i></a> </td></b>
      

      <!-- Modal eliminar evento -->
      <div class="modal fade" id="delete_evento<?=$i?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">&nbsp;Eliminar evento</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" action="eliminarevento.php" method="GET">
              <div class="modal-body">
                <div class="alert alert-danger">
                  <strong>Atención:</strong> Estas seguro de eliminar el evento <?=$listar_eventos[$i]["ID_Evento"]?>
                  <input type="hidden" value="<?=$listar_eventos[$i]["ID_Evento"]?>"name="ID_Evento">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" name="eliminar_evento" class="btn btn-danger">Eliminar </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php "</tr>";}?>
</tbody>
</table>
</div>
</div>
</div>
</body>
</html>
