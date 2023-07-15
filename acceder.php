<?php
    include "conexion.php";
    $sqlSelect = "SELECT * FROM medicamentos";
    $respuesta = $conn->query($sqlSelect);      
 $resultado=array();
 if($respuesta->num_rows>0){
    while ($fila = $respuesta->fetch_assoc()) {
        array_push($resultado,$fila);
}
 }else{
    $resultado="no hay medicamentos";
 }
       
   echo json_encode($resultado);
?>