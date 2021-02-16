<?php
include_once('../conexion.php');
// include_once('../verificar.php');

session_start();
ob_start();

// $nombre_bd=$_GET['nombre'];

include ('../funciones/por_agotarse.php');

$query = "SELECT * FROM catalogo ORDER BY id DESC LIMIT 1";
//$resultado=$conexion->query($query);
$resultado = mysqli_query($conexion, $query);
session_start();
//while($row=$resultado->fetch_assoc()){
while ($row = mysqli_fetch_assoc($resultado)) {
    $id_p = $row['id'];
}
$id_p_n=$id_p + 1;

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
                    <form action="" method="post">
                        <input type="text" class="w3-input" name="" placeholder="Nombre del Producto"><br><br>
                        <input type="text" class="w3-input" name="" placeholder="Cantidad del Producto"><br><br>
                        <input type="text" class="w3-input" name="" placeholder="Precio Normal del Producto"><br><br>
                        <input type="text" class="w3-input" name="" placeholder="Precio Mayoreo del Producto"><br><br>
                        <input type="file" name="images" id="images" accept="image/*" required> <br> <br>
                        <input type="text" name="nombre" value="<?php echo $id_p_n ?>.jpg" hidden>
                        <input type="submit" value="Actualizar Datos">
                    </form>
                    <br><br>
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