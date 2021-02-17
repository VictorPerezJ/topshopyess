<?php
session_start();
ob_start();

include_once('../conexion.php');

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
    <title>Lista de Clientes</title>
    <link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <script src="https://kit.fontawesome.com/b7ca65aec2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body style="background-color: #f75c96;  color: white;">
    <?php include('menu.php'); ?>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Tabla -->
                    <h2 style="text-align: center; color:white">Listado de Clientes Existentes</h2><br>
                    <table id="myTable" class="table table-striped" style="background-color: whitesmoke;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Nombre</th>
                                <th style="text-align: center;">Teléfono</th>
                                <th style="text-align: center;">Ciudad</th>
                                <th style="text-align: center;">Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- Consulta -->
                                <?php
                                $query = "SELECT * FROM clientes ORDER BY id ASC";
                                //$resultado=$conexion->query($query);
                                $resultado = mysqli_query($conexion, $query);
                                session_start();
                                //while($row=$resultado->fetch_assoc()){
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    $id_p = $row['id'];
                                    $nombre_c = $row['nombre'];
                                    $telefono = $row['telefono_c'];
                                    $ciudad = $row['ciudad'];
                                ?>
                                        <td style="text-align: center;"><?php echo $id_p ?></td>
                                        <td style="text-align: center;"><?php echo $nombre_c ?></td>
                                        <td style="text-align: center;"><a href="tel:+52<?php echo $telefono ?>"><?php echo $telefono ?></a></td>
                                        <td style="text-align: center;"><?php echo $ciudad ?></td>
                                        <td style="text-align: center;"><a href="modificar_c.php?id=<?php echo $id_p ?>"><button class='btn btn-primary' style="width:100%"> <i class="fas fa-sync"></i> modificar</button></a></td>
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

</html>