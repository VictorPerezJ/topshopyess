<?php

include ('../conexion.php');

$nombre=$_POST['nombre_c'];
$numero_tel=$_POST['numero_tel'];
$ciudad=$_POST['ciudad'];

$agregar="INSERT INTO clientes SET nombre='$nombre', telefono_c='$numero_tel', ciudad='$ciudad'";

$actualizado=mysqli_query($conexion, $agregar);

if($actualizado>0){
    echo'<script language="javascript">alert("Cliente correctamente registrado :)");</script>'; 
      echo "<script>window.location='list_clientes.php';</script>";
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    echo "<script>window.location='agregar_cliente.php';</script>";
}

mysqli_close($conexion);


?>