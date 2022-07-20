<?php
session_start();
if($_SESSION['n']==1){
    
   $_SESSION['cerrar']=1;
   echo "<script>document.location.href='index.php'</script>";
   echo "<script>swal('¡Vuelva pronto!', 'Cierre de sesion exitoso', 'success')</script>";
}else if($_SESSION['n']==0){
    echo "<script>document.location.href='index.php'</script>";
    //echo "<h1>PARA INICIAR SESION, HAGA CLICK EN EL SIGUIENTE BOTON. </h1>";
    //echo "<a href='index.php' class='btn btn-info' role='button'> Iniciar sesion </a> ";
}

?>