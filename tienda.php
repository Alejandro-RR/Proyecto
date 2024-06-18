<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Flores</title>
    <link rel="stylesheet" href="Assets/Style.css">
    <link rel="icon" href="Assets/imagenes/Iconos/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <?php
    // Incluir bibliotecas de funciones
    include("conexion.php");

    function dibuja_select($nomSel)
    {
        $options = [
            "Todas" => "Todas",
            "Precio" => "Precio",
            "Stock" => "Stock"
        ];
        $html = "<select name='$nomSel' class='FiltroSelect'>\n";
        foreach ($options as $value => $display) {
            $selected = "";
            if (isset($_POST['filtrar']) && isset($_POST[$nomSel]) && $_POST[$nomSel] == $value) {
                $selected = "selected";
            } else if (isset($_GET[$nomSel]) && $_GET[$nomSel] == $value) {
                $selected = "selected";
            }

            $html .= "<option value='$value' $selected>$display</option>\n";
        }
        $html .= "</select>\n";

        return $html;
    }
    ?>

</head>

<body>
    <?php
    include "header.php";
    ?>
    <section id="tienda">
        <article id="tienda">
            <h1 class="Textocentrado">Nuestros productos</h1>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <?= dibuja_select("selFiltro") ?>
                <input type="submit" name="filtrar" value="Filtrar" class="botonflitro">
            </form>

            <?php
            $conexion = conectarBD();

            $filtro = "Todas";
            if (isset($_POST['filtrar'])) { // Si se llega por el formulario "Botón Filtrar"
                $filtro = $_POST['selFiltro'];
            } else { // Si se llega por la URL (GET)
                if (isset($_GET['filtro'])) {
                    $filtro = $_GET['filtro'];
                }
            }

            $orden = "";
            if ($filtro == "Precio") {
                $orden = "ORDER BY Precio";
            } elseif ($filtro == "Stock") {
                $orden = "ORDER BY Stock DESC";
            }

            // Calcular el rango de elementos a mostrar en la página actual.
            $elementosPorPagina = 5;
            $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $inicio = ($paginaActual - 1) * $elementosPorPagina;

            $instruccion = "SELECT * FROM flores $orden LIMIT $inicio, $elementosPorPagina";
            $consulta = $conexion->query($instruccion);

            if ($conexion->connect_errno) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Errno: " . $conexion->errno . "<br/>";
                echo "Error: " . $conexion->error . "<br/>";
                exit();
            }

            $nfilas = $consulta->num_rows;

            if ($nfilas > 0) {
                echo "<table id=tablaProduct>\n";
                echo "<tr>\n<th>Imagen</th>\n<th>Nombre</th>\n<th>Precio</th>\n<th>Descripción</th>\n<th>Stock</th>\n</tr>\n";

                while ($resultado = $consulta->fetch_array()) {
                    echo "<tr>\n";
                    echo "<td><img src='Assets/imagenes/FloresTienda/{$resultado['Img']}' class='flores'></td>\n";
                    echo "<td>{$resultado['Nombre']}</td>\n";
                    echo "<td>{$resultado['Precio']}€</td>\n";
                    echo "<td id='descrip'> {$resultado['Descripcion']}</td>\n";
                    echo "<td>{$resultado['Stock']}</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";

                // Generar enlaces de paginación.
                $totalElementos = $conexion->query("SELECT COUNT(*) as total FROM flores")->fetch_assoc()['total'];
                echo "<div id='paginacion'>";
                for ($i = 1; $i <= ceil($totalElementos / $elementosPorPagina); $i++) {
                    echo "<a  href='?pagina=$i&filtro=$filtro'>$i</a> ";
                }
                echo "</div>";
            } else {
                echo "No hay flores disponibles.";
            }
            ?>
        </article>
    </section>
    <div id="relleno"></div>

    <?php



    $consulta->free();
    desconectarBD($conexion);

    include "footer.php";
    ?>
    <script src="https://kit.fontawesome.com/fef61d9f2b.js" crossorigin="anonymous"></script>
    <script src="Assets/js/Script.js"></script>

</body>

</html>