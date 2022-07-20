<?php session_start(); ?>
<!DOCTYPE html>

<head>

  <head>
    <title>Menu principal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
      .fakeimg {
        height: 200px;
        background: #aaa;
      }
    </style>
    <script src="Funciones/recarga.js">

    </script>
    <script>
      window.onbeforeunload = function() {
    return 'You have unsaved changes!';
};
    </script>
    
  </head>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <img src="Logotipo.gif" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
    <a class="navbar-brand" href="#" onclick="cargarPagina('usuario.php')">&nbsp;&nbsp; <div id="user"> <?php echo $_SESSION['alias']; ?></div>&nbsp;&nbsp;</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#"><button class="btn btn-info" onclick="cargarPagina('reserva.php')"> Reservar </button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><button class="btn btn-warning" onclick="cargarPagina('politicas.php')"> Politicas de privacidad </button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><button class="btn btn-danger" onclick="cargarPagina('contactanos.php')"> Contactanos </button></a>
        </li>
        <li class="nav-item">
          <form name="cerrars" id="cerrars" method="POST" action="cerrars.php">
            <a class="nav-link" href="">
              <button class="btn btn-danger" type="sumit">
                <?php
                //session_start();
                if ($_SESSION['n'] == 1) {
                  echo "Cerrar Sesión";
                  //$_SESSION['n']=0;
                } else if ($_SESSION['n'] == 0) {
                  echo "Iniciar Sesión";
                }
                ?>

              </button>
            </a>
          </form>
        </li>
      </ul>
    </div>
  </nav>



  <div id="main">

  </div>

</body>

</html>
<?php

if ($_SESSION['n'] == 1 && $_SESSION['entro'] == true) {
  //echo "<script>swal('¡Felicitaciones!', 'Ingreso exitoso', 'success')</script>";
  echo "<script>       Swal.fire({
    title: 'Bienvenido de vuelta',
    text: 'Le gustaria hacer una reservacion ahora?',
    icon: 'success',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, me gustaria!'
  }).then((result) => {
    if (result.isConfirmed) {
      cargarPagina('reserva.php')
    }else{
      cargarPagina('usuario.php')
    }

  })</script>";
  $_SESSION['entro'] = false;
}
?>