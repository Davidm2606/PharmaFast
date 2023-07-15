<?php
    include "conexion.php";
    $sqlSelect = "SELECT * FROM recetas";
    $respuesta = $conn->query($sqlSelect);      
 $resultado=array();
 if($respuesta->num_rows>0){
    while ($fila = $respuesta->fetch_assoc()) {
        array_push($resultado,$fila);
}
 }else{
    $resultado="no hay recetas";
 }
       
   echo json_encode($resultado);
?>