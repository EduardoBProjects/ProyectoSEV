<!DOCTYPE HTML>
<html lang="es">
<head>
  <title>Formulario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity= 
"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous" /> 

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
  <h1>Registrate con nosotros</h1>
  <p>Porfavor ingrese los datos que se le solicite, dudas y aclaraciones comuniquese con nuestro equipo
  de soporte tecnico @Dragonsolution</p> 
</div>
<div class="container">
  <br>
  <h2>Sus datos estan protegido y esta extritamente prohibido usarlos con fines de lucro.</h2>
</div>

<!--Verificar contraseña-->
<div class="container">   

  
  <!-- Fin Mensajes de Verificación 

  <form id="miformulario" method="POST" onsubmit="verificarPasswords(); return false">
      <div class="form-group">
        <label for="usuario">Usuario</label>
        <input type="text" class="form-control" id="usuario" value="usuariogenial" required>              
      </div>
      <div class="form-group">
        <label for="pass1">Contraseña</label>
        <input type="password" class="form-control" id="pass1" required>
      </div>
      <div class="form-group">
          <label for="pass2">Vuelve a escribir la Contraseña</label>
          <input type="password" class="form-control" id="pass2" required>                
      </div>
      
      
  </form>         -->

</div>



<div class="container">
  
  
  <form id="miformulario" method="POST"  action="registro.php">
    <div class="form-group">
        <div class="form-group">
            
      <label for="pwd">Alias:</label>
      <input type="text" class="form-control" id="al" placeholder="Alias del usuario" name="alias" required>
    </div>
        <div class="form-group">
      <label for="pwd">Nombre:</label>
      <input type="text" class="form-control" id="name" placeholder="Nombre del usuario" name="username" required>
    </div>
    <div class="form-group">
      <label for="pwd">Apellido:</label>
      <input type="text" class="form-control" id="apell" placeholder="Apellidos del usuario" name="apell" required>
    </div>
    <div class="form-group">
      <label for="pwd">Edad:</label>
      <input type="number" class="form-control" id="edad" placeholder="Edad del usuario" name="edad" required>
    </div>
    <div class="form-group">
      <label for="pwd">Modelo vehiculo:</label>
      <input type="text" class="form-control" id="car" placeholder="Modelo del vehiculo" name="car" required>
    </div>
    <div class="form-group">
      <label for="pwd">Matricula del vehiculo:</label>
      <input type="text" class="form-control" id="mat" placeholder="Matricula del vehiculo" name="matricula" required>
    </div>
      <label for="email">Correo:</label>
      <input type="email" class="form-control" id="email" placeholder="Correo electronico" name="mail" required>
    </div>
    <div class="form-group">
      <p>El formato de la contraseña debe ser el siguiente:</p>
      <p color="red">* Minimo 8 caracteres</p>
      <p>* Maximo 15</p>
      <p>* Al menos una letra mayúscula</p>
      <p>* Al menos una letra minucula</p>
      <p>* Al menos un dígito</p>
      <p>* No espacios en blanco</p>
      <p>* Al menos 1 caracter especial</p>
      <label for="pwd">Contraseña:</label>
      <input type="password" class="form-control" id="pass1" placeholder="Contraseña" name="pswd"  onkeyup="verificarPasswords(); return false" required>
    </div>
    <div class="form-group">
      <label for="pwd">Confirmar Contraseña:</label>
      <input type="password" class="form-control" id="pass2" placeholder="Confirme su contraseña" name="pswd" onkeyup="verificarPasswords(); return false"  required>
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
    <div class="form-group">
            <!--PREGUNTAR PARA QUE SIRVE EL name:-->
      <label for="pwd">Tarjeta de credito:</label>
      <input type="text" class="form-control" id="tc" placeholder="Opcional" name="credit">
    </div>
    <div class="form-group">
      <!--PREGUNTAR PARA QUE SIRVE EL name:-->
<label for="pwd">CCV de la tarjeta de credito:</label>
<input type="number" class="form-control" id="ccv" placeholder="Opcional" name="ccv">
</div>
<div class="form-group">
<label for="pwd">Fecha de expiracion:</label>
<input type="text" class="form-control" id="ccv" placeholder="Opcional" name="fe">
</div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Acepto los terminos y condiciones
      </label>  
    </div>
    <!--<button type="submit" class="btn btn-primary">Registrarte</button>
    <input class="btn btn-info" type="submit">-->
    <button type="submit" id="login" class="btn btn-primary" >Login</button>
    <!--<button type="" id="login" class="btn btn-primary" onclick="verificarPasswords(); return false">Comprobar contraseña</button>
    <input class="btn btn-danger" type="" onclick="verificarPasswords()">-->
  <!--<a href="" class="btn btn-info" role="button" type="submit"> Registrate </a>-->

  </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity= 
"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"> 
</script> 
<script src= 
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity= 
"sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"> 
</script> 
<script src= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity= 
"sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"> 
</script> 


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

  } 
  
</script>
<script>
  function enviar_formulario(){
     document.miformulario.submit()
  }
  </script>
</body>
</html>
