<?php

include ('../conexion.php');

$nombre=$_POST['nombre_c'];
$numero_tel=$_POST['numero_tel'];
$ciudad=$_POST['ciudad'];

$actualizar="UPDATE catalogo SET nombre_p='$nombre' , cantidad='$cantidad' , precio='$precio_n', precio_m='$precio_m' WHERE id='$id_act'";

$actualizado=mysqli_query($conexion, $actualizar);

if($actualizado>0){
    echo'<script language="javascript">alert("Cliente actualizado correctamente registrado :)");</script>'; 
      echo "<script>window.location='agregar_cliente.php';</script>";
}else{
    echo'<script language="javascript">alert("Los datos no se actualizaron correctamente, favor de llamar a soporte :(");</script>'; 
    echo "<script>window.location='agregar_cliente.php';</script>";
}

mysqli_close($conexion);


?>