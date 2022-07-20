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
    function validarCorreo() {
      //Por cada movimiento en el campo de formulario el mensaje de error desaparecera desde un principio para que
      //no haya repeticion del mensaje
      document.getElementById("error").classList.remove("mostrar"); 
 //obteniendo el valor que se puso en el campo text del formulario
 var miCampoTexto = document.getElementById("mail").value;
 //la condición
 if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
     //alert('El campo de texto esta vacio!');
     //si la condicion se cumple le agregamos el atributo mostrar al mensaje de error.
     document.getElementById("error").classList.add("mostrar");
     document.getElementById("login").disabled = true;
     return false;
 }else
 // Si no se cumple la condicion removemos el atributo mostrar (desaparece el mensaje de error)
 document.getElementById("error").classList.remove("mostrar");
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
  <h1>Cambia tu correo electronico</h1>
  <p>Recuerde que sus datos no se ocuparan con fines de lucro o estafa.</p> 
</div>

<div class="container">
    <div class="form-group">
        <div class="form-group">
            <!--PREGUNTAR PARA QUE SIRVE EL name:onkeyup="compalias(this);"-->
            <div>
      <label for="email">Correo:</label>
      <input type="email" class="form-control" id="mail" placeholder="Correo electronico" name="mail" value="<?php
  echo $_SESSION['correo'];
  ?>" onkeyup="validarCorreo(); return false" required>
      <?php
  $_SESSION['op']='correo'
  ?>
      
    </div>
    <div id="msg"></div>
  <div id="error" class="alert alert-danger ocultar" role="alert">
      El campo Correo electronico esta vacio !
  </div>
    
    <button id="login" class="btn btn-primary" >Actualizar</button>
  <!--<input class="btn btn-danger"  ><button type="submit" id="login" class="btn btn-primary" >Enviar</button>-->

</div>

<script>
      $('#login').click(regresar);


      function regresar() {
        Swal.fire({
    title: '¡PRECAUCION!',
    text: '¿Seguro que le gustaria cambiar su correo electronico? El correo puede ser usado para recuperar su contraseña',
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
            mail: $('#mail').val(),
          },
          success: function(data) {
            console.log('correcto');
            console.log(data);
            if (data[0][1] == 1) {
              swal('¡Atención!', 'Actualización de datos correcto. Para recuperar su contraseña use su nuevo correo: '+data[0][0], 'success');
            } else if (data[0][1] == 2) {
              swal('¡Atención!', 'Actualizción de datos incorrecto', 'error')
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
    echo "<script>swal('¡Atención!', 'Alias de usuario ocupado', 'error')</script>";
    $_SESSION['camb']=0;

}//else
//echo "<script>swal('¡Atención!', 'su perra madre ya tengo sueño', 'error')</script>";

?>