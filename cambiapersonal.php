<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
  <title>Modificar Alias</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--El escript de abajo contiene funciones para validar los campos-->
  <script type="text/javascript">

 // Funcion para validar campo de nombre vacio

 function validarNom(){
  document.getElementById("errorn").classList.remove("mostrar");
  var miCampoTexto = document.getElementById("username").value;
 //la condición
 if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
     //alert('El campo de texto esta vacio!');
     //si la condicion se cumple le agregamos el atributo mostrar al mensaje de error.
     document.getElementById("errorn").classList.add("mostrar");
     document.getElementById("login").disabled = true;
     return false;
 }else
 // Si no se cumple la condicion removemos el atributo mostrar (desaparece el mensaje de error)
 document.getElementById("errorn").classList.remove("mostrar");
 document.getElementById("login").disabled = false;
 return true;
 }

 // Validar Campo apellido

 function validarApell(){
  document.getElementById("errora").classList.remove("mostrar");
  var miCampoTexto = document.getElementById("apell").value;
 //la condición
 if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
     //alert('El campo de texto esta vacio!');
     //si la condicion se cumple le agregamos el atributo mostrar al mensaje de error.
     document.getElementById("errora").classList.add("mostrar");
     document.getElementById("login").disabled = true;
     return false;
 }else
 // Si no se cumple la condicion removemos el atributo mostrar (desaparece el mensaje de error)
 document.getElementById("errora").classList.remove("mostrar");
 document.getElementById("login").disabled = false;
 return true;
 }

 // Validar campo edad
 function validarEdad(){
  document.getElementById("errore").classList.remove("mostrar");
  var miCampoTexto = document.getElementById("edad").value;
 //la condición
 if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
     //alert('El campo de texto esta vacio!');
     //si la condicion se cumple le agregamos el atributo mostrar al mensaje de error.
     document.getElementById("errore").classList.add("mostrar");
     document.getElementById("login").disabled = true;
     return false;
 }else
 // Si no se cumple la condicion removemos el atributo mostrar (desaparece el mensaje de error)
 document.getElementById("errore").classList.remove("mostrar");
 document.getElementById("login").disabled = false;
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
    <div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Cambia tus datos personales</h1>
  <p>Recuerde que sus datos no se ocuparan con fines de lucro o estafa.</p> 
</div>

<div class="container">
    <div class="form-group">
        <div class="form-group">
        <div class="form-group">
      <label for="pwd">Nombre:</label>
      <input type="text" class="form-control" id="username" placeholder="Nombre del usuario" name="username" value="<?php
      echo $_SESSION['nombre'];
  ?>" onkeyup="validarNom(); return false" required>
      
    </div>
    <div id="errorn" class="alert alert-danger ocultar" role="alert">
      El campo Nombre esta vacio !
  </div>
    <div class="form-group">
      <label for="pwd">Apellido:</label>
      <input type="text" class="form-control" id="apell" placeholder="Apellidos del usuario" name="apell" value="<?php
   echo $_SESSION['apell'];
  ?>" onkeyup="validarApell(); return false" required>
     
      
    </div>
    <div id="msg"></div>
    <div id="errora" class="alert alert-danger ocultar" role="alert">
      El campo Apellido esta vacio !
    </div>
    <div class="form-group">
      <label for="pwd">Edad:</label>
      <input type="number" class="form-control" id="edad" placeholder="Edad del usuario" name="edad" value="<?php
  echo $_SESSION['edad'];
  ?>" onkeyup="validarEdad(); return false" required>
      
      
    </div>
    <div id="errore" class="alert alert-danger ocultar" role="alert">
      El campo Edad esta vacio !
    </div>
      <?php
      
  //session_start();
  $_SESSION['op']='personal';
  ?>
      
    </div>
    <button id="login" class="btn btn-primary" >Actualizar</button>
  <!--<input class="btn btn-danger"  ><button type="submit" id="login" class="btn btn-primary" >Enviar</button>-->

</div>

<script>
      $('#login').click(regresar);


      function regresar() {

        $.ajax({
          url: 'cambiodatos.php',
          type: 'POST',
          dataType: 'json',
          data: {
            username: $('#username').val(),
            apell: $('#apell').val(),
            edad: $('#edad').val()

          },
          success: function(data) {
            console.log('correcto');
            console.log(data);
            if (data[0][0] == 1) {
              swal('¡Atención!', 'Actualización de datos correcto.', 'success');
            } else if (data[0][0] == 2) {
              swal('¡Atención!', 'Actualizción de datos incorrecto', 'error')
            } 


          },
          error: function(data) {
            console.log('incorrecto');
          }

        });
      }

      
    </script>

</body>
</html>

<?php
/*session_start();
if($_SESSION['camb']==1){
    echo "<script>swal('¡Atención!', 'Actualización de datos correcto', 'success')</script>";
    $_SESSION['camb']=0;

}else if($_SESSION['camb']==2){
    echo "<script>swal('¡Atención!', 'Actualizción de datos incorrecto', 'error')</script>";
    $_SESSION['camb']=0;

}
?>