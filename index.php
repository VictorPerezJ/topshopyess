<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de inventario perteneciente a Top Shop Yess">
    <meta name="keywords" content="Inventario, yess, maquillaje, top shop yess">
    <meta name="author" content="Ing Victor Perez Jarill, By Octa 5">
    <title>Top Shop Yess</title>
    <link rel="shortcut icon" href="img/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body style="background-image: url('img/fondo.jpg'); background-position: center;">
    <section id="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 log">
                    <form action="verificar.php" method="POST" class="w3-container">
                        <h3 class="log_form">Iniciar Sesión</h3>
                        <input type="text" class="w3-input" name="usuario_log" placeholder="Usuario"><br><br>
                        <input type="password" class="w3-input" name="contra_log" placeholder="Contraseña"><br>
                        <input type="submit" value="Entrar" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- nada mas-->

</html>
