<?php
session_start();
 ob_start();
		if ( $_SESSION['auto'] != "si"){
			//$destino='/permisos/';
	      echo "<script>window.location='../index.php?error_login=177';</script>";
			//echo mensajes($_SESSION["user_name"]. 'no estas logeado',"rojo");
		
		}else{
			//echo mensajes($_SESSION["user_name"]. ' si estas logueado',"azul");
		}		
		/*if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
		}else{
			header("location:/permisos/login.php?error_login=177");
		}*/
?>