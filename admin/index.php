<?php
include_once('../conexion.php');
// include_once('../verificar.php');

session_start();
ob_start();

// $nombre_bd=$_GET['nombre'];

include ('../funciones/por_agotarse.php');
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
</head>

<body style="background-color: #f75c96;">
    <?php include ('menu.php');?>

    <section>
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="generar_nota.php"><button class="btn btn-warning" style="float: right; color: crimson;">Generar Nota</button></a>
        </div>
        </div>
            <div class="row justify-content">
                <!-- Consulta -->
                <?php
                
                $query="SELECT * FROM catalogo ORDER BY id DESC";
                //$resultado=$conexion->query($query);
                $resultado= mysqli_query($conexion, $query );session_start();
                //while($row=$resultado->fetch_assoc()){
                while ($row = mysqli_fetch_assoc ($resultado)){
                    $id_p=$row['id'];
                    $nombre_p=$row['nombre_p'];
                    $cantidad_p=$row['cantidad'];
                    $precio=$row['precio'];
                    $precio_m=$row['precio_m'];
                    $foto_p=$row['foto'];
                    ?>
                <div class="col-md-4">
                    <h2 style="color: white;"><?php echo $nombre_p ?></h2>
                    <div class="card">
                        <img src="../<?php echo $foto_p ?>" style="width:100%; height:350px" alt="">
                        <div class="card-body">En Existencia: <?php echo por_agotarse($cantidad_p) ?></div>
                        <div class="card-body">Precio Mayoreo: $<?php echo $precio ?></div>
                        <div class="card-body">Precio Menudeo: $<?php echo $precio_m ?></div>
                        <!-- <a href="carrito.php?id=<?php echo $id_p ?>"><button class='btn btn-primary' style="width:100%">
                                <i class="fas fa-cart-plus"></i> Agregar</button></a> -->
                        <a href="actualizar_p.php?id=<?php echo $id_p ?>"><button class='btn btn-danger' style="width:100%"> <i class="fas fa-sync"></i> Actualizar</button></a>

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

</html>