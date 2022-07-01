<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Ubuntu+Condensed" rel="stylesheet">
    <link href="https://cutt.ly/0HkfhuV" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login - Chamber</title>
</head>
<body id="body">
<div class="row" id="BSupEventos"> <!-- Inicio linea barra superior-->
  <div class="col-md-2 text-center"><br/><br/><br/>  </div> <!-- Inicio/Fin div limitacion izquierda-->

  <div class="col-md-8 text-center" > <!-- Inicio div centro-->
  <a href="index.php"><img href="#"src='https://i.imgur.com/mbvQ2Ad.jpg' style=' width: 80px; height: 80px; border-radius: 100%; border: 2px solid #fff; margin: 10px;' alt="..." class="img-fluid"></a>
    <h6 style="color: white"><i class="far fa-star"></i> Chamber Corporation </h6><br/>
  </div> <!-- Fin div centro izquierda-->
</div> <!-- Fin linea barra superior--> 

<div> <br> </div>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-3">
    <br><br><br>
    <form action="../LoginPHP/validar.php" method="POST" id="login_form" class="mt-1">   <!--Inicio formulario login-->
      <div class="principal-title title-bg text-center">Iniciar sesión</div>  <!--Inicio / Fin div Iniciar sesion-->
      <div class="big-input"> 
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text" style="color: black; background-color: white;"><i class="fas fa-user"></i></div>
          </div>
        
          <input type="text" name="username" placeholder="Nombre de usuario" class="form-control big-input-box " required>
        </div>
      </div>

      <div class="big-input">
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text" style="color: black; background-color: white;"><i class="fas fa-key"></i></div>
          </div>

          <input type="password" name="user_password" placeholder="*******" class="form-control big-input-box " required>
        </div>
      </div>
      <br>
      <button id="login_button"style="background-color: #0B7192; border-color: black; color: white" class="btn btn-success btn-block  btn-danger">
        <b>Entrar</b>
      </button>
    </form> <!--Fin formulario login-->
    <div class="col-md-12"><br/><br>
      <div id="register_text" style="background:#f3f3f3;padding:1px 11px;color:#303030;text-align:center;
        font-size:20px;margin-top:10px;margin-bottom:7px;border-radius:25px">¿Todavía no tienes una cuenta?</div>
      <button id="register_button" style="background-color: danger; border-color: black; color: #white;border-radius:25px" class="btn btn-success btn-block  btn-danger"data-bs-toggle="modal"data-bs-target="#registrarse"><b>Regístrate aquí</b></button>
      
      <div class="modal fade" id="registrarse" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"> <!-- Titulo del modal -->
            <h5 class="modal-title; principal-title" id="exampleModalLabel">&nbsp;Registro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form class="" action="../LoginPHP/registrausuarios.php" method="POST"> <!-- Formulario modal -->
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12"> 
                  <div><i class="	far fa-address-card"></i>&nbsp;Nombre de Usuario <!-- Usuario a registrar -->
                    <input type="text" class="form-control" name="usuario" placeholder="Nombre de usuario">
                  </div>  <hr>
                </div> 

                <div class="col-md-6">  
                  <div><i class="	fas fa-envelope-open-text"></i>&nbsp;Correo <!-- Correo a registrar -->
                    <input type="email" class="form-control" name="correo" placeholder="example@gmail.com">
                  </div> <hr>
                </div>

                <div class="col-md-6">  
                  <div><i class="fas fa-key	"></i>&nbsp;Contraseña <!-- Contraseña a registrar -->
                    <input type="password" class="form-control" name="clave" placeholder="******">
                  </div> <hr>
                    </div> 
                
                <div class="form-check text-center"> <!-- Checkbox -->
                  <input class="form-check-input" type="checkbox" required>
                  <a class="form-check-label" style="color: black; font-size: 12px">
                      He leido y aceptado los <a href="https://docs.google.com/document/d/14v8QPgYcGmHE92asKtYf68OzSyXUmm3d/edit?usp=sharing&ouid=115233625526137178301&rtpof=true&sd=true" style="font-size: 12px" target="_blank">Terminos de servicio</a> y 
                      <a href="https://docs.google.com/document/d/1ILvcIwXws59ndvKtdQwBpL8cNttaZVbP/edit?usp=sharing&ouid=115233625526137178301&rtpof=true&sd=true" style="font-size: 12px" target="_blank">Política de Privacidad</a>
                  </a>
                </div>
              </div>
            </div>
            <div class="modal-footer"> <!-- Botones modal -->
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" name="registrar_persona" class="btn btn-success">Registrar </button>
            </div>
          </form> <!-- Formulario modal -->
        </div>
      </div>
    </div>
    </div>
  </div> 

  <div class="col-md-3"></div>

  <div class="col-md-3"> <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel"> <br><br>
      <!-- The slideshow/carousel -->
      <div class="carousel-inner" >
        <div class="carousel-item active">
          <img src="../img/fifa21.jpg" alt="FIFA 21" class="d-block" width="500px">
        </div>
        <div class="carousel-item">
          <img src="../img/sw.jpg" alt="STARWARS Battlefront" class="d-block" width="500px">
        </div>
        <div class="carousel-item">
          <img src="../img/itt.jpg" alt="It Takes Two" class="d-block" width="500px">
        </div>
      </div>
      <!-- Left and right controls/icons -->
      <a class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a><br/>
      <div class="principal-title text-center" style="background:#f3f3f3;color: black;border-radius:25px">	Tendencias</div>
    </div>
  </div>
</div>
<!--Fin Div Centro Centro-->

<!--Extras pagina-->
<div><br><br><br><br><br><br><br></div>

<footer class="pt-4 pt-md-3 pb-3" id="pie">
  <div class="container">
    <div class="row">
      <div class="col-md-5 text-center" style="padding:1px 11px;text-align:center;
        font-size:20px;margin-top:10px;margin-bottom:7px;border-radius:25px" id="center">
        <h5 style="color: #000000">Términos</h5>
        <ul class="list-unstyled text-small">
        <li><a href="https://docs.google.com/document/d/14v8QPgYcGmHE92asKtYf68OzSyXUmm3d/edit?usp=sharing&ouid=115233625526137178301&rtpof=true&sd=true"target="_blank" style="color: #000000">Términos y Condiciones</a></li>
        <li><a href="https://docs.google.com/document/d/1ILvcIwXws59ndvKtdQwBpL8cNttaZVbP/edit?usp=sharing&ouid=115233625526137178301&rtpof=true&sd=true" target="_blank" style="color: #000000">Política de Privacidad</a></li>
        </ul>
      </div>
      
      <div class="col-md-2 text-center" >
        <br/>
        <img src='https://i.imgur.com/mbvQ2Ad.jpg' style=' width: 80px; height: 80px; border-radius: 100%; border: 2px solid #fff; margin: 10px;' alt="..." class="img-fluid">
      </div>
      
      <div class="col-md-5 text-center" style="padding:1px 11px;text-align:center;
        font-size:20px;margin-top:10px;margin-bottom:7px;border-radius:25px" id="center">
        <h5 style="color: #000000">Contacto Directo</h5>
          <h6 style="color: black;"><i class="fas fa-home me-3" style="color: #000000"></i> Carlos Cousiño 184, Lota, Bío Bío</h6>
          <h6 style="color: black;"><i class="fas fa-envelope me-3" style="color: #000000"></i> bryjara@cftla.cl / cguerra@cftla.cl</h6>
          <h6 style="color: black;"><i class="fas fa-envelope me-3" style="color: #000000"></i> edubaeza@cftla.cl</h6>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!--Fin Extras-->
</body>
</html>