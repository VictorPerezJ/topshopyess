<?php
session_start();
ob_start();

include_once('../conexion.php');

$clave_de_nota=$_GET['clave'];
$tipoN=$_GET['tipoN'];

$id=$_GET['id'];

$eliminar="DELETE FROM clientes WHERE id='$id'";

$actualizado=mysqli_query($conexion, $eliminar);

if($actualizado>0){
   
    echo'<script language="javascript">alert("Cliente Eliminado");</script>'; 
    echo "<script>window.location='list_clientes.php';</script>";
         
}else{
    echo'<script language="javascript">alert("Cliente NO Eliminado");</script>'; 
    echo "<script>window.location='list_clientes.php';</script>";
    
}

mysqli_close($conexion);

?>