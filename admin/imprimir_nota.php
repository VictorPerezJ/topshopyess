<?php
include_once('../conexion.php');
include_once('funciones.php');

session_start();
ob_start();

$tipoN=$_GET['tipoN'];
$clave_de_nota = $_GET['clave'];

$queryp = "SELECT * FROM notas WHERE nota='$clave_de_nota'";
//$resultado=$conexion->query($query);
$resultadop = mysqli_query($conexion, $queryp);
session_start();
//while($row=$resultado->fetch_assoc()){
while ($row = mysqli_fetch_assoc($resultadop)) {
    $id_p = $row['id'];
    $producto = $row['producto'];
    $precio = $row['precio'];
    $cliente = $row['cliente'];
    $cantidad = $row['cantidad'];
    $nota = $row['nota'];
    $fecha = $row['fecha'];
    $statusn = $row['statusn'];
    
    $tipoDeEnvio = $row['tipo_env'];
    $total = $precio * $cantidad;

    $totalG += $total;
    $precioG += $precio;
    $prodG += $cantidad;
}

$total_total = $totalG;

// Envio
$queryde = "SELECT * FROM dir_env WHERE clave='$clave_de_nota'";
//$resultado=$conexion->query($query);
$resultadode = mysqli_query($conexion, $queryde);
session_start();
//while($row=$resultado->fetch_assoc()){
while ($row = mysqli_fetch_assoc($resultadode)) {
    $recibe = $row['recibe'];
    $ciudadEdo = $row['ciudadEdo'];
    $calle = $row['calle'];
    $colonia = $row['colonia'];
    $cp = $row['cp'];
    $tel = $row['tel'];
    $refe=$row['referencias'];
}
if ($statusn == 'Pagada') {
    echo "<script>window.location='imprimir_nota_c.php?clave=$clave_de_nota&#myTable';</script>";
} elseif($statusn == 'Abierta') {
    echo "<script>window.location='imprimir_nota_cc.php?clave=$clave_de_nota&#myTable';</script>";
}

$queryEnvvio="SELECT * FROM tab_env WHERE '$totalG' > rango AND '$totalG' < rango2 AND tipo='$tipoDeEnvio'";
$resultadoEnvio = mysqli_query($conexion, $queryEnvvio);
while ($row = mysqli_fetch_assoc($resultadoEnvio)) {
    $envio = $row['costo'];
}
if(empty($envio)){
    $queryEnvvio2="SELECT * FROM tab_env WHERE '$totalG' > rango2 AND tipo ='$tipoDeEnvio'";
    $resultadoEnvio2 = mysqli_query($conexion, $queryEnvvio2);
    while ($row = mysqli_fetch_assoc($resultadoEnvio2)) {
        $envio = $row['costo'];
    } 
}
$total_total = $totalG + $envio;
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

