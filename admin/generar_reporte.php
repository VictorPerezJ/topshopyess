<?php

include('../validacion.php');

include('../conexion.php');

$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];

$nombre_R='Reporte del '.$fecha1. ' al ' .$fecha2;

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistema de inventario perteneciente a Top Shop Yess">
        <meta name="keywords" content="Inventario, yess, maquillaje, top shop yess">
        <meta name="author" content="Ing Victor Perez Jarillo, By Octa 5">
        <title>Generar Reporte</title>
        <link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/menu.css">
        <script src="https://kit.fontawesome.com/b7ca65aec2.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
</head>

<body style="background-color: #f75c96; color: white;">
    <?php include('menu.php'); ?>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3 style="text-align: center;">Seleccione las fechas de inicio y final para generar reporte</h3><br>
                    <form action="generar_reporte.php" method="POST" style="text-align: center;">
                        <input type="date" name="fecha1">
                        <input type="date" name="fecha2">
                        <input type="submit" value="Generar" class="btn btn-success">
                    </form>
                    <br><br>
                </div>

            </div>
            <div id="exportContent">
                <div class="row justify-content-center">
                    <!-- Consulta -->
                    <div class="col-md-12">
                        <p><img src="https://topshopyess.com/img/logom.jpg" style="width: 5%; height:auto; display:block; position:static" alt=""></p>

                        <h2 style="color: black;">Reporte del: <?php echo $fecha1 ?> al fecha: <?php echo $fecha1 ?></h2>
                        <table id="myTable" class="table table-striped" style="background-color: whitesmoke;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Producto</th>
                                    <th style="text-align: center;">Precio Unitario</th>
                                    <th style="text-align: center;">Cantidad</th>
                                    <th style="text-align: center;">Total por Producto</th>
                                    <th style="text-align: center;">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $query = "SELECT * FROM notas WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY fecha ASC";
                                    //$resultado=$conexion->query($query);
                                    $resultado = mysqli_query($conexion, $query);
                                    session_start();
                                    //while($row=$resultado->fetch_assoc()){
                                    while ($row = mysqli_fetch_assoc($resultado)) {
                                        $id_p = $row['id'];
                                        $producto = $row['producto'];
                                        $precio = $row['precio'];
                                        $cliente = $row['cliente'];
                                        $cantidad = $row['cantidad'];
                                        $nota = $row['nota'];
                                        $fecha = $row['fecha'];
                                        $statusn = $row['statusn'];
                                        $total = $precio * $cantidad;

                                        $totalG += $total;
                                        $precioG += $precio;
                                        $prodG += $cantidad;

                                    ?>
                                        <td style="text-align: center;"><?php echo $producto ?></td>
                                        <td style="text-align: center;">$<?php echo $precio ?></td>
                                        <td style="text-align: center;"><?php echo $cantidad ?></td>
                                        <td style="text-align: center;">$<?php echo $total ?></td>
                                        <td style="text-align: center;"><?php echo $fecha ?></td>
                                </tr>
                            <?php
                                    }
                            ?>
                            <tr style="background-color: pink;">
                                <td style="text-align: center;">Resumen</td>
                                <td style="text-align: center;">Total Unitario:$<?php echo $precioG ?></td>
                                <td style="text-align: center;">Productos Totales:<?php echo $prodG ?></td>
                                <td style="text-align: center;">Total General:$<?php echo $totalG ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                    <!-- <a href="imprimir.php"> -->
                    <button class="btn btn-primary" style="float: right; color: white;" onclick="Export2Doc('exportContent', '<?php echo $nombre_R?>');">Imprimir Reporte</button>
                    <!-- </a> -->
                </div><br><br><br>
        </div>
        </div>
    </section>
</body>
<!-- Script del menú -->
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
<!-- Script del menú -->

<!-- Script de impresión  -->
<script>
    function Export2Doc(element, filename = '') {
        var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
        var postHtml = "</body></html>";
        var html = preHtml + document.getElementById(element).innerHTML + postHtml;

        var blob = new Blob(['ufeff', html], {
            type: 'application/msword'
        });

        // Specify link url
        var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

        // Specify file name
        filename = filename ? filename + '.doc' : 'document.doc';

        // Create download link element
        var downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = url;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }

        document.body.removeChild(downloadLink);
    }
</script>

</html>
