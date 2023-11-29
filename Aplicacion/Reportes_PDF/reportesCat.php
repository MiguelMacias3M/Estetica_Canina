<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo ubicación de la imagen, izquierda, arriba y tamaño
    $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha, margen donde inicia el título
    $this->Cell(40);
    // Título
    $this->Cell(90,10,'Primer Reporte con PHP en PDF',0,0,'C');

    // Fecha
    $this->Cell(25);
    $this->SetFont('Arial','',10);
    $this->Cell(25,10,'Fecha: '.date("d/m/Y"),0,1,'C');

    // Salto de línea
    $this->Ln(30);
    $this->SetFont('Arial','B',12);
    $this->Cell(10,6,'Id',1,0,'c',0);
    $this->Cell(15,6,'Clave',1,0,'c',0);
    $this->Cell(50,6,'Titulo',1,0,'c',0);
    $this->Cell(30,6,'Fecha',1,0,'c',0);
    $this->Cell(25,6,'Tipo',1,0,'c',0);
    $this->Cell(28,6,'Categoria',1,1,'c',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

include('database.php');
$catego=$_REQUEST['catego'];
$db = new Database();
$query = $db->connect()->prepare('select * FROM canineworld where nivel = :catego');
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute(['catego' => $catego]);
//echo ('Categoria: '.$catego);
$row = $query->fetch();

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
//por default los margins son de 10
$pdf->SetMargins(20,20,20);
$pdf->AddPage();
$pdf->SetFont('Times','',12);

while ($row = $query->fetch()){
  $pdf->Cell(10,6,$row['id'],1,0,'c',0);
  $pdf->Cell(15,6,$row['clave'],1,0,'c',0);
  $pdf->Cell(50,6,$row['titulo'],1,0,'c',0);
  $pdf->Cell(30,6,$row['fecha'],1,0,'c',0);
  $pdf->Cell(25,6,$row['tipo'],1,0,'c',0);
  $pdf->Cell(28,6,$row['categoria'],1,1,'c',0);
}
$pdf->Output();

?>