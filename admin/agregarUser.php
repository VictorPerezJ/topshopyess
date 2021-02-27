<?php

include ('../conexion.php');

$nombre=$_POST['nombre_c'];
$usuario=$_POST['usuario'];
$contra=$_POST['contra'];
$rol=$_POST['rol'];

$agregar="INSERT INTO clientes SET nombre='$nombre', usuario_log='$usuario', contra='$contra', rol='$rol'";

$actualizado=mysqli_query($conexion, $agregar);

if($actualizado>0){
    echo'<script language="javascript">alert("Usuario correctamente registrado :)");</script>'; 
      echo "<script>window.location='users.php';</script>";
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    echo "<script>window.location='users.php';</script>";
}

mysqli_close($conexion);


?>