<body style="background-color: white;">
    <?php include('menu.php'); ?>

    <section>
    <?php //echo $tipoN; ?>
        <div class="container">

            <div id="exportContent">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <p><img src="https://topshopyess.com/img/logom.jpg" style="width: 5%; height:auto; float:right; display:block; position:static" alt=""></p>
                        <h3>Cliente: <?php echo $cliente; ?> </h3>
                        <h3>Fecha de Pedido: <?php echo $fecha; ?> </h3>
                        <h3>Estado de la Nota: <?php echo $statusn; ?></h3>
                        <h3>Monto de Deposito: $<?php echo $total_total; ?></h3>
                        <h3>Nota: <?php echo $nota; ?></h3>
                    </div>
                    <div class="col-md-10" style="background-color: green;">
                        <h3 style="text-align: center; color:white">DATOS DE ENVÍO</h3>
                    </div>
                    <div class="col-md-10">
                        <h3>Nombre: <span style="text-decoration: underline;"><?php echo $recibe ?></span></h3>
                        <h3>Ciudad y Edo: <span style="text-decoration: underline;"><?php echo $ciudadEdo ?></span></h3>
                        <h3>Calle y Número: <span style="text-decoration: underline;"><?php echo $calle ?></span></h3>
                        <h3>Colonia: <span style="text-decoration: underline;"><?php echo $colonia ?></span></h3>
                        <h3>Código Postal: <span style="text-decoration: underline;"><?php echo $cp ?></span></h3>
                        <h3>Teléfono: <span style="text-decoration: underline;"><?php echo $tel ?></span></h3>
                        <h3>Referencias: <span style="text-decoration: underline;"><?php echo $refe ?></span></h3>
                        <h3>Tipo de Envío: <span style="text-decoration: underline;"><?php echo $tipoDeEnvio ?></span></h3>
                    </div>

                    <!-- Consulta -->
                    <div class="col-md-10">
                        <!-- <p><img src="https://topshopyess.com/img/logom.jpg" style="width: 5%; height:auto; display:block; position:static" alt=""></p> -->

                        <!-- <h2 style="color: black;">Numero de Nota: <?php echo $clave_de_nota ?></h2> -->
                        <table id="myTable" class="table table-striped" style="background-color: white;">
                            <thead style="background-color: #eb81a7;">
                                <tr>
                                    <th style="text-align: center; color: #ffffff">Producto</th>
                                    <th style="text-align: center; color: #ffffff">Precio Unitario</th>
                                    <th style="text-align: center; color: #ffffff">Cantidad</th>
                                    <th style="text-align: center; color: #ffffff">Especificaciones</th>
                                    <th style="text-align: center; color: #ffffff">Total por Producto</th>
                                    <th style="text-align: center; color: #ffffff"></th>
                                    <th style="text-align: center; color: #ffffff"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $query = "SELECT * FROM notas WHERE nota='$clave_de_nota'";
                                    $resultado = mysqli_query($conexion, $query);
                                    session_start();
                                    while ($row = mysqli_fetch_assoc($resultado)) {
                                        $id_p = $row['id'];
                                        $producto = $row['producto'];
                                        $precio = $row['precio'];
                                        $cliente = $row['cliente'];
                                        $cantidad = $row['cantidad'];
                                        $nota = $row['nota'];
                                        $fecha = $row['fecha'];
                                        $statusn = $row['statusn'];
                                        $coment = $row['coment'];
                                        $total = $precio * $cantidad;

                                    ?>
                                        <td style="text-align: center; color:black; text-transform:uppercase"><?php echo $producto ?></td>
                                        <td style="text-align: center;">$<?php echo $precio ?></td>
                                        <td style="text-align: center;"><?php echo $cantidad ?></td>
                                        <td style="text-align: center;"><?php echo $coment ?></td>
                                        <td style="text-align: center;">$<?php echo $total ?></td>
                                        <td style="text-align: center;">

                                        <a href="eliminarProd.php?id=<?php echo $id_p?>&cantidad=<?php echo $cantidad ?>&producto=<?php echo $producto?>&clave=<?php echo $clave_de_nota ?>&tipoN=<?php echo $tipoN ?>"><button style="border: none;"><i class="fas fa-times" style="color:red"></i></button></a>
                                        </td>
                                        <td style="text-align: center;">
                                        <a href="masuno.php?id=<?php echo $id_p?>&cantidad=<?php echo $cantidad ?>&producto=<?php echo $producto?>&clave=<?php echo $clave_de_nota ?>&tipoN=<?php echo $tipoN ?>"><button style="border: none;"><i class="fas fa-plus" style="color:blue"></i></button></a>

                                        <a href="menosuno.php?id=<?php echo $id_p?>&cantidad=<?php echo $cantidad ?>&producto=<?php echo $producto?>&clave=<?php echo $clave_de_nota ?>&tipoN=<?php echo $tipoN ?>"><button style="border: none;"><i class="fas fa-minus" style="color:red"></i></button></a>
                                        </td>
                                </tr>
                            <?php
                                    }
                            ?>
                            <tr style="height:60px">
                            <td></td>
                                <td style="text-align: center; color: black">Resumen</td>
                                <td style="text-align: center; color: black">Total Unitario: $<?php echo $precioG ?></td>
                                <td style="text-align: center; color: black">Productos Totales: <?php echo $prodG ?></td>
                                <td style="text-align: center; color: black">Total: $<?php echo $totalG ?></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;">Gastos de Envío</td>
                                <td style="text-align: center;">$<?php echo $envio ?></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center; background-color:green; color:white">Total con Envío</td>
                                <td style="text-align: center; background-color:green; color:white">$<?php echo $total_total = $totalG + $envio ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Dirección de Envio -->
            </div>
            <!-- Fin de Esportacion de word -->

            <div class="row justify-content-center">

            </div><br>
            <div class="row justify-content-center" style="margin-bottom: 100px; padding:20px">
                <div class="col-md-3">
                    <form action="" name="asignar" method="post" style="float: right;">
                        <select name="cliente" id="cliente">
                            <option style="color:black" value="0" autofocus>Asignar Cliente</option>
                            <?php
                            $query2 = "SELECT * FROM clientes ";
                            //$resultado=$conexion->query($query);
                            $resultado2 = mysqli_query($conexion, $query2);
                            session_start();
                            //while($row=$resultado->fetch_assoc()){
                            while ($row = mysqli_fetch_assoc($resultado2)) {
                                $id_p = $row['id'];
                                $nombrec = $row['nombre'];
                                $telefono_c = $row['telefono_c'];
                                $ciudad = $row['ciudad'];
                            ?>
                                <option value="<?php echo $nombrec ?>"><?php echo $nombrec ?></option>
                            <?php } ?>
                        </select><br><br>
                        <input type="text" value="<?php echo $clave_de_nota ?>" id="clave" name="clave" style="display: none;">
                        <button class="btn btn-success" onclick="asignarCliente();">Asignar Cliente</button>
                    </form><br><br>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" style="float: right; color: white;">Tipo de Envío</button><br><br>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" style="float: right; color: white;">Agregar Dirección de Envío</button>
                </div>
                <div class="col-md-3">
                    <form method="POST">
                        <input type="text" id="cerrada" value="Pagada" style="display: none;">
                        <input type="text" value="<?php echo $clave_de_nota ?>" id="clavec" name="clave" style="display: none;">
                        <button onclick="CerrarNota();" class="btn btn-danger" style="float: right; color: white;">Cerrar Nota</button>
                    </form><br><br>
                    <form method="POST">
                        <input type="text" id="guardar" value="Abierta" style="display: none;">
                        
                        <input type="text" value="<?php echo $clave_de_nota ?>" id="claveg" name="clave" style="display: none;">
                        <button onclick="guardarNota();" class="btn btn-secondary" style="float: right; color: white;">Guardar Nota</button>
                    </form><br><br>
                    <form method="POST" action="cancelar2.php">
                        <input type="text" name="cancelar" id="guardar1" value="Cancelada" style="display: none;">
                        <input type="text" value="<?php echo $clave_de_nota ?>" id="claveg" name="clave" style="display: none;">
                        <button onclick="CancelarN(); " class="btn btn-danger" style="float: right; color: white;">Cancelar Nota</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" style="float: right; color: white;" onclick="Export2Doc('exportContent', '<?php echo $clave_de_nota ?>');">Imprimir Nota</button><br><br>
                    <a href="modificar_n.php?clave_n=<?php echo $clave_de_nota ?>&tipoN=<?php echo $tipoN;?>"><button class="btn btn-success" style="float: right; color: white;">Modificar Nota</button></a>
                </div>
            </div>
        </div>
    </section>
