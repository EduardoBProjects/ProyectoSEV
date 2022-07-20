<!DOCTYPE HTML>
<html lang="es">
<head> 
<!--Requiere la atiqueta meta-->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Index</title>
  <style type="text/css">
  body{
background-image: url(1020105.jpg);
background-size: cover;
background-repeat: no-repeat;
}
</style>
</head>
<body > 
<!-- bg-dark podemos cambiar el color -->
<!-- expand-md se resiere en que tamaño colapsara la barra -->
     
<br>
    <main> 
        <div class="jumbotron text-center">
    <h1 class="text-muted" style = "font-family:Capuche">Servicio de Estacionamiento Virtual</h1>
    <h1 class="text-muted" style = "font-family:Capuche">"Una forma inteligente de aparcar tu carro"</h1>
    <h1 class="text-muted" style = "font-family:Capuche">@DragonSolution</h1>
    <p class="text-muted" style = "font-family:Capuche">Aparta tu lugar desde la comodidad de su hogar</p>
  </div>
  </div>
    </main>
    <div class="container">
  <h2 class="text-muted" style = "font-family:Capuche">Iniciar Sesión</h2>
  <p class="text-muted" style = "font-family:Capuche">Recuerde que cuando pida su lugar tiene aprox. 30min 
  para arribar a su cajón, si no, se perderá y tendrá que generar uno nuevo</p>
  <form name="finiciar" id="finiciar" method="POST" action="resiv.php">
    
    <div class="form-group">
      <label for="usr" class="text-muted" style = "font-family:Capuche">Alias del usuario:</label>
      <input type="text" class="form-control" style = "font-family:Capuche" id="usr" 
      
      placeholder="Ingresa tu alias" name="username" required>
      <p style="color: white">Admin</p>
    </div>
    <div class="form-group">
      <label for="pwd" class="text-muted" style = "font-family:Capuche">Contraseña:</label>
      <input type="password" class="form-control" style = "font-family:Capuche"id="pwd" 
      placeholder="Contraseña del usuario" name="password" required>
      <p style="color: white">@dminG12345</p>
    </div>
    <br>


    <input class="btn btn-primary" type="submit">
    <input class="btn btn-primary" type="reset">
    <a href="formulario.php#" class="btn btn-primary" role="button"> Registrate </a>
  <!--<a href="" class="btn btn-info" role="button" type="submit"> Registrate </a>-->

  </form>
</div>
<br>
<br>
    <footer class="blockquote-footer text-center" >
        <h5 class="text-muted" style = "font-family:Capuche">Esta empresa tiene colaboración con 
        "DragonSolution"</h5>
    </footer>
</body>
</html>

<?php

session_start();
if($_SESSION['r']==1&&$_SESSION['notuser']==true&&$_SESSION['notcontra']==false){
  //
  echo "<script>swal('¡Atención!', 'La contraseña que ingresaste es incorrecta', 'error')</script>";
  //echo $_SESSION['notuser']."contra incorrecta".$_SESSION['notcontra'];
  
}else if($_SESSION['r']==1&&$_SESSION['notuser']==false){
  echo "<script>swal('¡Atención!', 'Usuario No Encontrado', 'error')</script>";
  
}else if($_SESSION['reg']==true){
 echo "<script>swal('¡Atención!', 'Registro correcto. Ahora puede iniciar sesion.', 'success')</script>";
  $_SESSION['reg']=false;
  //echo "<script>swal('¡Atención!', 'nohay nada', 'error')</script>";
}else if($_SESSION['n']==null) {
  
}else if($_SESSION['cerrar']==1){
  echo "<script>swal('¡Vuelva pronto!', 'Cierre de sesion exitoso', 'success')</script>";
  session_destroy();
}

$_SESSION['notuser']=false;
 $_SESSION['reg']=false; 
 $_SESSION['notcontra']=false;
  $_SESSION['r']=0;


?>
