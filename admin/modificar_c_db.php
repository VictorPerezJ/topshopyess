<?php

include '../conexion.php';

$id_act = $_GET['id'];

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];

$actualizar = "UPDATE clientes SET nombre='$nombre' , telefono_c='$telefono' , ciudad='$ciudad' WHERE id='$id_act'";

$actualizado = mysqli_query($conexion, $actualizar);

if ($actualizado > 0) {
    echo '<script language="javascript">alert("Datos Actualizados Correctamente :)");</script>';
    echo "<script>window.location='list_clientes.php';</script>";
} else {
    echo '<script language="javascript">alert("Los datos no se actualizaron correctamente, favor de llamar a soporte :(");</script>';
    echo "<script>window.location='list_clientes.php';</script>";
}

mysqli_close($conexion);

?>
