<?php
session_start();
ob_start();

include_once('../conexion.php');
include_once('../validacion.php');

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
        <title>Agregar Cliente</title>
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
                    <h3 style="text-align: center;">Agregar Usuarios</h3><br>
                    <form action="agregarUser.php" method="post" class="formulario">
                        <input type="text" class="w3-input" name="nombre_c" placeholder="Nombre del Tabajador" required><br><br>
                        <input type="text" class="w3-input" name="usuario" placeholder="Nombre de Usuario" required><br><br>
                        <input type="text" class="w3-input" name="contra" placeholder="Contraseña" required><br><br>
                        <select name="rol" id="">
                        <option value="admin">Admin</option>
                        <option value="usuario">Usuario</option>
                        </select>
                        <input type="submit" name="nombre" value="Agregar Usuario" class="btn btn-success">
                    </form>
                    <br><br>
                </div>
            </div>
        </div>
    </section>
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
                                <th style="text-align: center;">Usuario</th>
                                <th style="text-align: center;">Contraseña</th>
                                <th style="text-align: center;">Rol</th>
                                <th style="text-align: center;">Eliminar Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- Consulta -->
                                <?php
                                $query = "SELECT * FROM users ORDER BY id ASC";
                                //$resultado=$conexion->query($query);
                                $resultado = mysqli_query($conexion, $query);
                                session_start();
                                //while($row=$resultado->fetch_assoc()){
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    $id_p = $row['id'];
                                    $nombre_c = $row['nombre'];
                                    $usuario = $row['usuario_log'];
                                    $contra = $row['contra'];
                                    $rol = $row['rol'];
                                ?>
                                        <td style="text-align: center;"><?php echo $id_p ?></td>
                                        <td style="text-align: center;"><?php echo $nombre_c ?></td>
                                        <td style="text-align: center;"><?php echo $usuario ?></td>
                                        <td style="text-align: center;"><?php echo $contra ?></td>
                                        <td style="text-align: center;"><?php echo $rol ?></td>
                                        <td style="text-align: center;">
                                        <a href="eliminarUser.php?id=<?php echo $id_p ?>" onclick="javascript:return asegurar();"><button class='btn btn-danger' style=" width:100%">Eliminar</button></a>
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
function asegurar ()
  {
      rc = confirm("¿Seguro que desea Eliminar?");
      return rc;
  }
</script>


</html>