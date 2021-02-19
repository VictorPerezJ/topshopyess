<?php
session_start();
ob_start();

include_once('../conexion.php');

$id=$_POST['id'];
$precio=$_POST['precio'];
$cantidad=$_POST['cantidad'];
$nota=$_POST['nota'];
$producto=$_POST['producto'];
$vendedor=$_POST['vendedor'];

$fecha = date("Y-m-d");

$agregar="INSERT INTO notas SET producto='$producto', precio='$precio', vendedor='$vendedor', nota='$nota', cantidad='$cantidad', fecha='$fecha'";

$actualizado=mysqli_query($conexion, $agregar);

if($actualizado>0){
    echo'<script language="javascript">alert("Cliente correctamente registrado :)");</script>'; 
     
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    
}

mysqli_close($conexion);

?>