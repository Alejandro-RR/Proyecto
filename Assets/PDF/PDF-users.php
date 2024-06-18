
<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Admin') {
    die('Acceso denegado');
}

include "fpdf.php";
include "../../conexion.php";
$conexion = conectarBD();

// Consulta SQL para obtener la lista de usuarios
$sql = "SELECT nombre, correo, fecha FROM usuarios";
$result = $conexion->query($sql);

if (!$result) {
    die("Error al ejecutar la consulta: " . $conexion->error);
}

class PDF extends FPDF
{
    // Encabezado
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Lista de Usuarios', 0, 1, 'C');
        $this->Ln(10);

        // Encabezados de las columnas
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(60, 10, 'Nombre', 1);
        $this->Cell(60, 10, 'Correo', 1);
        $this->Cell(60, 10, 'Fecha', 1);
        $this->Ln();
    }

    // Contenido
    function Content($result)
    {
        $this->SetFont('Arial', '', 10);
        while ($row = $result->fetch_assoc()) {
            $this->Cell(60, 10, $row['nombre'], 1);
            $this->Cell(60, 10, $row['correo'], 1);
            $this->Cell(60, 10, $row['fecha'], 1);
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($result);

$conexion->close();
$pdf->Output();
?>