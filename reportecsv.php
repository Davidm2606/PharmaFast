
<?php
    include 'conexion.php';
    
    $sqlSelect = "SELECT * FROM medicamentos";
    $respuesta = $conn->query($sqlSelect);


    $archivo = fopen('reporte_medicamentos.csv', 'w');

    
    if ($respuesta->num_rows > 0) {
      
        fputcsv($archivo, ['Codigo', 'Nombre', 'Marca', 'Cantidad', 'Precio']);

       
        while ($fila = $respuesta->fetch_assoc()) {
            fputcsv($archivo, [$fila['codigo'], $fila['nombre'], $fila['marca'], $fila['cantidad'], $fila['precio']]);
        }
    } else {
        
        fputcsv($archivo, ['No hay medicamentos']);
    }

    
    fclose($archivo);

   
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="reporte_medicamentos.csv"');
    readfile('reporte_medicamentos.csv');

    
    unlink('reporte_medicamentos.csv');
?>
