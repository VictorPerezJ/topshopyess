<?php
session_start();
ob_start();

include_once('../conexion.php');

$clave_de_nota=$_GET['clave'];
$tipoN=$_GET['tipoN'];

$id=$_GET['id'];
// $cantidad=$_GET['cantidad'];
$producto=$_GET['producto'];

$existentes="SELECT * FROM catalogo WHERE nombre_p='$producto'";
    $resultadoEnvio2 = mysqli_query($conexion, $existentes);
    while ($row = mysqli_fetch_assoc($resultadoEnvio2)) {
        $cantidad_exis = $row['cantidad'];
        $id_p = $row['id'];
    } 

    $cantidadt=$cantidad_exis+1;

    $restar="UPDATE catalogo SET cantidad='$cantidadt' WHERE id='$id_p'";

    $agregado=mysqli_query($conexion, $restar);

if($agregado>0){

    $existentes2="SELECT * FROM notas WHERE producto='$producto' AND nota='$clave_de_nota'";
    $resultadoEnvio = mysqli_query($conexion, $existentes2);
    while ($row = mysqli_fetch_assoc($resultadoEnvio)) {
        $cantidad_exis2 = $row['cantidad'];
        $id_p = $row['id'];
    } 
if($cantidad_exis2 > 0){
    $cantidadt2=$cantidad_exis2-1;

    $sumar2="UPDATE notas SET cantidad='$cantidadt2' WHERE id='$id_p'";

    $agregado2=mysqli_query($conexion, $sumar2);

    if($cantidadt2 == 0){
        $eliminar="DELETE FROM notas WHERE id='$id_p'";
    
    $actualizado=mysqli_query($conexion, $eliminar);
        echo "<script>window.location='imprimir_nota.php?clave=$clave_de_nota&tipoN=$tipoN#myTable';</script>";
    }
    echo "<script>window.location='imprimir_nota.php?clave=$clave_de_nota&tipoN=$tipoN#myTable';</script>";
}
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    
}

mysqli_close($conexion);

?>