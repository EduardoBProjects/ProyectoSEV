<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="es">

<head>
    <title>Modificar datos del vehiculo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--El escript de abajo contiene funciones para validar los campos-->
    <script type="text/javascript">
        function validarMod() {
            //Por cada movimiento en el campo de formulario el mensaje de error desaparecera desde un principio para que
            //no haya repeticion del mensaje
            document.getElementById("errormo").classList.remove("mostrar");
            //obteniendo el valor que se puso en el campo text del formulario
            var miCampoTexto = document.getElementById("car").value;
            //la condición
            if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                //alert('El campo de texto esta vacio!');
                //si la condicion se cumple le agregamos el atributo mostrar al mensaje de error.
                document.getElementById("errormo").classList.add("mostrar");
                document.getElementById("login").disabled = true;
                return false;
            } else
                // Si no se cumple la condicion removemos el atributo mostrar (desaparece el mensaje de error)
                document.getElementById("errormo").classList.remove("mostrar");
            document.getElementById("login").disabled = false;
            return true;
        }

        function validarMat() {
            //Por cada movimiento en el campo de formulario el mensaje de error desaparecera desde un principio para que
            //no haya repeticion del mensaje
            document.getElementById("errorma").classList.remove("mostrar");
            //obteniendo el valor que se puso en el campo text del formulario
            var miCampoTexto = document.getElementById("mat").value;
            //la condición
            if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                //alert('El campo de texto esta vacio!');
                //si la condicion se cumple le agregamos el atributo mostrar al mensaje de error.
                document.getElementById("errorma").classList.add("mostrar");
                document.getElementById("login").disabled = true;
                return false;
            } else
                // Si no se cumple la condicion removemos el atributo mostrar (desaparece el mensaje de error)
                document.getElementById("errorma").classList.remove("mostrar");
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
        <h1>Cambia los datos de tu vehiculo</h1>
        <p>Recuerde que sus datos no se ocuparan con fines de lucro o estafa.</p>
    </div>

    <div class="container">
        
            <div class="form-group">
                <div class="form-group">
                    <label for="pwd">Modelo vehiculo:</label>
                    <input type="text" class="form-control" id="car" placeholder="Modelo del vehiculo" name="car" value="<?php
                    echo $_SESSION['carr'];
                    ?>" onkeyup="validarMod(); return false" required>
                    
                </div>
                <div id="msg"></div>


                <div id="errormo" class="alert alert-danger ocultar" role="alert">
                    El campo Modelo del vehiculo esta vacio !
                </div>
                <div class="form-group">
                    <label for="pwd">Matricula del vehiculo:</label>
                    <input type="text" class="form-control" id="matricula" placeholder="Matricula del vehiculo" name="matricula" value="<?php
                    echo $_SESSION['mat'];
                    ?>" onkeyup="validarMat(); return false" required>
                    
                </div>
                <div id="msg"></div>


                <div id="errorma" class="alert alert-danger ocultar" role="alert">
                    El campo Matricula esta vacio !
                </div>
                <?php
                $_SESSION['op'] = 'carro';
                ?>
                

                <button  id="login" class="btn btn-primary">Actualizar</button>
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
            car: $('#car').val(),
            matricula: $('#matricula').val()

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
if ($_SESSION['camb'] == 1) {
    echo "<script>swal('¡Atención!', 'Actualización de datos correcto', 'success')</script>";
    $_SESSION['camb'] = 0;
} else if ($_SESSION['camb'] == 2) {
    echo "<script>swal('¡Atención!', 'Actualizción de datos incorrecto', 'error')</script>";
    $_SESSION['camb'] = 0;
} 
?>