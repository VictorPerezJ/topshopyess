<?php
session_start();
ob_start();

include_once('../conexion.php');

$id=$_POST['id'];

$eliminar="DELETE FROM notas WHERE id='$id'";

$actualizado=mysqli_query($conexion, $eliminar);

if($actualizado>0){
    echo'<script language="javascript">alert("Cliente correctamente registrado :)");</script>'; 
     
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    
}

mysqli_close($conexion);

?>