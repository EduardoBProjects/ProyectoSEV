<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Contáctanos</title>
  <!--<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>-->
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>
    <!--<nav class="navbar navbar-expand-md bg-dark navbar-dark">
   Brand 
  <img src="Logotipo.gif" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
  <a class="navbar-brand" href="usuario.php#">&nbsp;&nbsp;
  <?php
   session_start();
   //$_SESSION['n']=0;
   if($_SESSION['n']==0){
       echo "Invitado";
   }else if($_SESSION['n']==1){
       echo $_SESSION['alias'];
   }
   
    ?>  
  &nbsp;&nbsp;</a>

   Toggler/collapsibe Button 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

   Navbar links 
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="reserva.php#"><button class="btn btn-info"> Reservar </button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="politicas.php#"><button class="btn btn-warning"> Politicas de privacidad </button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactanos.php#"><button class="btn btn-danger"> Contactanos </button></a>
      </li>
      <li class="nav-item">
      <form name="cerrars" id="cerrars" method="POST" action="cerrars.php"> 
      <a class="nav-link" href= "" >
        <button class="btn btn-danger" type="sumit"> 
         <?php
        //session_start();
    if($_SESSION['n']==1){
        echo "Cerrar Sesión";
        //$_SESSION['n']=0;
    }else if($_SESSION['n']==0){
        echo "Iniciar Sesión";
    }
    ?>

    </button> 
  </a>
  </form>
      </li>
    </ul>
  </div>
</nav>-->
    <div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Contactanos</h1>
  <p>En esta sección puede encontrar nuestro contactos</p> 
</div>
<div class="container">
  <h2>Número telefonicó</h2>
  <br>
  <img src="telefono.jpg" class="float-left" alt="Cinque Terre" width="50" height="50">
  <p> 01800-55-69-58-74-96 </p>
</div>
<div class="container">
    <br>
  <h2>Whatsapp</h2>
  <br>
  <img src="whatsapp.png" class="float-left" alt="Cinque Terre" width="50" height="50">
  <p> 55-20-24-00-28 </p>
</div>
<div class="container">
    <br>
  <h2> Facebook </h2>
  <br>
  <img src="facebook.png" class="float-left" alt="Cinque Terre" width="50" height="40">
  <p> @Parquimetro inteligente </p>
</div>
<div class="container">
    <br>
  <a href="index.php#" class="btn btn-warning" role="button"> Pagina principal </a>
</div>
</body>