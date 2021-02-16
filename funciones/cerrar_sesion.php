<?php
	session_start();
	$_SESSION['user']=NULL;
    session_unset();
    session_destroy();
    echo'<script language="javascript">alert("Su session a sido cerrada correctamente");</script>'; 
    echo "<script>window.location='../index.php';</script>";
?>