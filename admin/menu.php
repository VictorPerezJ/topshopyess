<!-- Menú -->
<?php session_start();
ob_start(); ?>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php"><img src="../img/logo.jpeg" style="width:70%" alt=""></a>
    <a href="#"><?php echo $_SESSION['user']?></a>
    <a href="index.php">Catalogo</a>
    <a href="agregar_p.php">Agregar Producto</a>
    <a href="list_clientes.php">Clientes</a>
    <a href="agregar_cliente.php">Agregar Cliente</a>
    <a href="generar_nota.php">Generar Nota</a>
    <a href="notas.php">Notas</a>
    <a href="generar_reporte.php">Reportes</a>
    <a href="../funciones/cerrar_sesion.php">Cerrar Sesión</a>
</div>
<span style="font-size:30px;cursor:pointer; color:black" onclick="openNav()">&#9776; Menú</span>
<!-- Menú -->