<?php
session_start();
ob_start();

include_once('../conexion.php');

$id=$_GET['id'];

$eliminar="DELETE FROM users WHERE id='$id'";

$actualizado=mysqli_query($conexion, $eliminar);

if($actualizado>0){
   
    echo'<script language="javascript">alert("Usuario Eliminado");</script>'; 
    echo "<script>window.location='users.php';</script>";
         
}else{
    echo'<script language="javascript">alert("Usuario NO Eliminado");</script>'; 
    echo "<script>window.location='users.php';</script>";
    
}

mysqli_close($conexion);

?>