<!DOCTYPE HTML>
<html lang="es">

<head>
  <title>Reserva</title>
  <!--<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="funciones/recarga.js"></script>-->
  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
  </style>
  
  <style>
  #mapa {
    background-color: red;
  }
  area{
    background-color: red;
  }
  </style>
  
</head>

<body>
  
  
  <div id="main">
  <div class="jumbotron text-center" style="margin-bottom:0">
    <h1>Reserva tu lugar ahora</h1>
    <p>Aqui pueda reservar el lugar que mas le convenga.</p>
  </div>
  <div class="container">
    <h2> Escoje el lugar de su preferencia... </h2>
    <p> Recuerde que en el diagrama apareceran los lugares disponibles en verde y los ocupados en rojos. </p>
    <img src="estacionamiento.jpeg" class="mx-auto d-block" alt="Cinque Terre" width="800" height="500" usemap="#mapa">
    <map name="mapa">
      <area shape="rect" coords="395,7,439,99" title="Cajon 1" id="c1">
      <area shape="rect" coords="442,7,488,99" href="QR.php" title="Cajon 2" id="c2">
      <area shape="rect" coords="483 11,521,93" href="" title="Cajon 3" id="c3">
      <area shape="rect" coords="524,11,563,93" href="" title="Cajon 4" id="c4">
      <area shape="rect" coords="566,11,605,93" href="" title="Cajon 5" id="c5">
      <area shape="rect" coords="678,11,716,93" href="" title="Cajon 6" id="c6">
      <area shape="rect" coords="719,11,758,93" href="" title="Cajon 7" id="c7">
      <area shape="rect" coords="761,11,798,93" href="" title="Cajon 8" id="c8">
      <area shape="rect" coords="398,400,435,480" href="" title="Cajon 9" id="c9">
      <area shape="rect" coords="439,400,478,480" href="" title="Cajon 10" id="c10">
      <area shape="rect" coords="480,400,520,480" href="" title="Cajon 11" id="c11">
      <area shape="rect" coords="523,400,562,480" href="" title="Cajon 12" id="c12">
      <area shape="rect" coords="565,400,604,480" href="" title="Cajon 13" id="c13">
      <area shape="rect" coords="677,400,715,480" href="" title="Cajon 14" id="c14">
      <area shape="rect" coords="719,400,758,480" href="" title="Cajon 15" id="c15">
      <area shape="rect" coords="761,400,800,480" href="" title="Cajon 16" id="c16">
      <!-- No emmpleen el href, les voy a ayudar para usar una funcion JS -->
    </map>
  </div>
  <div class="container">
    <br>
    <a id="act" class="btn btn-info" role="button"> Reservar </a>
    <a href="QR.php#" class="btn btn-dark" role="button"> Revisar QR </a>
  </div>
  </div>
  <script>
  $('#act').click(estado);
  //$(function() {
    //estado();
    
  //});
  function estado(){
    $.ajax({
      url: 'status.php',
      type: 'POST',
      dataType: 'json',
      success: function(response){
        console.log(response);
      },
      error: function(error){
        console.log('incorrecto');
        console.log(error);
        
      }
    });
 }
 
</script>


</body>



</html>

<?php
//session_start();
if ($_SESSION['n'] == 1 && $_SESSION['entro'] == true) {
  echo "<script>swal('¡Felicitaciones!', 'Ingreso exitoso', 'success')</script>";
  $_SESSION['entro'] = false;
}
?>