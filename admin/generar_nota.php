<?php
include_once('../conexion.php');
// include_once('../verificar.php');

session_start();
ob_start();

// $nombre_bd=$_GET['nombre'];

include('../funciones/por_agotarse.php');

$precio_nota = $_GET['precio_nota'];

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
$clave_de_nota = $usuario . '00' . $num_n;

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
                    <a href="imprimir_nota.php?clave=<?php echo $clave_de_nota ?>&tipoN=<?php echo $precio_nota ?>"><button class="btn btn-warning" style="float: right; color: crimson;">Cerrar e Imprimir Nota</button></a>
                </div>
                <div class="col-md-12">
                    <h3 style="color: white; float:right">Clave de Nota: <?php echo $clave_de_nota ?></h3><br>
                    <h3 style="color: white; float:left">Tipo de Nota: <?php echo $precio_nota ?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Consulta -->
                <?php
                switch ($precio_nota) {
                    case "menudeo":
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
                            <div class="col-md-2">
                                <br><br>
                                <p style="color: white; height:70px; font-size:22px"><?php echo $nombre_p ?></p>
                                <div class="card">
                                    <img src="../<?php echo $foto_p ?>" style="width:100%; height:auto" alt="">
                                    <p>En Existencia: <?php echo por_agotarse($cantidad_p) ?></p>
                                    <!-- <p>Mayoreo: $<?php //echo $precio 
                                                        ?></p> -->
                                    <p>Menudeo: $<?php echo $precio ?></p>

                                    <form id="<?php echo $id_p ?>" method="POST"></form>
                                    <input id="precio<?php echo $id_p ?>" type="text" value="<?php echo $precio ?>" name="precio" placeholder="precio" required readonly style="display: none;">

                                    <input id="cantidad<?php echo $id_p ?>" type="text" name="cantidad" placeholder="Cantidad" required>

                                    <textarea cols="30" rows="3" id="coment<?php echo $id_p ?>" type="text" name="coment" placeholder="Especificaciones" ></textarea>

                                    <input id="nota<?php echo $id_p ?>" type="text" name="nota" style="display: none;" value="<?php echo $clave_de_nota ?>">

                                    <input id="producto<?php echo $id_p ?>" type="text" name="producto" style="display: none;" value="<?php echo $nombre_p ?>">

                                    <input id="vendedor<?php echo $id_p ?>" type="text" name="vendedor" style="display: none;" value="<?php echo $_SESSION['user']; ?>">

                                    <input id="tipov<?php echo $id_p ?>" type="text" name="tipov" style="display: none;" value="<?php echo $precio_nota; ?>" >

                                    <button onclick="agregarANota(<?php echo $id_p ?>)" id="btn<?php echo $id_p ?>" class='btn btn-primary' style="width:100%"><i class="fas fa-sync"></i> Agregar</button></a>
                                    </form>
                                </div>
                            </div>
                        <?php
                        }
                        break;
                    case "mayoreo":
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
                            <div class="col-md-2">
                                <br><br>
                                <p style="color: white; height:70px; font-size:22px"><?php echo $nombre_p ?></p>
                                <div class="card">
                                    <img src="../<?php echo $foto_p ?>" style="width:100%; height:180px" alt="">
                                    <p>En Existencia: <?php echo por_agotarse($cantidad_p) ?></p>
                                    <!-- <p>Mayoreo: $<?php //echo $precio 
                                                        ?></p> -->
                                    <p>Mayoreo: $<?php echo $precio_m ?></p>

                                    <form id="<?php echo $id_p ?>" method="POST"></form>
                                    <input id="precio<?php echo $id_p ?>" type="text" value="<?php echo $precio_m ?>" name="precio" placeholder="precio" required readonly style="display: none;">

                                    <input id="cantidad<?php echo $id_p ?>" type="text" name="cantidad" placeholder="Cantidad" required>

                                    <textarea cols="30" rows="3" id="coment<?php echo $id_p ?>" type="text" name="coment" placeholder="Especificaciones" ></textarea>

                                    <input id="nota<?php echo $id_p ?>" type="text" name="nota" style="display: none;" value="<?php echo $clave_de_nota ?>">

                                    <input id="producto<?php echo $id_p ?>" type="text" name="producto" style="display: none;" value="<?php echo $nombre_p ?>">

                                    <input id="vendedor<?php echo $id_p ?>" type="text" name="vendedor" style="display: none;" value="<?php echo $_SESSION['user']; ?>">

                                    <input id="tipov<?php echo $id_p ?>" type="text" name="tipov" style="display: none;" value="<?php echo $precio_nota; ?>" >

                                    <button onclick="agregarANota(<?php echo $id_p ?>)" id="btn<?php echo $id_p ?>" class='btn btn-primary' style="width:100%"><i class="fas fa-sync"></i> Agregar</button></a>
                                    </form>
                                </div>
                            </div>
                <?php
                        }
                        break;
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
        var coment = $('#coment' + str).val();
        var tipov = $('#tipov' + str).val();


        $.ajax({
            type: 'POST',
            url: 'agregar_a_nota.php',
            data: 'id=' + id + '&precio=' + precio + '&cantidad=' + cantidad + '&nota=' + nota + '&producto=' + producto + '&vendedor=' + vendedor + '&coment=' +coment + '&tipov=' +tipov,
            dataType: 'html',
            async: false,
            success: function() {
                alert("Producto Agregado");
                location.reload();
            }
        });
    }
</script>

</html>