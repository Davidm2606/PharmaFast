<?php
    include "conexion.php";
    
  
    $nombre = $_REQUEST['nombre'];


    $sqlSelect = "SELECT * FROM medicamentos WHERE nombre LIKE '%$nombre%'";

  
    $respuesta = $conn->query($sqlSelect); 

   
    $resultado = array();

   
    if ($respuesta->num_rows > 0) {
        
        while ($fila = $respuesta->fetch_assoc()) {
            array_push($resultado, $fila);
        }
    } else {
        $resultado = "No hay medicamentos";
    }
    echo json_encode($resultado);
?>