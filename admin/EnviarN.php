<?php
session_start();
ob_start();

include_once('../conexion.php');

$claveg=$_POST['clavee'];
$guardar=$_POST['enviar'];

$asignar="UPDATE notas SET statusn='$guardar' WHERE nota='$claveg'";

$actualizado=mysqli_query($conexion, $asignar);

if($actualizado>0){
    echo'<script language="javascript">alert("Nota marcada como Enviada");</script>'; 
    echo "<script>window.location='imprimir_nota_c_.php?clave=$claveg';</script>";
     
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    
}

mysqli_close($conexion);

?>