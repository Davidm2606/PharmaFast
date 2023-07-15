<?php
    include "conexion.php";
    
  
    $id = $_REQUEST['id'];


    $sqlSelect = "SELECT * FROM recetas WHERE id LIKE '%$id%'";

  
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