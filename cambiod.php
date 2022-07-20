<!DOCTYPE HTML>
<html lang="es">
<head>
  <title>Cambiar Datos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <!--El escript de abajo contiene funciones para validar los campos-->
  <script type="text/javascript">
    function validarAlias() {
      //Por cada movimiento en el campo de formulario el mensaje de error desaparecera desde un principio para que
      //no haya repeticion del mensaje
      document.getElementById("error").classList.remove("mostrar"); 
 //obteniendo el valor que se puso en el campo text del formulario
 var miCampoTexto = document.getElementById("alias").value;
 //la condición
 if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
     //alert('El campo de texto esta vacio!');
     //si la condicion se cumple le agregamos el atributo mostrar al mensaje de error.
     document.getElementById("error").classList.add("mostrar");
     return false;
 }else
 // Si no se cumple la condicion removemos el atributo mostrar (desaparece el mensaje de error)
 document.getElementById("error").classList.remove("mostrar");
 return true;
 }

function validarNom(){
  document.getElementById("errorn").classList.remove("mostrar");
  var miCampoTexto = document.getElementById("username").value;
 //la condición
 if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
     //alert('El campo de texto esta vacio!');
     //si la condicion se cumple le agregamos el atributo mostrar al mensaje de error.
     document.getElementById("errorn").classList.add("mostrar");
     return false;
 }else
 // Si no se cumple la condicion removemos el atributo mostrar (desaparece el mensaje de error)
 document.getElementById("errorn").classList.remove("mostrar");
 return true;
 }

</script>

<style type="text/css">
  .ocultar {
      display: none;
  }

  .mostrar {
      display: block;
  }
</style>

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

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
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
</nav>
    <div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Cambio tus datos personales</h1>
  <p>Recuerde que sus datos no se ocuparan con fines de lucro o estafa.</p> 
</div>

<div class="container">
  <h2>Cualquier duda o aclaracion acuda en nuestra seccion de contactanos, estaremos encantados
  de esuchar su opinion o si lo prefiere contacte a nuestro asociado @DragonSolution</h2>

 
  <form method="POST" action="cambiodatos.php">
    <div class="form-group">
        <div class="form-group">
            <!--PREGUNTAR PARA QUE SIRVE EL name:onkeyup="compalias(this);"-->
      <label for="pwd">Alias:</label>
      <input type="text" class="form-control" id="alias" placeholder="Alias del usuario" name="alias" onkeyup="validarAlias(); return false" required>
      <?php
      
  //session_start();
  echo $_SESSION['alias'];
  ?>
      
    </div>
    <div id="msg"></div>

  
  <div id="error" class="alert alert-danger ocultar" role="alert">
      El campo Alias esta vacio !
  </div>
  
        <div class="form-group">
      <label for="pwd">Nombre:</label>
      <input type="text" class="form-control" id="username" placeholder="Nombre del usuario" name="username" value=" " onkeyup="validarNom(); return false" required>
      <?php
  //session_start();
  echo $_SESSION['nombre'];
  ?>
     
    </div>
    <div id="errorn" class="alert alert-danger ocultar" role="alert">
      El campo Nombre esta vacio !
  </div>
    <div class="form-group">
      <label for="pwd">Apellido:</label>
      <input type="text" class="form-control" id="apell" placeholder="Apellidos del usuario" name="apell" value="" required>
      <?php
  //session_start();
  echo $_SESSION['apell'];
  ?>
      
    </div>
    <div class="form-group">
      <label for="pwd">Edad:</label>
      <input type="number" class="form-control" id="edad" placeholder="Edad del usuario" name="edad" 
      value="" required>
      <?php
  //session_start();
  echo $_SESSION['edad'];
  ?>
      
    </div>
    <div class="form-group">
      <label for="pwd">Modelo vehiculo:</label>
      <input type="text" class="form-control" id="car" placeholder="Modelo del vehiculo" name="car" value="" required>
      <?php
  //session_start();
  echo $_SESSION['carr'];
  ?>
      
    </div>
    <div class="form-group">
      <label for="pwd">Matricula del vehiculo:</label>
      <input type="text" class="form-control" id="mat" placeholder="Matricula del vehiculo" name="matricula" value="" required>
      <?php
  //session_start();
  echo $_SESSION['mat'];
  ?>
      
    </div>
    <div>
      <label for="email">Correo:</label>
      <input type="email" class="form-control" id="mail" placeholder="Correo electronico" name="mail" value="" required>
      <?php
  //session_start();
  echo $_SESSION['correo'];
  ?>
      
    </div>
    <div class="form-group">
      <label for="pwd">Tarjeta de credito:</label>
      <input type="text" class="form-control" id="credit" placeholder="Opcional" name="credit">
    </div>
    <div class="form-group">
<label for="pwd">CCV de la tarjeta de credito:</label>
<input type="number" class="form-control" id="ccv" placeholder="Opcional" name="ccv">
</div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Acepto los terminos y condiciones
      </label>  
    </div>
    <!--<button type="submit" class="btn btn-primary">Registrarte</button>-->
    
    
    <button type="submit" id="login" class="btn btn-primary" >Enviar</button>
  <!--<input class="btn btn-danger"  ><button type="submit" id="login" class="btn btn-primary" >Enviar</button>-->

  </form>
</div>


</body>
</html>