<?php

include ('../conexion.php');

$recibe=$_POST['recibe'];
$ciudadEdo=$_POST['ciudadEdo'];
$calle=$_POST['calle'];
$colonia=$_POST['colonia'];
$cp=$_POST['cp'];
$tel=$_POST['tel'];
$clave=$_POST['clave'];
$refe=$_POST['refe'];

$agregar="INSERT INTO dir_env SET recibe='$recibe', ciudadEdo='$ciudadEdo', calle='$calle', colonia='$colonia', cp='$cp', tel='$tel', clave='$clave', referencias='$refe'";

$actualizado=mysqli_query($conexion, $agregar);

if($actualizado>0){
    echo'<script language="javascript">alert("Cliente correctamente registrado :)");</script>'; 
      echo "<script>window.location='agregar_cliente.php';</script>";
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    echo "<script>window.location='agregar_cliente.php';</script>";
}

mysqli_close($conexion);


?>