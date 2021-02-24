<?php
session_start();
ob_start();

include_once('../conexion.php');

$claveg=$_POST['claveg'];
$guardar=$_POST['guardar'];

$asignar="UPDATE notas SET statusn='$guardar' WHERE nota='$claveg'";

$actualizado=mysqli_query($conexion, $asignar);

if($actualizado>0){
    $query2 = "SELECT * FROM notas WHERE nota='$clavec'";
$resultado2 = mysqli_query($conexion, $query2);
session_start();
while ($row = mysqli_fetch_assoc($resultado2)) {
    $cantidad_n = $row['cantidad'];
    $producto = $row['producto'];

$query3 = "SELECT * FROM catalogo WHERE nombre_p='$producto'";
$resultado3 = mysqli_query($conexion, $query3);
session_start();
while ($row = mysqli_fetch_assoc($resultado3)) {
    $cantidad = $row['cantidad'];
    $cantidad_r=$cantidad-$cantidad_n;

$actulizar_can_pro="UPDATE catalogo SET cantidad='$cantidad_r' WHERE nombre_p='$producto'";
$actualizado_c = mysqli_query($conexion, $actulizar_can_pro);
}
}

$query4 = "SELECT * FROM num_nota ORDER BY id ASC";
$resultado4 = mysqli_query($conexion, $query4);
session_start();
while ($row = mysqli_fetch_assoc($resultado4)) {
    $num_n1 = $row['num_n'];
}
$num_n2=$num_n1+1;
$actulizar_num_nota="INSERT INTO num_nota SET num_n='$num_n2'";
$actualizado_num_n = mysqli_query($conexion, $actulizar_num_nota);
     
}else{
    echo'<script language="javascript">alert("Los datos no se cargaron correctamente, favor de llamar a soporte :(");</script>'; 
    
}

mysqli_close($conexion);

?>