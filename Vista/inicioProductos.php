<?php
//require "../Modelo/DTOProducto.php";

require "../Controlador/ControlProductos.php";
session_start();
$control = new ControlProductos();
$arrayProductos = $control->cogerProductos();
if (!isset($_SESSION["carrito"])){
    $_SESSION["carrito"] = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>
        Almacenamiento de datos en sesión.
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/inicioProducto.css">
</head>

<body>
<header>
    <h1>Tienda de Informática</h1>
    <nav>
        <ul>
            <li><a href="carritoMenu.php">Carrito</a></li>
            <li><a href="inicioTrastienda.html">Trastienda</a></li>
        </ul>
    </nav>
</header>
<div class="container">
<form action="../Controlador/ControlCarrito.php" method="post">
    <table>
        <?php
        $mitad = count($arrayProductos)/2;
        $total = count($arrayProductos)-$mitad;
        $contador=0;

            print "<tr>";
            for ($i=0; $i < $total; $i++) {
                print '<td style="align-items: center">
                <img src="../Recursos/'.$arrayProductos[$contador]->getNombre().'.jpg" alt="Enviar" width="200" height="200">
                <button type="submit" value="'.$arrayProductos[$contador]->getId().'" name="productoAnadir">Añadir '.$arrayProductos[$contador]->getNombre().'</button>
            </td>';
                $contador++;
            }
            print "</tr>";
            print "<tr>";


            for ($i=1; $i <= $mitad; $i++) {
                print '<td style="align-items: center">
                <img src="../Recursos/'.$arrayProductos[$contador]->getNombre().'.jpg" alt="Enviar" width="200" height="200">
                <button type="submit" value="'.$arrayProductos[$contador]->getId().'" name="productoAnadir">Añadir '.$arrayProductos[$contador]->getNombre().'</button>
            </td>';
                $contador++;
            }
            print "</tr>";


        ?>
    </table>
</form>
</div>
<footer>
    <p>&copy; 2024 Tienda de Informática. Todos los derechos reservados.</p>
</footer>

</body>
</html>
