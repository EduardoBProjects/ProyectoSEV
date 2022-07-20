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

function verificarPasswords() {

// Ontenemos los valores de los campos de contraseñas 
pass1 = document.getElementById('pass1');
pass2 = document.getElementById('pass2');
var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/;
document.getElementById("error").classList.remove("mostrar"); 
document.getElementById("ok").classList.remove("mostrar");
document.getElementById("vacio").classList.remove("mostrar");
// ||pass2.value.search(regex)Validacion de formato de contraseña &S1aaaaa
if(pass1.value.search(regex)){
  document.getElementById("vacio").classList.add("mostrar");
  document.getElementById("login").disabled = true;
}else
//  || Verificamos si las constraseñas no coinciden 
if (pass1.value != pass2.value) {

    // Si las constraseñas no coinciden mostramos un mensaje 
    document.getElementById("error").classList.add("mostrar");
    //document.getElementById("ok").classList.remove("mostrar");
    document.getElementById("login").disabled = true;
    return false;
}

else {

    // Si las contraseñas coinciden ocultamos el mensaje de error
    document.getElementById("error").classList.remove("mostrar");
    document.getElementById("vacio").classList.remove("mostrar");
    // Mostramos un mensaje mencionando que las Contraseñas coinciden 
    document.getElementById("ok").classList.add("mostrar");

    // Habilitamos el botón de login 
    document.getElementById("login").disabled = false;

    return true;
}

function validarPasscopm(){
  document.getElementById("errorn").classList.remove("mostrar");
  var miCampoTexto = document.getElementById("pswdcomp").value;
 //la condición
 if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
     //alert('El campo de texto esta vacio!');
     //si la condicion se cumple le agregamos el atributo mostrar al mensaje de error.
     document.getElementById("errorcomp").classList.add("mostrar");
     document.getElementById("login").disabled = true;
     return false;
 }else
 // Si no se cumple la condicion removemos el atributo mostrar (desaparece el mensaje de error)
 document.getElementById("errorcomp").classList.remove("mostrar");
 document.getElementById("login").disabled = false;
 return true;
 }

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
  <h1>Cambia tu contraseña</h1>
  <p>Recuerde que sus datos no se ocuparan con fines de lucro o estafa.</p> 
</div>

<div class="container">
    <div class="form-group">
      <div class="form-grup">

      <p>Requerde que el formato de las contraseñas debe ser el siguiente:</p>
      <p color="red">* Minimo 8 caracteres</p>
      <p>* Maximo 15</p>
      <p>* Al menos una letra mayúscula</p>
      <p>* Al menos una letra minucula</p>
      <p>* Al menos un dígito</p>
      <p>* No espacios en blanco</p>
      <p>* Al menos 1 caracter especial</p>
      <br><br>
      <label for="pwd">Ingrese su Contraseña actual:</label>
      <input type="password" class="form-control" id="pswdcomp" placeholder="Contraseña actual" name="pswdcomp" required>
      </div>
      <div id="errorcomp" class="alert alert-danger ocultar" role="alert">
      El campo Contraseña actual No puede estar vacio !
  </div>
    <div class="form-group">
      <label for="pwd">Nueva Contraseña:</label>
      <input type="password" class="form-control" id="pass1" placeholder="Nueva Contraseña" name="pswd"  onkeyup="verificarPasswords(); return false" required>
    </div>
    <div class="form-group">
      <label for="pwd">Confirmar su nueva Contraseña:</label>
      <input type="password" class="form-control" id="pass2" placeholder="Confirme su nueva contraseña" name="pswd" onkeyup="verificarPasswords(); return false"  required>
    </div>
    <!-- Mensajes de Verificación onsubmit="verificarPasswords(); return false"-->
    <div id="msg"></div>

  
  <div id="error" class="alert alert-danger ocultar" role="alert">
      Las Contraseñas no coinciden, vuelve a intentar !
  </div>
  <div id="vacio" class="alert alert-danger ocultar" role="alert">
      El formato de la contraseña no es el indicado !
  </div>
  <div id="ok" class="alert alert-success ocultar" role="alert">
      Las Contraseñas coinciden ! 
  </div>
      <?php
      
  //session_start();
  $_SESSION['op']='contra';
  ?>
      
    </div>
    <button  id="login" class="btn btn-primary" >Actualizar</button>
  <!--<input class="btn btn-danger"  ><button type="submit" id="login" class="btn btn-primary" >Enviar</button>-->

</div>

<script>
      $('#login').click(regresar);


      function regresar() {
        Swal.fire({
    title: '¡PRECAUCION!',
    text: '¿Seguro que le gustaria cambiar su contraseña? La contraseña es utilizada para iniciar sesión.',
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, me gustaria!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      
  
      
        $.ajax({
          url: 'cambiodatos.php',
          type: 'POST',
          dataType: 'json',
          data: {
            pswdcomp: $('#pswdcomp').val(),
            pswd: $('#pass1').val()
          },
          success: function(data) {
            
            console.log('correcto');
            console.log(data);
            if (data[0][0] == 1) {
              swal('¡Atención!', 'Actualización de contraseña correcto. La proxima vez inicie sesion con la nueva contraseña ', 'success');
            $('#pass1').val('');
            $('#pass2').val('');
            $('#pswdcomp').val('');
            } else if (data[0][0] == 2) {
              swal('¡Atención!', 'Actualizción de contraseña incorrecto', 'error')
            } else if (data[0][0] == 3) {
              swal('¡Atención!', 'La contraseña actual es incorrecta', 'error');
       
            }


          },
          error: function(data) {
            console.log('incorrecto');
          }

        });

          }
  })
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

}else if($_SESSION['camb']==3){
  echo "<script>swal('¡Atención!', 'La contraseña actual no es correcta', 'error')</script>";
  $_SESSION['camb']=0;
}
?>