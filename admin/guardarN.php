<?php
session_start();
ob_start();

include_once('../conexion.php');

$claveg=$_POST['claveg'];
$guardar=$_POST['guardar'];

$asignar="UPDATE notas SET statusn='$guardar' WHERE nota='$claveg'";

$actualizado=mysqli_query($conexion, $asignar);

if($actualizado>0){
    echo'<script language="javascript">alert("Cliente correctamente registrado :)");</script>'; 
     
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    
}

mysqli_close($conexion);

?>