<?php
include 'conexion.php';
session_start();
ob_start();

$user = $_POST['usuario_log'];
$passw = $_POST['contra_log'];

// $con = md5($pass);
$query = "SELECT * FROM users WHERE usuario_log='$user'";
//$resultado=$conexion->query($query);
$resultado = mysqli_query($conexion, $query);session_start();
//while($row=$resultado->fetch_assoc()){
while ($row = mysqli_fetch_assoc($resultado)) {

    $id_db = $row['id'];
    $nombre_bd = $row['nombre'];
    $user_bd = $row['usuario_log'];
    $passw_db = $row['contra'];
    $tipo_db = $row['rol'];
}

if ($user == $user_bd and $passw == $passw_db) {

    echo'<script language="javascript">alert("Bienvenido :) '.$nombre_bd.'");</script>'; 

    $_SESSION['user'] = $nombre_bd;
    $_SESSION['auto'] = "si";
    $_SESSION['tiem'] = time();
    $_SESSION['tipo'] = $tipo_db;
    $_SESSION['idu'] = $id_db;

    switch ($_SESSION['tipo']) {
        case "admin":
            echo "<script>window.location='admin/index.php?nombre=$nombre_bd';</script>";
           
            break;
        case "usuario":
            echo "<script>window.location='user/index.php?nombre=$nombre_bd';</script>";
            echo'<script language="javascript">alert("Bienvenido :) '.$nombre_bd.'");</script>'; 
            break;
    }
} else {

    echo '<script language="javascript">alert("No existe el usuario o contrasena verifique :)");</script>';
    echo "<script>window.location='index.php';</script>";

}


?>