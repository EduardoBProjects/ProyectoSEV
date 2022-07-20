<?php
$nom=$_POST['username'];
$mail=$_POST['mail'];
$alias=$_POST['alias'];
$edad=$_POST['edad'];
$car=$_POST['car'];
$mat=$_POST['matricula'];
$credit=$_POST['credit'];
$ccv=$_POST['ccv'];
$apell=$_POST['apell'];
//Contraseña que se registrara
$pw=$_POST['pswd'];
//Contraseña con la que se comprobara que sea la del mismo usuario.
$pwcomp=$_POST['pswdcomp'];
// Encriptacion de contraseña con la que se comprobara que le pertenece al usuario
$saltcomp=md5($pwcomp);
$pwcomp=crypt($pwcomp,$saltcomp);
// encriptacion de contraseña que se remplazara.
$salt=md5($pw);
$pw=crypt($pw,$salt);
include("Funciones/Coneccion.php");
session_start();

// ************************************ Codigo para la opcion de cambiar alias. ****************************************************************

if($_SESSION['op']=='alias'){
        $sql = "SELECT * FROM usuarios WHERE Alias='$alias'";
        $query = $conecta->query($sql);
        $filas=mysqli_num_rows($query);
    // Si no se encuentran considencias se podra proceder con la operacion
    if($filas==0) {
        $sql="UPDATE usuarios SET alias='$alias' WHERE Alias='$_SESSION[alias]'";

    

if($conecta->query($sql)){
    //echo "Registro correcto";
    //
    $_SESSION['camb']=1;

    // reasignamos los datos de sesion recien actualizados
    $sql = "SELECT * FROM usuarios WHERE Alias='$alias'";
    $query = $conecta->query($sql);
    $filas=mysqli_num_rows($query);

    while( $fila = $query->fetch_array())
	{    
		if(isset($fila[0])) //fila[6] Es el alias del usuario
			{
				$_SESSION['alias']=$fila["Alias"];
				
            }
        }//Fin de la reasignacion.
    
}else{ 
    //echo "Incorrecto";
    //
    $_SESSION['camb']=2;
   
}
// No se puede proceder con la operacion por que ya hay otro alias identico.
}else{
         //echo "<script>swal('¡Atención!', 'Alias de usuario ocupado', 'error')</script>";
         $_SESSION['camb']=3;
     }
    $al = $_SESSION['alias'];
        $er = $_SESSION['camb'];
        $datos[] = [$al, $er ];	
     echo json_encode($datos);

     // *********************************** En otro caso, codigo para la opcion de cambiar datos personales. ***********************************
}else if($_SESSION['op']=='personal'){
    $sql="UPDATE usuarios SET Nombre='$nom', Apellido='$apell', Edad='$edad' WHERE Alias='$_SESSION[alias]'";
    if($conecta->query($sql)){
        //echo "Registro correcto";
        //
        $_SESSION['camb']=1;
    
        // reasignamos los datos de sesion recien actualizados
        $sql = "SELECT * FROM usuarios WHERE Alias='$_SESSION[alias]'";
        $query = $conecta->query($sql);
        $filas=mysqli_num_rows($query);
    
        while( $fila = $query->fetch_array())
        {    
            if(isset($fila[0])) //fila[0] Es el alias del usuario
                {
                    $_SESSION['nombre']=$fila["Nombre"];
                    $_SESSION['apell']=$fila["Apellido"];
                    $_SESSION['edad']=$fila["Edad"];
                }
            }//Fin de la reasignacion.
        
    }else{
        //echo "Incorrecto";
        //
        $_SESSION['camb']=2;
    }
    $datos[] = [$_SESSION['camb'], $_SESSION['nombre'], $_SESSION['apell'], $_SESSION['edad'] ];	
    echo json_encode($datos);
    //echo "<script>document.location.href='cambiapersonal.php'</script>";

    // ********************************** Inicia codigo para la opcion cambiar correo. **********************************
}else if($_SESSION['op']=='correo'){
    $sql="UPDATE usuarios SET Correo='$mail' WHERE Alias='$_SESSION[alias]'";
    if($conecta->query($sql)){
        //echo "Registro correcto";
        //
        $_SESSION['camb']=1;
    
        // reasignamos los datos de sesion recien actualizados
        $sql = "SELECT * FROM usuarios WHERE Alias='$_SESSION[alias]'";
        $query = $conecta->query($sql);
        $filas=mysqli_num_rows($query);
    
        while( $fila = $query->fetch_array())
        {    
            if(isset($fila[0])) //fila[6] Es el alias del usuario
                {
                    $_SESSION['correo']=$fila["Correo"];
                }
            }//Fin de la reasignacion.
        
    }else{
        //echo "Incorrecto";
        //
        $_SESSION['camb']=2;
    }
    $datos[] = [$_SESSION['correo'], $_SESSION['camb']];
    echo json_encode($datos);
    //echo "<script>document.location.href='cambiacorreo.php'</script>";

    // **************************** Inicio de codigo para cambiar contraseña ****************************

}else if($_SESSION['op']=='contra'){
    $sql = "SELECT * FROM usuarios WHERE Alias='$_SESSION[alias]'";
    $query = $conecta->query($sql);
    $filas=mysqli_num_rows($query);

    while( $fila = $query->fetch_array())
    {    
        if(isset($fila[0])) //fila[6] Es el alias del usuario
			{
				if($fila[6] == $pwcomp) //
				{
					
					$sql="UPDATE usuarios SET Contraseña='$pw' WHERE Alias='$_SESSION[alias]'";
                    if($conecta->query($sql)){
                        //echo "Registro correcto";
                        //
                        $_SESSION['camb']=1;
                        
                    }else{
                        //echo "Incorrecto";
                        //
                        $_SESSION['camb']=2;
                    }
					
				}
				else
				{
					$_SESSION['camb']=3;
	  			}//Fin comprobacion de password
			}//Fin de isset
        }//Fin de ciclo while

        $datos[] = [$_SESSION['camb']];
        echo json_encode($datos);

       // echo "<script>document.location.href='cambiacontra.php'</script>";
     //Fin de codigo contraseña  
     
     // ************************** inicia codigo para modificar datos del vehiculo *********************************

}else if($_SESSION['op']=='carro'){
    $sql="UPDATE vehiculo SET Modelo_Vehiculo ='$car', Matricula='$mat' WHERE Alias='$_SESSION[alias]'";
    if($conecta->query($sql)){
        //echo "Registro correcto";
        //
        $_SESSION['camb']=1;
    
        // reasignamos los datos de sesion recien actualizados
        $sql = "SELECT * FROM vehiculo WHERE Alias='$_SESSION[alias]'";
        $query = $conecta->query($sql);
        $filas=mysqli_num_rows($query);
    
        while( $fila = $query->fetch_array())
        {    
            if(isset($fila[0])) //fila[0] Es el alias del usuario
                {
                    $_SESSION['carr'] = $fila["Modelo_Vehiculo"];
					$_SESSION['mat'] = $fila["Matricula"];
                }
            }//Fin de la reasignacion.
        
    }else{
        //echo "Incorrecto";
        //
        $_SESSION['camb']=2;
    }
    
    $datos[] = [$_SESSION['camb']];
    echo json_encode($datos);

    //echo "<script>document.location.href='cambiavehiculo.php'</script>";
} 

?>