<?php
include 'conexion.php';
$codigo=$_POST['codigo'];
$edit = "DELETE FROM medicamentos WHERE codigo = '$codigo'";
if($conn -> query($edit) === TRUE){
    echo (json_encode("Se elimino correctamente"));
} else {
    json_encode("ERROR:".mysqli_connect_error());
}


?>

