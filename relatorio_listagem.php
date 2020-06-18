<?php
require('GeradorPDF/fpdf.php');

require_once '../conexao.php';

$sql   = "SELECT * FROM produto";
$query = $con->query($sql);
$registros = $query->fetchAll();

$pdf = new FPDF('L', 'cm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 14);

//Cabeçalho
$pdf->cell(8,0.5,'PRODUTO',1,0,'L');
$pdf->cell(4.5,0.5,'QUANTIDADE',1,0,'L');
$pdf->cell(4,0.5,'VALOR',1,0,'L');
$pdf->cell(4,0.5,'SITUACAO',1,1,'L');

//Linhas da tabela
$pdf->SetFont('Arial', '', 12);
foreach ($registros as $prod) {
  $pdf->cell(8,0.5,$prod['descnot'],1,0,'L');
  $pdf->cell(4.5,0.5,$prod['qtdprod'],1,0,'L');
  $pdf->cell(4,0.5,'R$ ' . $prod['valoprod'],1,0,'L');
  $pdf->cell(4,0.5,$prod['situprod'],1,1,'L');
}


$pdf->Output();

?>
