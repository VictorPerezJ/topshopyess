<?php

if ($statusn=='Cerrada') {
    // echo'<script language="javascript">alert("No cuentas con permisos suficientes :)");</script>';
    echo "<script>window.location='imprimir_nota_c.php?clave=$clave_de_nota';</script>";
   
   }else{
 //   echo "<script>window.location='registro.php';</script>";
 }

?>