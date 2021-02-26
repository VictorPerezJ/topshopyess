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
$coment=$_POST['coment'];
$tipov=$_POST['tipov'];

$fecha = date("Y-m-d");

$agregar="INSERT INTO notas SET producto='$producto', precio='$precio', vendedor='$vendedor', nota='$nota', cantidad='$cantidad', fecha='$fecha', coment='$coment', tipov='$tipov'";

$actualizado=mysqli_query($conexion, $agregar);

if($actualizado>0){

$query3 = "SELECT * FROM catalogo WHERE nombre_p='$producto'";
$resultado3 = mysqli_query($conexion, $query3);
session_start();
while ($row = mysqli_fetch_assoc($resultado3)) {
    $cantidad1 = $row['cantidad'];
    $cantidad_r=$cantidad1-$cantidad;

$actulizar_can_pro="UPDATE catalogo SET cantidad='$cantidad_r' WHERE nombre_p='$producto'";
$actualizado_c = mysqli_query($conexion, $actulizar_can_pro);
}
     
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    
}

mysqli_close($conexion);

?>