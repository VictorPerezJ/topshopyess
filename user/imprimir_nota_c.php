<?php
include_once('../conexion.php');
// include_once('funciones.php');

session_start();
ob_start();

$clave_de_nota = $_GET['clave'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de inventario perteneciente a Top Shop Yess">
    <meta name="keywords" content="Inventario, yess, maquillaje, top shop yess">
    <meta name="author" content="Ing Victor Perez Jarillo, By Octa 5">
    <title>Imprimir Notas</title>
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

<body style="background-color: #f75c96;">
    <?php include('menu.php'); ?>

    <section>
        <div class="container">

            <div id="exportContent">
                <div class="row justify-content-center">
                    <!-- Consulta -->
                    <div class="col-md-12">
                        <p><img src="https://topshopyess.com/img/logom.jpg" style="width: 5%; height:auto; display:block; position:static" alt=""></p>

                        <h2 style="color: black;">Numero de Nota: <?php echo $clave_de_nota ?></h2>
                        <table id="myTable" class="table table-striped" style="background-color: whitesmoke;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Producto</th>
                                    <th style="text-align: center;">Precio Unitario</th>
                                    <th style="text-align: center;">Cantidad</th>
                                    <th style="text-align: center;">Total por Producto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $query = "SELECT * FROM notas WHERE nota='$clave_de_nota'";
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
                                </tr>
                            <?php
                                    }
                            ?>
                            <tr style="background-color: pink;">
                                <td style="text-align: center;">Resumen</td>
                                <td style="text-align: center;">Total Unitario:$<?php echo $precioG ?></td>
                                <td style="text-align: center;">Products Totales:<?php echo $prodG ?></td>
                                <td style="text-align: center;">Total General:$<?php echo $totalG ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h2 style="color: black; float:left">Nota de <?php echo $cliente ?></h2>
                    </div>
                </div>
                <!-- Dirección de Envio -->
                <div class="div_a_mostrar">
                    <div class="row-justify-content-center">
                        <h2 style="text-align: center;">Datos de Envío</h2>
                    </div>

                    <div class="row justify-content-center">
                        <?php
                        $queryd = "SELECT * FROM dir_env WHERE clave='$clave_de_nota'";
                        //$resultado=$conexion->query($query);
                        $resultadod = mysqli_query($conexion, $queryd);
                        session_start();
                        //while($row=$resultado->fetch_assoc()){
                        while ($row = mysqli_fetch_assoc($resultadod)) {
                            $recibe = $row['recibe'];
                            $ciudadEdo = $row['ciudadEdo'];
                            $calle = $row['calle'];
                            $colonia = $row['colonia'];
                            $cp = $row['cp'];
                            $tel = $row['tel'];
                        }
                        ?>
                        <div class="col-md-6">
                            <h3 style="text-align: center;">Recibe: <?php echo $recibe ?></h3>
                            <h3 style="text-align: center;">Ciudad y Estado: <?php echo $ciudadEdo ?></h3>
                            <h3 style="text-align: center;">Calle: <?php echo $calle ?></h3>
                        </div>
                        <div class="col-md-6">
                            <h3 style="text-align: center;">Colonia: <?php echo $colonia ?></h3>
                            <h3 style="text-align: center;">Código Postal: <?php echo $cp ?></h3>
                            <h3 style="text-align: center;">Teléfono: <?php echo $tel ?></h3>
                        </div>
                    </div>
                </div>
                <!-- Dirección de Envio -->
            </div>
            <!-- Fin de Esportacion de word -->
            <div class="col-md-12">
                    <!-- <a href="imprimir.php"> -->
                    <button class="btn btn-primary" style="float: right; color: white;" onclick="Export2Doc('exportContent', '<?php echo $clave_de_nota ?>');">Imprimir Nota</button>
                    <!-- </a> -->
                </div><br><br><br>
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