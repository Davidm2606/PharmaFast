<?php
include 'conexion.php';
$id = $_POST['id'];
$cedula = $_POST['cedula'];
$detalle = $_POST['detalle'];
$valor = $_POST['valor'];


$edit = "UPDATE recetas SET id = '$id', cedula = '$cedula', detalle = '$detalle', valor = '$valor' WHERE id = '$id'";

if($conn -> query($edit) === TRUE){
    echo (json_encode("Se guardo correctamente"));
} else {
    json_encode("ERROR:".mysqli_connect_error());
}


?>