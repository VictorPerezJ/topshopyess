<?php
include_once('../conexion.php');
include_once('../validacion.php');

session_start();
ob_start();

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
    <title>Notas</title>
    <link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <script src="https://kit.fontawesome.com/b7ca65aec2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>

<body style="background-color: #f75c96;">
    <?php include('menu.php'); ?>

    <section>
        <div class="container">

            <div id="exportContent">
                <div class="row justify-content-center">
                    <h2 style="color: white; text-align:center">Clasificación de Notas</h2>
                </div><br><br>
                <div class="row justify-content-center">

                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                    Cotizaciones
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <!-- Consulta -->
                                        <div class="col-md-12">
                                            <p><img src="https://topshopyess.com/img/logom.jpg" style="width: 10%; height:auto; display:block; position:static" alt=""></p>
                                            <h2 style="color: black;">Listado de Notas</h2>
                                            <table id="myTable1" class="table table-striped" style="background-color: whitesmoke;">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Cliente</th>
                                                        <th style="text-align: center;">Clave de Nota</th>
                                                        <th style="text-align: center;">Vendedor</th>
                                                        <th style="text-align: center;">Estatus</th>
                                                        <th style="text-align: center;">Ver</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        $query = "SELECT DISTINCT nota, cliente, vendedor, statusn FROM notas WHERE statusn='Abierta' AND cliente IS NOT NULL ORDER BY nota DESC";
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
                                                            $vendedor = $row['vendedor'];
                                                            $status = $row['statusn'];
                                                            $total = $precio * $cantidad;

                                                            $totalG += $total;
                                                            $precioG += $precio;
                                                            $prodG += $cantidad;

                                                        ?>
                                                            <td style="text-align: center;"><?php echo $cliente ?></td>
                                                            <td style="text-align: center;"><?php echo $nota ?></td>
                                                            <td style="text-align: center;"><?php echo $vendedor ?></td>
                                                            <td style="text-align: center;"><?php echo $status ?></td>
                                                            <td style="text-align: center;"><a href="imprimir_nota.php?clave=<?php echo $nota ?>"><button class="btn btn-success">Ver Nota</button></a></td>
                                                    </tr>
                                                <?php
                                                        }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                    Notas Pagadas
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <!-- Consulta -->
                                        <div class="col-md-12">
                                            <p><img src="https://topshopyess.com/img/logom.jpg" style="width: 10%; height:auto; display:block; position:static" alt=""></p>
                                            <h2 style="color: black;">Listado de Notas</h2>
                                            <table id="myTable2" class="table table-striped" style="background-color: whitesmoke;">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Cliente</th>
                                                        <th style="text-align: center;">Clave de Nota</th>
                                                        <th style="text-align: center;">Vendedor</th>
                                                        <th style="text-align: center;">Estatus</th>
                                                        <th style="text-align: center;">Ver</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        $query = "SELECT DISTINCT nota, cliente, vendedor, statusn FROM notas WHERE statusn='Pagada' AND cliente IS NOT NULL ORDER BY nota DESC";
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
                                                            $vendedor = $row['vendedor'];
                                                            $status = $row['statusn'];
                                                            $total = $precio * $cantidad;

                                                            $totalG += $total;
                                                            $precioG += $precio;
                                                            $prodG += $cantidad;

                                                        ?>
                                                            <td style="text-align: center;"><?php echo $cliente ?></td>
                                                            <td style="text-align: center;"><?php echo $nota ?></td>
                                                            <td style="text-align: center;"><?php echo $vendedor ?></td>
                                                            <td style="text-align: center;"><?php echo $status ?></td>
                                                            <td style="text-align: center;"><a href="imprimir_nota.php?clave=<?php echo $nota ?>"><button class="btn btn-success">Ver Nota</button></a></td>
                                                    </tr>
                                                <?php
                                                        }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                    Notas Enviadas
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <!-- Consulta -->
                                        <div class="col-md-12">
                                            <p><img src="https://topshopyess.com/img/logom.jpg" style="width: 10%; height:auto; display:block; position:static" alt=""></p>
                                            <h2 style="color: black;">Listado de Notas</h2>
                                            <table id="myTable" class="table table-striped" style="background-color: whitesmoke;">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Cliente</th>
                                                        <th style="text-align: center;">Clave de Nota</th>
                                                        <th style="text-align: center;">Vendedor</th>
                                                        <th style="text-align: center;">Estatus</th>
                                                        
                                                        <th style="text-align: center;">Ver</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        $query = "SELECT DISTINCT nota, cliente, vendedor, statusn FROM notas WHERE statusn='Enviada' AND cliente IS NOT NULL ORDER BY fecha DESC";
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
                                                            $fecha1 = $row['fecha'];
                                                            $vendedor = $row['vendedor'];
                                                            $status = $row['statusn'];
                                                            $total = $precio * $cantidad;

                                                            $totalG += $total;
                                                            $precioG += $precio;
                                                            $prodG += $cantidad;

                                                        ?>
                                                            <td style="text-align: center;"><?php echo $cliente ?></td>
                                                            <td style="text-align: center;"><?php echo $nota ?></td>
                                                            <td style="text-align: center;"><?php echo $vendedor ?></td>
                                                            <td style="text-align: center;"><?php echo $status ?></td>
                                                            
                                                            <td style="text-align: center;"><a href="imprimir_nota_c_.php?clave=<?php echo $nota ?>"><button class="btn btn-success">Ver Nota</button></a></td>
                                                    </tr>
                                                <?php
                                                        }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseFor">
                                    Notas Sin Asignar
                                </a>
                            </div>
                            <div id="collapseFor" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <!-- Consulta -->
                                        <div class="col-md-12">
                                            <p><img src="https://topshopyess.com/img/logom.jpg" style="width: 10%; height:auto; display:block; position:static" alt=""></p>
                                            <h2 style="color: black;">Listado de Notas</h2>
                                            <table id="myTable4" class="table table-striped" style="background-color: whitesmoke;">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Cliente</th>
                                                        <th style="text-align: center;">Clave de Nota</th>
                                                        <th style="text-align: center;">Vendedor</th>
                                                        <th style="text-align: center;">Estatus</th>
                                                        <th style="text-align: center;">Ver</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        $query = "SELECT DISTINCT nota, cliente, vendedor, statusn FROM notas WHERE cliente IS NULL ORDER BY nota DESC";
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
                                                            $vendedor = $row['vendedor'];
                                                            $status = $row['statusn'];
                                                            $total = $precio * $cantidad;

                                                            $totalG += $total;
                                                            $precioG += $precio;
                                                            $prodG += $cantidad;

                                                        ?>
                                                            <td style="text-align: center;"><?php echo $cliente ?></td>
                                                            <td style="text-align: center;"><?php echo $nota ?></td>
                                                            <td style="text-align: center;"><?php echo $vendedor ?></td>
                                                            <td style="text-align: center;"><?php echo $status ?></td>
                                                            <td style="text-align: center;"><a href="imprimir_nota.php?clave=<?php echo $nota ?>"><button class="btn btn-success">Ver Nota</button></a></td>
                                                    </tr>
                                                <?php
                                                        }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</html>