<?php
include 'conexion.php';
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

$edit = "UPDATE medicamentos SET codigo = '$codigo', nombre = '$nombre', marca = '$marca', cantidad = '$cantidad', precio = '$precio' WHERE codigo = '$codigo'";

if($conn -> query($edit) === TRUE){
    echo (json_encode("Se guardo correctamente"));
} else {
    json_encode("ERROR:".mysqli_connect_error());
}


?>