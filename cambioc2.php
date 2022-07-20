<!DOCTYPE HTML>
<html lang="es">
<head>
  <title>Cambio de contraseña</title>
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
  <h1>Cambio de contraseña</h1>
  <p>Recuerda que tu cambio de contraseña sera siempre por via electronica.</p> 
</div>
<div class="container">
  <h2>Es responsabilidad del usuario recordar su nueva contraseña</h2>
</div>
<div class="container">
  <h2>Su contraseña no debe contener mas de 10 caracteres, con minimo una letra mayuscula y caracteres
  especiales (numeros, *, #, %, &).</h2>
  <form action="/action_page.php">
    <div class="form-group">
        <div class="form-group">
            <!--PREGUNTAR PARA QUE SIRVE EL name:-->
      <label for="pwd">Contraseña:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Contraseña nueva" name="pswd">
    </div>
    </div>
    <!--<button type="submit" class="btn btn-primary">Registrarte</button>-->
    <div class="container">
  <a href="usuario.php#" class="btn btn-info" role="button"> Guardar contraseña </a>
</div>
  </form>
</div>
</body>
</html>