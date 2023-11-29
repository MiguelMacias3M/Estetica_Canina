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
    $this->Cell(90,10,'Reporte de consultas de los mensajes',0,0,'C');

    // Fecha
    $this->Cell(25);
    $this->SetFont('Arial','',10);
    $this->Cell(25,10,'Fecha: '.date("d/m/Y"),0,1,'C');

    // Salto de línea
    $this->Ln(30);
    $this->SetFont('Arial','B',12);
    $this->Cell(17,6,'Id',1,0,'c',0);
    $this->Cell(25,6,'Usuario',1,0,'c',0);
    $this->Cell(25,6,'Genero',1,0,'c',0);
    $this->Cell(45,6,'Correo',1,0,'c',0);
    $this->Cell(50,6,'Mensaje',1,0,'c',0);
    $this->Cell(15,6,'Edad',1,1,'c',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

include('database.php');
$db = new Database();
$query = $db->connect()->prepare('select * FROM canineworld.mensajes order by numeroregistro desc');
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
//por default los margins son de 10
$pdf->SetMargins(20,20,20);
$pdf->AddPage();
$pdf->SetFont('Times','',12);

while ($row = $query->fetch()){
  $pdf->Cell(17,16,$row['numeroregistro'],1,0,'c',0);
  $pdf->Cell(25,16,$row['usuario'],1,0,'c',0);
  $pdf->Cell(25,16,$row['genero'],1,0,'c',0);
  $pdf->Cell(45,16,$row['correo'],1,0,'c',0);
  $pdf->Multicell(50,16,$row['mensaje'],1,'LRTB',false);
  $pdf->Cell(15,16,$row['edad'],1,1,'c',0);
}
$pdf->Output();

?>