<?php
require('../fpdf/fpdf.php'); 


include('conexion.php');


$pdf = new FPDF();


$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 12);


$pdf->Cell(0, 10, 'LISTA DE RECETAS', 0, 1, 'C');
$pdf->Ln(10); 


$pdf->Cell(30, 10, 'ID', 1);
$pdf->Cell(50, 10, 'Cedula cliente', 1);
$pdf->Cell(40, 10, 'Detalle', 1);
$pdf->Cell(30, 10, 'Valor', 1);
$pdf->Ln(); 


$query = "SELECT * FROM recetas";
$result = mysqli_query($conn, $query);


while ($row = mysqli_fetch_array($result)) {
    $pdf->Cell(30, 10, $row['id'], 1);
    $pdf->Cell(50, 10, $row['cedula'], 1);
    $pdf->Cell(40, 10, $row['detalle'], 1);
    $pdf->Cell(30, 10, $row['valor'], 1);
    $pdf->Ln();
}


mysqli_close($conn);

$pdf->Output();
?>