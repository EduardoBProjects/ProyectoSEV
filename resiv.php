<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php

// 2do funcional.
//este es el alias en realidad
$nom = $_POST['username'];
$pw = $_POST['password'];

////////////////////////////////////////////////////
//include('conectabd.php');
include("Funciones/Coneccion.php"); //debe llevar 4 paremetros
//$nom en realidad es el alias
$sql = "SELECT * FROM usuarios WHERE Alias='$nom'";
$query = $conecta->query($sql);
$filas = mysqli_num_rows($query);
if ($filas == 0) {
	// usuario no encontrado
	session_start();
	$_SESSION['notuser'] = false;
	$_SESSION['notcontra'] = false;
	$_SESSION['r'] = 1;
	echo "<script>document.location.href='index.php'</script>";
} else {
	while ($fila = $query->fetch_array()) {
		if (isset($fila[0])) //fila[6] Es el alias del usuario
		{
			if ($fila[6] == crypt($pw, md5($pw))) //
			{
				//echo "<a href='reserva.php' class='btn btn-primary btn-lg ' role='button'> Ingresar </a> ";
				session_start();

				$_SESSION['n'] = 1;
				$_SESSION['entro'] = true;
				//echo "<script>swal('¡Felicitaciones!', 'Ingreso exitoso', 'success')</script>";									
				$_SESSION['nombre'] = $fila["Nombre"];
				$_SESSION['apell'] = $fila["Apellido"];
				$_SESSION['alias'] = $fila["Alias"];
				$_SESSION['edad'] = $fila["Edad"];
				$_SESSION['edad'] = (int) $_SESSION['edad'];
				
				$_SESSION['correo'] = $fila["Correo"];


				$sql = "SELECT * FROM vehiculo WHERE Alias='$nom'";
				$query = $conecta->query($sql);
				$filas = mysqli_num_rows($query);
				while($fila = $query->fetch_array()){
					$_SESSION['carr'] = $fila["Modelo_Vehiculo"];
					$_SESSION['mat'] = $fila["Matricula"];

				$sql = "SELECT * FROM cuentas WHERE Alias='$nom'";
				$query = $conecta->query($sql);
				$filas = mysqli_num_rows($query);
				while($fila = $query->fetch_array()){
					$_SESSION['nt'] = $fila['N_Tarjeta'];
					$_SESSION['ccv'] = $fila['CCV'];
					$_SESSION['fe'] = $fila['Fehca_Exp'];
				}
				}

				echo "<script>document.location.href='menu.php'</script>";
			} else {
				//echo "<a href='index.php' class='btn btn-primary btn-lg ' role='button'> Regresar </a> ";
				//echo "<a href='javascript: history.go(-1)' class='btn btn-primary btn-lg' role='button'> Regresar </a> ";
				//echo "<script>swal('¡Atención!', 'La contraseña que ingresaste es incorrecta', 'error')</script>";
				session_start();

				$_SESSION['notuser'] = true;
				$_SESSION['notcontra'] = false;
				$_SESSION['r'] = 1;
				echo "<script>document.location.href='index.php'</script>";
			} //Fin comprobacion de password
		} else {
			//echo "<a href='index.php' class='btn btn-primary btn-lg ' role='button'> Regresar </a> ";
			//echo "<a href='javascript: history.go(-1)' class='btn btn-primary btn-lg' role='button'> Regresar </a> ";
			//echo "<script>swal('¡Atención!', 'Verifica tu usuario', 'error')</script>";
			//$_SESSION['notveruser']=false;
			//echo "<script>document.location.href='index.php'</script>";
		}
	}
}
//session_destroy();

?>