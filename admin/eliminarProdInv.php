<?php
session_start();
ob_start();

include_once('../conexion.php');

$clave_de_nota=$_GET['clave'];
$tipoN=$_GET['tipoN'];

$id=$_GET['id'];

$eliminar="DELETE FROM catalogo WHERE id='$id'";

$actualizado=mysqli_query($conexion, $eliminar);

if($actualizado>0){
   
    echo'<script language="javascript">alert("Producto Eliminado");</script>'; 
    echo "<script>window.location='index.php';</script>";
         
}else{
    echo'<script language="javascript">alert("Producto NO Eliminado");</script>'; 
    echo "<script>window.location='index.php';</script>";
    
}

mysqli_close($conexion);

?>