</body>


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar Dirección de Envío</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <label>Nombre de Quien Recibe</label>
                    <input type="text" id="val1" name="div_oculto"><br><br>
                    <label>Ciudad y Estado</label>
                    <input type="text" id="val2" name="input_oculto2"><br><br>
                    <label>Calle y Núm.</label>
                    <input type="text" id="val3" name="input_oculto3"><br><br>
                    <label>Colonia</label>
                    <input type="text" id="val4" name="input_oculto4"><br><br>
                    <label>Código Postal</label>
                    <input type="text" id="val5" name="input_oculto5"><br><br>
                    <label>Teléfono</label>
                    <input type="text" id="val6" name="input_oculto6" minlength="10" maxlength="10"><br><br>
                    <label>Referencias</label>
                    <input type="text" id="val8" name="input_oculto8"><br><br>
                    <input type="text" id="val7" value="<?php echo $clave_de_nota ?>" name="input_oculto7" style="display: none;"><br><br>
                    <button onclick="AgregarDir();" class="btn btn-secondary" style="float: right; color: white;">Agregar Dirección</button>
                </div>
            </div>
            <script>
                function AgregarDir() {
                    var recibe = $('#val1').val();
                    var ciudadEdo = $('#val2').val();
                    var calle = $('#val3').val();
                    var colonia = $('#val4').val();
                    var cp = $('#val5').val();
                    var tel = $('#val6').val();
                    var clave = $('#val7').val();
                    var refe = $('#val8').val();

                    $.ajax({
                        type: 'POST',
                        url: 'agregarDir.php',
                        data: 'recibe=' + recibe + '&ciudadEdo=' + ciudadEdo + '&calle=' + calle + '&colonia=' + colonia + '&cp=' + cp + '&tel=' + tel + '&clave=' + clave + '&refe=' + refe,
                        dataType: 'html',
                        async: false,
                        success: function() {
                            alert("Dirección de Envío Asignado");
                            location.reload();
                        }
                    });
                }
            </script>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar Dirección de Envío</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <select name="valueEnvio" id="valueEnvio">
                        <option value="Rapido">Rápido</option>
                        <option value="Economico">Económico</option>
                    </select>
                    <br><br>
                    <input type="text" id="valEn" value="<?php echo $clave_de_nota ?>" name="input_oculto7" style="display: none;"><br><br>
                    <button onclick="TipoEnv();" class="btn btn-secondary" style="float: right; color: white;">Agregar Tipo de Envío</button>
                </div>
            </div>
            <script>
                function TipoEnv() {
                    var valueEnvio = $('#valueEnvio').val();
                    var clave = $('#valEn').val();

                    $.ajax({
                        type: 'POST',
                        url: 'TipoEnvio.php',
                        data: 'valueEnvio=' + valueEnvio + '&clave=' + clave,
                        dataType: 'html',
                        async: false,
                        success: function() {
                            alert("Tipo de Envío Asignado");
                            location.reload();
                        }
                    });
                }
            </script>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>


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
    function asignarCliente() {
        var cliente = $('#cliente').val();
        var clave = $('#clave').val();

        $.ajax({
            type: 'POST',
            url: 'asignar_cliente.php',
            data: 'cliente=' + cliente + '&clave=' + clave,
            dataType: 'html',
            async: false,
            success: function() {
                alert("Cliente Asignado");
            }
        });
    }
