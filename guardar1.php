<?php
    include "conexion.php";
    $id = $_POST['id'];
    $cedula = $_POST['cedula'];
    $detalle = $_POST['detalle'];
    $valor = $_POST['valor'];
   
 
    $sqlInsert = "INSERT INTO recetas(id, cedula, detalle, valor)
                    VALUES ('$id', '$cedula', '$detalle', '$valor')";
    if ($conn->query($sqlInsert)==TRUE ) {
        echo json_encode("Insersion Exitosa");
    } else {
        echo json_encode("ERROR: No se guardo");
    }
   
?>