<?php
include("Funciones/Coneccion.php");

$sql = "SELECT * FROM lugar WHERE LE='c1'";
$query = $conecta->query($sql);
$data = mysqli_fetch_assoc($query);
$d = $data["Disponible"];
echo json_encode($d);
?>