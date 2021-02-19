<?php
session_start();
ob_start();

include_once('../conexion.php');

$cerrada=$_POST['cerrada'];
$clavec=$_POST['clavec'];

$asignar="UPDATE notas SET statusn='$cerrada' WHERE nota='$clavec'";

$actualizado=mysqli_query($conexion, $asignar);

if($actualizado>0){
    echo'<script language="javascript">alert("Cliente correctamente registrado :)");</script>'; 
     
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    
}

mysqli_close($conexion);

?>