<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="es">

<head>
  <title>Usuario</title>
  <!--<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>-->
  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }

    table {
      border-collapse: collapse; width: 100%; margin-top:10px;
    }

    table tr:hover
     {
      width: 35%;
      align-items: center;
      border: 1px solid #aaa; padding: 10px;
       
  background-color: #aaa;
  cursor: pointer;

    }
    td{
      width: 35%;
      align-items: center;
      border: 1px solid #ccc; padding: 10px;
    }
  </style>
</head>

<body>
  <div class="jumbotron text-center" style="margin-bottom:0">
    <h1>Usuario</h1>
    <p>Aqui puede agregar sus datos, ver los datos agregados y modificarlos, si usted lo prefiere</p>
  </div>
  <div class="container">
    <h2 class="text-center">Bienvenido a su parquimetro inteligente</h2>
    <br>
    <img src="#" class="mx-auto d-block" alt="Cinque Terre" width="250" height="250">
    <br>
    <table class="default" >
      <tr onclick="cargarPagina('cambalias.php')" title="Click aqui para cambiar tu alias.">
        <td>
          <p>Alias: </p>
        </td>
        <td>
          <p class="font-weight-bold">
            <?php
            //session_start();
            echo $_SESSION['alias'];
            ?>
          </p>
        </td>
        <td>
          <img src="cont.png" class="mx-auto d-block" alt="Cinque Terre" width="50" height="50">
        </td>
      </tr>

      <!-- Fila para el cambio de datos personales. -->

      <tr onclick="cargarPagina('cambiapersonal.php')" title="Click aqui para cambiar tus datos personales.">
        <td>
          <p>Nombre: </p>
        </td>
        <td>
          <p>
            <?php
            //session_start();
            echo $_SESSION['nombre'] . " " . $_SESSION['apell'];
            ?>
          </p>
        </td>
        <td>
          <img src="cont.png" class="mx-auto d-block" alt="Cinque Terre" width="50" height="50">
        </td>
      </tr>
      <tr>
        <td>
          <p>
            Edad:
          </p>
        </td>
        <td>
          <?php
          //session_start();
          echo "Edad: " . $_SESSION['edad'];
          ?>
        </td>
        <td>

        </td>
      </tr>
      <tr onclick="cargarPagina('cambiacorreo.php')" title="Click aqui para cambiar tu correo electronico.">
        <td>
          Correo:
        </td>
        <td>
          <p>
            <?php
            //session_start();
            echo $_SESSION['correo'];
            ?>
          </p>
        </td>
        <td>
          <img src="cont.png" class="mx-auto d-block" alt="Cinque Terre" width="50" height="50">
        </td>
      </tr>
      <tr onclick="cargarPagina('cambiavehiculo.php')" title="Click aqui para cambiar datos del vehiculo.">
      <td>
        Vehiculo:
      </td>
        <td>
          <p>
            <?php
            //session_start();
            echo "<p class='font-weight-bold'>".$_SESSION['carr']."</p>". " Con Matricula: <p class='font-weight-bold'>" . $_SESSION['mat']."</p>";
            ?>
          </p>
        </td>
        <td>
          <img src="cont.png" class="mx-auto d-block" alt="Cinque Terre" width="50" height="50">
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <?php
            //session_start();
            echo "Numero de tarjeta: " . $_SESSION['nt'];
            ?>
          </p>
        </td>
      </tr>
    </table>
  </div>
  <div class="container">
    <a href="#" onclick="cargarPagina('cambiacontra.php')" class="btn btn-info" role="button"> Cambiar contraseña </a>
    <!--<a href="cierras.php#" class="btn btn-dark" role="button"> Cerrar Sesion </a>
    <a href="cambiod.php#" class="btn btn-danger" role="button"> Editar Datos </a>
    <a href="reserva.php#" class="btn btn-success" role="button"> Reservar </a>-->
  </div>
</body>

</html>