</script>

<script>
    function CerrarNota() {
        var cerrada = $('#cerrada').val();
        var clavec = $('#clavec').val();

        $.ajax({
            type: 'POST',
            url: 'CerrarN.php',
            data: 'cerrada=' + cerrada + '&clavec=' + clavec,
            dataType: 'html',
            async: false,
            success: function() {
                alert("Nota Cerrada");
            }
        });
    }
</script>

<script>
    function guardarNota() {
        var guardar = $('#guardar').val();
        var claveg = $('#claveg').val();

        $.ajax({
            type: 'POST',
            url: 'guardarN.php',
            data: 'guardar=' + guardar + '&claveg=' + claveg,
            dataType: 'html',
            async: false,
            success: function() {
                alert("Nota Guardada");
            }
        });
    }
</script>

<!-- Script de dirección oculta -->
<script>
    $(function() {

        // obtener campos ocultar div
        var checkbox = $(".checkshow");
        var hidden = $(".div_a_mostrar");
        //var populate = $("#populate");

        hidden.hide();
        checkbox.change(function() {
            if (checkbox.is(':checked')) {
                //hidden.show();
                $(".div_a_mostrar").fadeIn("200")
            } else {
                //hidden.hide();
                $(".div_a_mostrar").fadeOut("200")
                $("#val1 , #val2, #val3, #val4, #val5, #val6").val(""); // limpia los valores de lols input al ser ocultado
                $('input[type=checkbox]').prop('checked', false); // limpia los valores de checkbox al ser ocultado

            }
        });
    });
</script>
<script>
    function eliminarProd(str) {
        var id = str;

        $.ajax({
            type: 'POST',
            url: 'eliminarProd.php',
            data: 'id=' + id,
            dataType: 'html',
            async: false,
            success: function() {
                alert("Producto Eliminado");
                window.location.reload(true);
            }
        });
    }
</script>
<script>
    // function CancelarN() {
    //     var guardar = $('#guardar1').val();
    //     var claveg = $('#claveg').val();

    //     $.ajax({
    //         type: 'POST',
    //         url: 'CancelarN.php',
    //         data: 'guardar=' + guardar + '&claveg=' + claveg,
    //         dataType: 'html',
    //         async: false,
    //         success: function() {
    //             alert("Nota Cancelada y Eliminada"),
    //             window.location.replace("notas.php");
    //         }
    //     });
    // }
</script>

</html>