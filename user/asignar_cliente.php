<?php
session_start();
ob_start();

include_once('../conexion.php');

$cliente=$_POST['cliente'];
$clave=$_POST['clave'];

$asignar="UPDATE notas SET cliente='$cliente' WHERE nota='$clave'";

$actualizado=mysqli_query($conexion, $asignar);

if($actualizado>0){
    echo'<script language="javascript">alert("Cliente correctamente registrado :)");</script>'; 
     
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    
}

mysqli_close($conexion);

?>