<?php


//Incluímos a la clase PDF_MC_Table

require_once  APPROOT . '\views\fpdf184\PDF_MC_Table_ok.php';


//Instanciamos la clase para generar el documento pdf
$pdf = new PDF_MC_Table();

//Agregamos la primera página al documento pdf
$pdf->AddPage();

//Seteamos el inicio del margen superior en 25 pixeles 
$y_axis_initial = 25;

//Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(180, 6,  SITENAME, 0, 1, 'C');
$pdf->Ln(3);
$pdf->Cell(180, 6, 'Reporte de Libros ', 0, 1, 'C');
$pdf->Ln(8);

//Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(78, 6, 'Nombre', 1, 0, 'C', 1);
$pdf->Cell(30, 6, utf8_decode('Código'), 1, 0, 'C', 1);
$pdf->Cell(40, 6, utf8_decode('Autor'), 1, 0, 'C', 1);
$pdf->Cell(35, 6, 'Editorial', 1, 0, 'C', 1);

$pdf->Ln(10);

//Table with 20 rows and 4 columns
$pdf->SetWidths(array(78, 30, 40, 35, 12));

/* require_once('app/listarPacientes.php'); */

foreach ($data as $libros) {
    #$nombre = $reg->nombre;
    $nombre = $libros->nombreLibro;
    $codigo = $libros->idLibro;
    $autor = $libros->autor;
    $editorial = $libros->nombreEditorial;

    $pdf->SetFont('Arial', '', 10);
    $pdf->Row(array($nombre, $codigo, utf8_decode($autor), $editorial));
};

$pdf->footer();
//Mostramos el documento pdf
$pdf->Output('I');
