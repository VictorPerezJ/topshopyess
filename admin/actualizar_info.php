<?php

include ('../conexion.php');

$id_act=$_GET['id'];

$nombre=$_POST['nombre'];
$cantidad=$_POST['cantidad'];
$precio_n=$_POST['precio_n'];
$precio_m=$_POST['precio_m'];

$query = "SELECT * FROM catalogo WHERE id='$id_act'";
//$resultado=$conexion->query($query);
$resultado = mysqli_query($conexion, $query);
session_start();
//while($row=$resultado->fetch_assoc()){
while ($row = mysqli_fetch_assoc($resultado)) {
    
    $cantidad_p = $row['cantidad'];
}
$cantidadt=$cantidad+$cantidad_p;

$actualizar="UPDATE catalogo SET nombre_p='$nombre' , cantidad='$cantidadt' , precio='$precio_n', precio_m='$precio_m' WHERE id='$id_act'";

$actualizado=mysqli_query($conexion, $actualizar);

if($actualizado>0){
    echo'<script language="javascript">alert("Datos Actualizados Correctamente :)");</script>'; 
      echo "<script>window.location='index.php?id=$id_act';</script>";
}else{
    echo'<script language="javascript">alert("Los datos no se actualizaron correctamente, favor de llamar a soporte :(");</script>'; 
    echo "<script>window.location='index.php?id=$id_act';</script>";
}

mysqli_close($conexion);

?>