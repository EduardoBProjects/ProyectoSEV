<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
<?php
$nom=$_POST['username'];
$mail=$_POST['mail'];
$alias=$_POST['alias'];
$edad=$_POST['edad'];
$car=$_POST['car'];
$mat=$_POST['matricula'];
$pw=$_POST['pswd'];
$fe=$_POST['fe'];

$salt=md5($pw);
$pw=crypt($pw,$salt);
$credit=$_POST['credit'];
$ccv=$_POST['ccv'];
$apell=$_POST['apell'];

$id_temp=rand(1, 1000);
session_start();
include("Funciones/Coneccion.php"); //debe llevar 4 paremetros
    //Comprobamos si el alias del usuario esta ocupado.
$sql = "SELECT * FROM usuarios WHERE Alias='$alias'";
$query = $conecta->query($sql);
$filas=mysqli_num_rows($query);
if($filas==0) {
//echo "Si se puede conectar a la BD <br>";
//echo "<script>swal('¡Atención!', 'Si se puede conectar a la BD', 'success')</script>";
$sql = "INSERT INTO usuarios(Alias,N_Usuario,Nombre,Apellido,Edad,Correo,Contraseña)
VALUES('$alias','$id_temp','$nom','$apell','$edad','$mail','$pw')";

if($conecta->query($sql)){
    //echo "Registro correcto";
    //
    $sql = "INSERT INTO vehiculo(Matricula,Alias,Modelo_Vehiculo)
    VALUES('$mat','$alias','$car')";
    $conecta->query($sql);
    $sql = "INSERT INTO cuentas(id_Cuenta,Alias,N_Tarjeta,CVV,Fehca_Exp)
    VALUES('$id_temp','$alias','$credit','$ccv','$fe')";  
    
     $conecta->query($sql);
         //
         
         $_SESSION['reg']=true;
         echo "<script>document.location.href='index.php'</script>";
     

}else{
    //echo "Incorrecto";
    echo "<script>swal('¡Atención!', 'Registro incorrecto', 'error')</script>";

}


}else{
    echo "<script>swal('¡Atención!', 'Alias de usuario ocupado', 'error')</script>";
}


?>