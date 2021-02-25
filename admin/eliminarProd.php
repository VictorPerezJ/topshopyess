<?php
session_start();
ob_start();

include_once('../conexion.php');

$clave_de_nota=$_GET['clave'];
$tipoN=$_GET['tipoN'];

$id=$_GET['id'];
$cantidad=$_GET['cantidad'];
$producto=$_GET['producto'];

$eliminar="DELETE FROM notas WHERE id='$id'";

$actualizado=mysqli_query($conexion, $eliminar);

if($actualizado>0){
    $existentes="SELECT * FROM catalogo WHERE nombre_p='$producto'";
    $resultadoEnvio2 = mysqli_query($conexion, $existentes);
    while ($row = mysqli_fetch_assoc($resultadoEnvio2)) {
        $cantidad_exis = $row['cantidad'];
        $id_p = $row['id'];
    } 

    $cantidadt=$cantidad_exis + $cantidad;

    $sumar="UPDATE catalogo SET cantidad='$cantidadt' WHERE id='$id_p'";

    $agregado=mysqli_query($conexion, $sumar);

    echo "<script>window.location='imprimir_nota.php?clave=$clave_de_nota&tipoN=$tipoN';</script>";
         
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    
}

mysqli_close($conexion);

?>