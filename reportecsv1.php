
<?php
    include 'conexion.php';
    
    $sqlSelect = "SELECT * FROM recetas";
    $respuesta = $conn->query($sqlSelect);


    $archivo = fopen('reporte_recetas.csv', 'w');

    
    if ($respuesta->num_rows > 0) {
      
        fputcsv($archivo, ['ID', 'Cedula', 'Detalle', 'Valor']);

       
        while ($fila = $respuesta->fetch_assoc()) {
            fputcsv($archivo, [$fila['id'], $fila['cedula'], $fila['detalle'], $fila['valor']]);
        }
    } else {
        
        fputcsv($archivo, ['No hay recetas']);
    }

    
    fclose($archivo);

   
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="reporte_medicamentos.csv"');
    readfile('reporte_medicamentos.csv');

    
    unlink('reporte_medicamentos.csv');
?>
