<?php
session_start();
ob_start();

include_once('../conexion.php');

$claveg=$_POST['clave'];
$valueEnvio=$_POST['valueEnvio'];

$asignar="UPDATE notas SET tipo_env='$valueEnvio' WHERE nota='$claveg'";

$actualizado=mysqli_query($conexion, $asignar);

if($actualizado>0){
    
     
}else{
    
    
}

mysqli_close($conexion);

?>