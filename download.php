<?php
include 'connection.php';
require('../fpdf.php');
 if(isset($_POST['btn']))
{
$name=$_GET['name'];
$select = "SELECT * FROM `studentinfo' ORDER BY 'name'";
$result = $connection->query($select);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
while($row = $result->fetch_object()){
  $id = $row->id;
  $name = $row->name;
  $mob= $row->mob;  $pdf->Cell(20,10,$id,1);
  $pdf->Cell(40,10,$name,1);
  $pdf->Cell(40,10,$mob,1);
  $pdf->Ln();
}

$pdf->Output();
}

?>


