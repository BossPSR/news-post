
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST PDF</title>
</head>
<body>

<h1> PDF </h1>

<?php 

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial' , '' , 12);

$pdf->Cell(100,120,'Hello World' , 1 , 0 , 'C');
$pdf->Cell(90,120,'Hello World 2' , 1 , 1 , 'C');

$pdf->Cell(100,120,'Hello World 3' , 1 , 0 , 'C');
$pdf->Cell(90,120,'Hello World 4' , 1 , 1 , 'C');

$pdf->Output();

?>
    
</body>
</html>

