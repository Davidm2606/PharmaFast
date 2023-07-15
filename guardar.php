<?php
    include "conexion.php";
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
 
    $sqlInsert = "INSERT INTO medicamentos(codigo, nombre, marca, cantidad, precio)
                    VALUES ('$codigo', '$nombre', '$marca', '$cantidad', '$precio')";
    if ($conn->query($sqlInsert)==TRUE ) {
        echo json_encode("Insersion Exitosa");
    } else {
        echo json_encode("ERROR: No se guardo");
    }
   
?>