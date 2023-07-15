<?php
include 'conexion.php';
$id=$_POST['id'];
$edit = "DELETE FROM recetas WHERE id = '$id'";
if($conn -> query($edit) === TRUE){
    echo (json_encode("Se elimino correctamente"));
} else {
    json_encode("ERROR:".mysqli_connect_error());
}


?>