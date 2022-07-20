<?php
$conecta= new mysqli('localhost', 'root','12345678','sev');
if (mysqli_connect_error())
{
    echo "<script>document.location.href='errorservidor.html'</script>";
}
?>

