<!-- Menú -->
<?php session_start();
ob_start(); ?>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php"><img src="../img/logo.jpeg" style="width:70%" alt=""></a>
    <a href="#"><?php echo $_SESSION['user']?></a>
    <a href="index.php">Catalogo</a>
    <a href="agregar_p.php">Agregar Producto</a>
    <a href="#">Notas</a>
    <a href="#">Clientes</a>
    <a href="#">Reportes</a>
    <a href="../funciones/cerrar_sesion.php">Cerrar Sesión</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menú</span>
<!-- Menú -->