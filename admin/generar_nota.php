<?php
include_once('../conexion.php');
// include_once('../verificar.php');

session_start();
ob_start();

// $nombre_bd=$_GET['nombre'];

include('../funciones/por_agotarse.php');

$usuario = $_SESSION['user'];
$usuario = substr($usuario, 0, 3);

$queryn = "SELECT * FROM num_nota ORDER BY id ASC";
//$resultado=$conexion->query($query);
$resultadon = mysqli_query($conexion, $queryn);
session_start();
//while($row=$resultado->fetch_assoc()){
while ($row = mysqli_fetch_assoc($resultadon)) {
    $num_n1 = $row['num_n'];
}
$num_n = $num_n1 + 1;
$clave_de_nota = $usuario .'00'. $num_n;

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
    <title>Generar Nota</title>
    <link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <script src="https://kit.fontawesome.com/b7ca65aec2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body style="background-color: #f75c96;">
    <?php include('menu.php'); ?>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <a href="imprimir_nota.php?clave=<?php echo $clave_de_nota ?>"><button class="btn btn-warning" style="float: right; color: crimson;">Cerrar e Imprimir Nota</button></a>
                </div>
                <div class="col-md-12">
                    <h3 style="color: white; float:right">Clave de Nota: <?php echo $clave_de_nota ?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Consulta -->
                <?php

                $query = "SELECT * FROM catalogo ORDER BY id DESC";
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
                    <div class="col-md-4">
                        <h2 style="color: white;"><?php echo $nombre_p ?></h2>
                        <div class="card">
                            <img src="../<?php echo $foto_p ?>" style="width:100%" alt="">
                            <div class="card-body">En Existencia: <?php echo por_agotarse($cantidad_p) ?></div>
                            <div class="card-body">Precio Mayoreo: $<?php echo $precio ?></div>
                            <div class="card-body">Precio Menudeo: $<?php echo $precio_m ?></div>

                            <form id="<?php echo $id_p ?>" method="POST"></form>
                            <select id="precio<?php echo $id_p ?>" name="precio" required>
                                <option style="color:black" value="" autofocus selected>Seleccione Precio</option>
                                <option value="<?php echo $precio ?>">Precio Mayoreo: <?php echo $precio ?></option>
                                <option value="<?php echo $precio_m ?>">Precio Menudeo:<?php echo $precio_m ?></option>
                            </select>

                            <input id="cantidad<?php echo $id_p ?>" type="text" name="cantidad" placeholder="Cantidad" required>

                            <input id="nota<?php echo $id_p ?>" type="text" name="nota" style="display: none;" value="<?php echo $clave_de_nota ?>">

                            <input id="producto<?php echo $id_p ?>" type="text" name="producto" style="display: none;" value="<?php echo $nombre_p ?>">

                            <input id="vendedor<?php echo $id_p ?>" type="text" name="vendedor" style="display: none;" value="<?php echo $_SESSION['user']; ?>">

                            <button onclick="agregarANota(<?php echo $id_p ?>)" id="btn<?php echo $id_p ?>" class='btn btn-primary' style="width:100%"><i class="fas fa-sync"></i> Agregar</button></a>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>

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
    function agregarANota(str) {
        var id = str;
        var precio = $('#precio' + str).val();
        var cantidad = $('#cantidad' + str).val();
        var nota = $('#nota' + str).val();
        var producto = $('#producto' + str).val();
        var vendedor = $('#vendedor' + str).val();


        $.ajax({
            type: 'POST',
            url: 'agregar_a_nota.php',
            data: 'id=' + id + '&precio=' + precio + '&cantidad=' + cantidad + '&nota=' + nota + '&producto=' + producto + '&vendedor=' + vendedor,
            dataType: 'html',
            async: false,
            success: function() {
                alert("Producto Agregado");
            }
        });
    }
</script>

</html>