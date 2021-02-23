<?php

include ('../conexion.php');

$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

$nombre_reporte='Reporte del_'.$fecha1.'_al_'.$fecha2.'.csv';

if(isset($_POST['Generar'])){
    //Nombre del archivo y charset
    header('Content-Type:text/csv; charset=latin1');
    header('Content-Disposition: attachment; filename:"$nombre_reporte"');

    //SALIDA DEL ARCHIVO
    $salida=fopen('php://output','W');
//ENCABEZADOS

fputcsv($salida, array('id', 'Producto', 'Precio', 'Cliente', 'Vendedor', 'Nota', 'Cantidad', 'Fecha', 'Estatus de la Nota'));
//QUERY PARA JALAR VALORES

$query = "SELECT * FROM notas WHERE fecha BETWEEN '2021-02-17' AND '2021-02-20'";
$resultado = mysqli_query($conexion, $query);
while ($row = mysqli_fetch_assoc($resultado)) 
fputcsv($salida, array(
    $row['id'],
    $row['producto'],
    $row['precio'],
    $row['cliente'],
    $row['vendedor'],
    $row['nota'],
    $row['cantidad'],
    $row['fecha'],
    $row['statusn'],));

}

echo $row['fecha'];
?>