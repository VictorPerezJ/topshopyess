<?php
//Conexion Local
$conexion = mysqli_connect("localhost", "root", "09012016")
    or die("error de conexion");
mysqli_select_db($conexion, "top_shop")
    or die("No existe base de datos");

    //Conexion Real
// $conexion = mysqli_connect("localhost:3306", "anfran_top_shop", "top_shop_yess")
// or die("error de conexion");
// mysqli_select_db($conexion, "anfran_top_shop")
// or die("No existe base de datos");
?>