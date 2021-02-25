<?php
session_start();
ob_start();

include_once('../conexion.php');

$claveg=$_POST['claveg'];
$guardar=$_POST['guardar'];

$asignar="UPDATE notas SET statusn='$guardar' WHERE nota='$claveg'";

$actualizado=mysqli_query($conexion, $asignar);

if($actualizado>0){

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