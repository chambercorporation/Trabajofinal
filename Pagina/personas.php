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


<div class="row" id="BSupEventos"> <!-- BOTON SUPERIOR -->
  <div class="col-md-3"></div>
  <div class="col-md-2 text-center"style="font-family: 'Baloo Thambi 2'"><br/><br/><br/><br/> 
    <a href="calendario.php" style="color: #8A8686;text-decoration:none">
        <i class="far fa-calendar-alt"></i>&nbsp;Calendario de Eventos
    </a>
  </div> <!-- FIN COLUMNA 1 -->

  <div class="col-md-2 text-center"> 
    <a href="index.php"><img href="index.php"src='https://i.imgur.com/mbvQ2Ad.jpg' style=' width: 80px; height: 80px; border-radius: 100%; border: 2px solid #fff; margin: 10px;' alt="..." class="img-fluid"></a>
      <h6 style="color:#8A8686"><i class="far fa-star"></i> Chamber Corporation </h6><br/>
  </div> <!-- FIN COLUMNA 2 -->

  <div class="col-md-2 text-center"style="font-family: 'Baloo Thambi 2'"><br/><br/><br/><br/>
    <a href="eventos.php" style="color: #8A8686;text-decoration:none">
      <i class="fa fa-list-alt"></i>&nbsp;Lista de Eventos
    </a>
  </div> <!-- FIN COLUMNA 3 -->
  <div class="text-center"style="font-family: 'Baloo Thambi 2'"> <!-- Icono con modal nuevo evento -->
    <a style="color: #8A8686" data-bs-toggle="modal" data-bs-target="#nueva_persona" >
    <i class="fas fa-user-alt"></i>&nbsp;Registrar Responsable</a><br/><br/>
  </div>
</div>

<div> <br/> </div>

<div class="container"> 
  <div class="col-md-12"style="padding:10px 20px 25px;font-size:16px;margin-top:7px;border-radius:15px;font-family: 'Baloo Thambi 2'" id="center"> <!-- Inicio registro de eventos -->
    <div class="row"> 
      <table class="table">  
        <tr class="text-center">
        <th>ID</th>
        <th>Run</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Editar</th>
        <th>Eliminar</th>
        </tr>
        
        <?php
          include_once "../Clases/conexionbd.php";
          include_once "../Clases/Persona.php";
          $conexion = new Conexionbd('localhost','root','','calendario');
          $personas = new Persona('','','','');
          $listar_persona = $personas ->listar_personas($conexion);
              for ($i=0; $i < count($listar_persona); $i++) {
                ?>
                <tr class="text-center">
                  <td> <?=$listar_persona[$i]['idpersona']; ?></td>
                  <td> <?=$listar_persona[$i]["Run"]?> </td>
                  <td> <?=$listar_persona[$i]["Nombre"]?> </td>
                  <td> <?=$listar_persona[$i]["Apellido"]?> </td>

            </td></b>
            <td class="text-center"> <b><a href="#" style="color: black;text-decoration:none" data-bs-toggle="modal" data-bs-target="#edit_persona<?=$i?>">
            <i class="far fa-edit"></i></a>
            
            <!-- Modal eliminar persona -->
            <div class="modal fade" id="delete_persona<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">&nbsp;Eliminar persona</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="" action="eliminarpersona.php" method="GET">
                      <div class="modal-body">
                        <div class="alert alert-danger">
                          <strong>Atencion:</strong> Estas seguro de eliminar al usuario <?=$listar_persona[$i]["Nombre"]?> <?=$listar_persona[$i]["Apellido"]?> y todos sus eventos
                          <input type="hidden"  value="<?=$listar_persona[$i]["idpersona"]?>"name="idpersona">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="eliminar_persona" class="btn btn-danger">Eliminar </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </td></b>
            <!-- Modal editar persona -->
            <td class="text-center"> <b><a href="#" style="color: black;text-decoration:none" data-bs-toggle="modal" data-bs-target="#delete_persona<?=$i?>">
              <i class="far fa-trash-alt"></i></a>
            <div class="modal fade" id="edit_persona<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">&nbsp;Registrar Nuevo Responsable</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="" action="editarpersona.php" method="POST">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12"> 
                        <input type="hidden" name="idpersona" value="<?=$listar_persona[$i]["idpersona"]?>">
                        <div><i class="far fa-edit"></i>&nbsp;Run
                          <input type="text" class="form-control" name="run" value="<?=$listar_persona[$i]["Run"]?>" placeholder="14170802-k" required>
                        </div>  <hr>
                      </div> 

                      <div class="col-md-6">  
                        <div><i class="far fa-clock"></i>&nbsp;Nombre
                          <input type="text" class="form-control" name="nombre" value="<?=$listar_persona[$i]["Nombre"]?>" required>
                        </div> <hr>
                      </div>

                      <div class="col-md-6">  
                        <div><i class="far fa-clock"></i>&nbsp;Apellido
                          <input type="text" class="form-control" name="apellido" value="<?=$listar_persona[$i]["Apellido"]?>" required>
                        </div> <hr>
                          </div> 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="editarpersona" class="btn btn-success">Actualizar </button>
                  </div>
                </form>
              </div>
            </div> 
          </div> <!-- modal fin editar -->
              <?php "</tr>";}?>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="nueva_persona" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- Modal nueva persona -->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">&nbsp;Registrar Nuevo Responsable</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="" action="registarpersona.php" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12"> 
              <div><i class="far fa-edit"></i>&nbsp;Run
                <input type="text" class="form-control" name="run" maxlength="12" placeholder="14.170.802-K" required>
              </div>  <hr>
            </div> 

            <div class="col-md-6">  
              <div><i class="far fa-clock"></i>&nbsp;Nombre
                <input type="text" class="form-control" name="nombre" placeholder="Kaedahara" required>
              </div> <hr>
            </div>

            <div class="col-md-6">  
              <div><i class="far fa-clock"></i>&nbsp;Apellido
                <input type="text" class="form-control" name="apellido" placeholder="Kazuha" required>
              </div> <hr>
                </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" name="registrar_persona" class="btn btn-success">Registrar </button>
        </div>
      </form>
    </div>
  </div> 
</div><!-- Fin modal nueva persona -->
</body>
</html>