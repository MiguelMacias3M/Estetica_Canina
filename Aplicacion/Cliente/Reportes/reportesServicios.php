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
    $this->Cell(5,6,'Id',1,0,'c',0);
    $this->Cell(20,6,'Nombre del propietario',1,0,'c',0);
    $this->Cell(25,6,'Nombre del propietario',1,0,'c',0);
    $this->Cell(45,6,'Edad propietario',1,0,'c',0);
    $this->Cell(50,6,'Télefono',1,0,'c',0);
    $this->Cell(15,6,'Raza de la mascota',1,1,'c',0);
    $this->Cell(15,6,'Género',1,1,'c',0);
    $this->Cell(15,6,'Fecha',1,1,'c',0);
    $this->Cell(15,6,'Alergias',1,1,'c',0);
    $this->Cell(15,6,'Total',1,1,'c',0);
    $this->Cell(15,6,'Pago',1,1,'c',0);
    $this->Cell(15,6,'Cambio',1,1,'c',0);
    $this->Cell(15,6,'Servicio 1',1,1,'c',0);
    $this->Cell(15,6,'Servicio 2',1,1,'c',0);
    $this->Cell(15,6,'Servicio 3',1,1,'c',0);
    $this->Cell(15,6,'Servicio 4',1,1,'c',0);
    $this->Cell(15,6,'Servicio 5',1,1,'c',0);




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
$query = $db->connect()->prepare('select * FROM canineworld.mascotas order by id desc');
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
  $pdf->Cell(5,16,$row['id'],1,0,'c',0);
  $pdf->Cell(20,16,$row['nombrePropietario'],1,0,'c',0);
  $pdf->Cell(25,16,$row['edadPropietario'],1,0,'c',0);
  $pdf->Cell(45,16,$row['telefono'],1,0,'c',0);
  $pdf->Multicell(50,16,$row['nombreMascota'],1,'LRTB',false);
  $pdf->Multicell(50,16,$row['razaMascota'],1,'LRTB',false);
  $pdf->Multicell(50,16,$row['genero'],1,'LRTB',false);
  $pdf->Multicell(50,16,$row['fecha'],1,'LRTB',false);
  $pdf->Multicell(50,16,$row['alergias'],1,'LRTB',false);
  $pdf->Multicell(50,16,$row['total'],1,'LRTB',false);
  $pdf->Multicell(50,16,$row['pago'],1,'LRTB',false);
  $pdf->Cell(15,16,$row['cambio'],1,1,'c',0);
  $pdf->Multicell(50,16,$row['servicio1'],1,'LRTB',false);
  $pdf->Multicell(50,16,$row['servicio2'],1,'LRTB',false);
  $pdf->Multicell(50,16,$row['servicio3'],1,'LRTB',false);
  $pdf->Multicell(50,16,$row['servicio4'],1,'LRTB',false);
  $pdf->Multicell(50,16,$row['servicio5'],1,'LRTB',false);
}
$pdf->Output();

?>