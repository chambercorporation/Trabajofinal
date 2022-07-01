<?php //funciona para que no ingresen a la fuerza 
  session_start();
  if($_SESSION["autentificado"] != "SI"){
    header('location:index.php');
    exit();
  }
?>
