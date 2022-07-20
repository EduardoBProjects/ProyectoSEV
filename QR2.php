<!DOCTYPE HTML>
<html lang="es">
<head>
  <title>ERROR QR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>
     <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <img src="Logotipo.gif" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
  <a class="navbar-brand" href="IP.php#">&nbsp;&nbsp;PI&nbsp;&nbsp;</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="index.php#"><button class="btn btn-secondary"> Inicio </button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reserva.php#"><button class="btn btn-info"> Reservar </button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="politicas.php#"><button class="btn btn-warning"> Politicas de privacidad </button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactanos.php#"><button class="btn btn-danger"> Contactanos </button></a>
      </li>
    </ul>
  </div>
</nav>
    <div class="jumbotron text-center" style="margin-bottom:0">
  <h1> QR no encontrado, genero uno nuevo </h1>
</div>
<div class="container">
    <br>
  <img src="errorQR.gif" class="mx-auto d-block" alt="Cinque Terre" width="200" height="200">
</div>
<div class="container">
    <br>
  <h2 class=text-center> Si usted ya genero un codigo QR y no aparece tiene que generar uno nuevo </h2>
</div>
<div class="container">
    <br>
  <a href="index.php#" class="btn btn-dark" role="button"> Pagina principal </a>
  <a href="reserva.php#" class="btn btn-danger" role="button"> Regresar </a>
</div>
</body>
</html>