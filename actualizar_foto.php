<?php
include "admin/conex_f.php";
$id_user=$_GET['id'];
$nombre = $_POST['nombref'];

if (isset($_FILES['images'])) {

    //Funciones optimizar imagenes
    
    //Ruta de la carpeta donde se guardarán las imagenes
        $patch = 'catalogo';
    
    //Parámetros optimización, resolución máxima permitida
        $max_ancho = 300;
        $max_alto = 450;
    
        if ($_FILES['images']['type'] == 'image/png' || $_FILES['images']['type'] == 'image/jpeg' || $_FILES['images']['type'] == 'image/jpg' || $_FILES['images']['type'] == 'image/gif') {
    
            $medidasimagen = getimagesize($_FILES['images']['tmp_name']);
    
    //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
            if ($medidasimagen[0] < 450 && $_FILES['images']['size'] < 100000) {
    
                $nombrearchivo = $nombre;
    
                move_uploaded_file($_FILES['images']['tmp_name'], $patch . '/' . $nombrearchivo);
    
                //Guardar Variables en BD
    
                $destino = $patch . '/' . $nombrearchivo; //Variable que asigna el nombre a la foto
    
    // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
    
                $sql = "UPDATE catalogo SET foto='$destino' WHERE id='$id_user'";
    
                if ($conn->query($sql) === true) {
                    echo '<script language="javascript">alert("Foto actualizada con exito");</script>';
                    echo "<script>window.location='admin/actualizar_p.php?id=$id_user';</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    
                $conn->close();
    
                //Fin de Guardar variables en BD
    
            }
    
    //Si no, se generan nuevas imagenes optimizadas
            else {
    
                $nombrearchivo = $nombre;
    
    //Redimensionar
                $rtOriginal = $_FILES['images']['tmp_name'];
    
                if ($_FILES['images']['type'] == 'image/jpeg') {
                    $original = imagecreatefromjpeg($rtOriginal);
                } else if ($_FILES['images']['type'] == 'image/jpg') {
                    $original = imagecreatefrompng($rtOriginal);
                } else if ($_FILES['images']['type'] == 'image/png') {
                    $original = imagecreatefrompng($rtOriginal);
                } else if ($_FILES['images']['type'] == 'image/gif') {
                    $original = imagecreatefromgif($rtOriginal);
                }
    
                list($ancho, $alto) = getimagesize($rtOriginal);
    
                $x_ratio = $max_ancho / $ancho;
                $y_ratio = $max_alto / $alto;
    
                if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {
                    $ancho_final = $ancho;
                    $alto_final = $alto;
                } elseif (($x_ratio * $alto) < $max_alto) {
                    $alto_final = ceil($x_ratio * $alto);
                    $ancho_final = $max_ancho;
                } else {
                    $ancho_final = ceil($y_ratio * $ancho);
                    $alto_final = $max_alto;
                }
    
                $lienzo = imagecreatetruecolor($ancho_final, $alto_final);
    
                imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);
    
    //imagedestroy($original);
    
                $cal = 8;
    
                if ($_FILES['images']['type'] == 'image/jpeg') {
                    imagejpeg($lienzo, $patch . "/" . $nombrearchivo);
                } else if ($_FILES['images']['type'] == 'image/jpg') {
                    imagepng($lienzo, $patch . "/" . $nombrearchivo);
                } else if ($_FILES['images']['type'] == 'image/png') {
                    imagepng($lienzo, $patch . "/" . $nombrearchivo);
                } else if ($_FILES['images']['type'] == 'image/gif') {
                    imagegif($lienzo, $patch . "/" . $nombrearchivo);
                }
    
                //Guardar Variables en BD
    
                $destino = $patch . '/' . $nombrearchivo; //Variable que asigna el nombre a la foto
    
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
    
                $sql = "UPDATE catalogo SET foto='$destino' WHERE id='$id_user'";
    
                if ($conn->query($sql) === true) {
                    echo '<script language="javascript">alert("Foto actualizada con exito");</script>';
                    echo "<script>window.location='admin/actualizar_p.php?id=$id_user';</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    
                $conn->close();
    
                //Fin de Guardar variables en BD
    
            }
    
        } else {
            echo 'fichero no soportado';
        }
    }

?>