<?php
require('../fpdf/fpdf.php'); 


include('conexion.php');


$pdf = new FPDF();


$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 12);


$pdf->Cell(0, 10, 'LISTA DE MEDICAMENTOS', 0, 1, 'C');
$pdf->Ln(10); 


$pdf->Cell(30, 10, 'Codigo', 1);
$pdf->Cell(50, 10, 'Nombre', 1);
$pdf->Cell(40, 10, 'Marca', 1);
$pdf->Cell(30, 10, 'Cantidad', 1);
$pdf->Cell(30, 10, 'Precio', 1);
$pdf->Ln(); 


$query = "SELECT * FROM medicamentos";
$result = mysqli_query($conn, $query);


while ($row = mysqli_fetch_array($result)) {
    $pdf->Cell(30, 10, $row['codigo'], 1);
    $pdf->Cell(50, 10, $row['nombre'], 1);
    $pdf->Cell(40, 10, $row['marca'], 1);
    $pdf->Cell(30, 10, $row['cantidad'], 1);
    $pdf->Cell(30, 10, $row['precio'], 1);
    $pdf->Ln();
}


mysqli_close($conn);

$pdf->Output();
?>