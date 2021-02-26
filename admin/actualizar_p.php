<?php

include ('../validacion.php');

$id_act=$_GET['id'];

include ('../conexion.php');
$query = "SELECT * FROM catalogo WHERE id='$id_act'";
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
}
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
        <title>Actualizar Producto</title>
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
<?php include ('menu.php');?>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <h3 style="text-align: center;">Actualización del Producto <?php echo $nombre_p;?></h3><br>
                <form action="actualizar_info.php?id=<?php echo $id_act?>" method="post">
                <label>Nombre del Producto</label><input type="text" class="w3-input" value="<?php echo $nombre_p;?>" name="nombre" placeholder="Nombre del Producto">
                <label>Cantidad del Producto</label><input type="text" class="w3-input" value="<?php //echo $cantidad_p;?>" name="cantidad" placeholder="Cantidad del Producto">
                <label>Precio Normal del Producto</label><input type="text" class="w3-input" value="<?php echo $precio;?>" name="precio_n" placeholder="Precio Normal del Producto">
                <label>Precio Mayoreo del Producto</label><input type="text" class="w3-input" value="<?php echo $precio_m;?>" name="precio_m" placeholder="Precio Mayoreo del Producto"><br>
                <input type="submit" class="btn btn-success" value="Actualizar Datos">
                </form>
                <br><br>
                </div>
                <div class="col-md-6">
                <h3 style="text-align: center;">Foto Actual</h3><br>
                <form action="../actualizar_foto.php?id=<?php echo $id_act?>" method="post" class="formulario" enctype="multipart/form-data">
                <img src="../<?php echo $foto_p;?>" style="width: 100%; height:auto; padding:30px" alt="">
                <input type="file" name="images" id="images" accept="image/*" required>	<br> <br>
                <input type="text" name="nombref" value="<?php echo $id_p?>.jpg" hidden>
                <input type="submit" name="nombre" value="Actualizar Foto">
                </form>
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
<?php
include ('../actualizar_foto.php')
?>
</html>