<?php
include_once('../conexion.php');
// include_once('../verificar.php');

session_start();
ob_start();

// $nombre_bd=$_GET['nombre'];

include('../funciones/por_agotarse.php');
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
    <title>Top Shop Yess</title>
    <link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <script src="https://kit.fontawesome.com/b7ca65aec2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"/>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<style>
label{
    color: white;
}
.dataTables_info{
    color: white !important;
}

</style>
</head>

<body style="background-color: #f75c96;">
    <?php include('menu.php'); ?>

    <section>
        <div class="container">
            
            <div class="row justify-content-center">
                <!-- Consulta -->
                <div class="col-md-12">
                    <table id="myTable" class="table table-striped display" style="background-color: white;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Foto</th>
                                <th style="text-align: center;">Producto</th>
                                <th style="text-align: center;">Costo Mayoreo</th>
                                <th style="text-align: center;">Costo Menudeo</th>
                                <th style="text-align: center;">En Existencia</th>
                                <th style="text-align: center;">Actualizar</th>
                                <th style="text-align: center;">Eliminar Producto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php

                                $query = "SELECT * FROM catalogo WHERE cantidad > '0' ORDER BY cantidad ASC";
                                //$resultado=$conexion->query($query);
                                $resultado = mysqli_query($conexion, $query);
                                session_start();
                                //while($row=$resultado->fetch_assoc()){
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    $id_p = $row['id'];
                                    $nombre_p = $row['nombre_p'];
                                    $cantidad_p = $row['cantidad'];
                                    $precio = $row['precio'];
                                    $precio_m = $row['precio_m'];
                                    $foto_p = $row['foto'];
                                ?>
                                    <td style="text-align: center;">
                                        <img src="../<?php echo $foto_p ?>" style="width:100px%; height:100px" alt="">
                                    </td>
                                    <td style="text-align: center;">
                                        <p style="color: black; height:70px; font-size:22px"><?php echo $nombre_p ?></p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>$<?php echo $precio_m ?></p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>$<?php echo $precio ?></p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p><?php echo por_agotarse($cantidad_p) ?></p>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="actualizar_p.php?id=<?php echo $id_p ?>"><button class='btn btn-primary' style="width:25%"> <i class="fas fa-sync"></i></button></a>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="eliminarProdInv.php?id=<?php echo $id_p ?>" onclick="javascript:return asegurar();"><button class='btn btn-danger' style=" width:40%">Eliminar</button></a>
                                    </td>
                            </tr>
                        <?php
                                }
                        ?>
                        </tbody>
                    </table>
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
$(document).ready(function() {
    $('#myTable').DataTable();
} );
</script>

<script>
function asegurar ()
  {
      rc = confirm("¿Seguro que desea Eliminar?");
      return rc;
  }
</script>
</html>