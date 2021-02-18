<?php
$clave_de_nota = 'Ald001';

include("../conexion.php");

$sql1 = "SELECT * FROM notas WHERE nota='$clave_de_nota'";
$result1 = $conexion->query($sql1);

while ($row = $result1->fetch_assoc()) {
    $id_p = $row['id'];
    $producto = $row['producto'];
    $precio = $row['precio'];
    $cleinte = $row['cleinte'];
    $cantidad = $row['cantidad'];
    $nota = $row['nota'];
    $fecha = $row['fecha'];
    $total = $precio * $cantidad;

    $totalG += $total;
    $precioG += $precio;
    $prodG += $cantidad;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anexo A</title>

    <style>
        .th_imp{
            margin-right: 90px;
            margin-left: 50px;
        }
    </style>
</head>

<body>
    <div class="">
        <img src="../img/logo.jpg" alt="" class="imagen_cfe">

        <table>
            <thead>
                <tr>
                    <th class="th_imp">Producto</th>
                    <th class="th_imp">Precio Unitario</th>
                    <th class="th_imp">Cantidad</th>
                    <th class="th_imp">Total por Producto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $sql1 = "SELECT * FROM notas WHERE nota='$clave_de_nota'";
                    $result1 = $conexion->query($sql1);

                    while ($row = $result1->fetch_assoc()) {
                        $id_p = $row['id'];
                        $producto = $row['producto'];
                        $precio = $row['precio'];
                        $cleinte = $row['cleinte'];
                        $cantidad = $row['cantidad'];
                        $nota = $row['nota'];
                        $fecha = $row['fecha'];
                        $total = $precio * $cantidad;

                        $totalG += $total;
                        $precioG += $precio;
                        $prodG += $cantidad;
                    ?>
                        <td><?php echo $producto ?></td>
                        <td>$<?php echo $precio ?></td>
                        <td><?php echo $cantidad ?></td>
                        <td>$<?php echo $total ?></td>
                </tr>
                <br>
            <?php
                    }
            ?>
            <br>
            <tr style="background-color: pink;">
                <td >Resumen</td>
                <td >Total Unitario:$<?php echo $precioG ?></td>
                <td >Products Totales:<?php echo $prodG ?></td>
                <td >Total General:$<?php echo $totalG ?></td>
            </tr>
            </tbody>
        </table>
        </table>
    </div>
</body>

</html>