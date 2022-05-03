<?php
require('fpdf.php');
require('../../config/dbconnection.php');
require('../../Modelos/usuario.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../../../Imagenes/logo2-modified.png', 10, 8, 33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 14);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(52, 18, 'Listado de usuarios', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);

        $this->Cell(30, 10, "ID", 1, 0, 'C', 0);
        $this->Cell(30, 10, "Nombre", 1, 0, 'C', 0);
        $this->Cell(30, 10, "Apellidos", 1, 0, 'C', 0);
        $this->Cell(30, 10, "Telefono", 1, 0, 'C', 0);
        $this->Cell(40, 10, "Email", 1, 0, 'C', 0);
        $this->Cell(30, 10, "Registro", 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$user = new Usuario();
$listadoUsuarios = $user->obtenerUsuarios($conn);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 8);

for ($i = 0; $i < sizeof($listadoUsuarios); $i++) {
    $pdf->Cell(30, 10, $listadoUsuarios[$i]["idUsuario"], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $listadoUsuarios[$i]["nombre"], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $listadoUsuarios[$i]["apellidos"], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $listadoUsuarios[$i]["telefono"], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $listadoUsuarios[$i]["email"], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $listadoUsuarios[$i]["fechaRegistro"], 1, 1, 'C', 0);
}
$pdf->Output();
