<?php

include('../conexion.php');

$id_p = $_GET['id'];

$query = "SELECT * FROM clientes WHERE id='$id_p'";
$resultado = mysqli_query($conexion, $query);
while ($row = mysqli_fetch_assoc($resultado)) {
    $id_p = $row['id'];
    $nombre_c = $row['nombre'];
    $telefono = $row['telefono_c'];
    $ciudad = $row['ciudad'];
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
        <title>Modificar Clientes</title>
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
                    <h3 style="text-align: center;">Modificación del Cliente <?php echo $nombre_c; ?></h3><br>
                    <form action="modificar_c_db.php?id=<?php echo $id_p ?>" method="post">
                        <label>Nombre del Cliente</label><input type="text" class="w3-input" value="<?php echo $nombre_c; ?>" name="nombre" placeholder="Nombre del Cliente">
                        <label>Teléfono</label><input type="text" class="w3-input" minlength="10" maxlength="15" value="<?php echo $telefono; ?>" name="telefono" placeholder="Teléfono">
                        <label>Ciudad</label><input type="text" class="w3-input" value="<?php echo $ciudad; ?>" name="ciudad" placeholder="Ciudad">
                        <br>
                        <input type="submit" class="btn btn-success" value="Actualizar Datos">
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