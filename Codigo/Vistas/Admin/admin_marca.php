<?php

include '../../config/dbconnection.php';
require_once '../../Modelos/usuario.php';

session_start();

$user = new Usuario();

if (isset($_SESSION['userId'])) {
    $id = $_SESSION['userId'];
    $currentUser = $user->obtenerUsuario("idUsuario", $id, $conn);

    if ($currentUser['idRol'] == 1) {

        //Si el usuario es administrador comprobar que la cuenta este verificada
        if ($currentUser['confirmado'] == 0) {
            header("Location: ../Account/confirmar_registro.php");
        }
    } else {
        //Usuario no autorizado para acceder a administración
        header('HTTP/1.0 403 Forbidden');
        die("<h1>403 Acceso denegado</h1><br><p style='font-size: 1.5rem;'>No tienes permiso para acceder a este recurso.</p><hr>");
    }
} else {
    header("Location: ../Account/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../sass/custom.css">
</head>

<body class="bg-dark">
    <!--Cabecera-->
    <header class="row bg-success d-flex justify-content-center">
        <img src="../../../Imagenes/logo2-modified.png" id="logo_header_admin" class="m-3" style="width: 13%;height:13%;">

        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fs-4 navbar-center ">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (!isset($_SESSION['userId'])) { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="../Account/login.php">Login | </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../Account/registro.php">Registro | </a>
                        </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link" href="../Home/principal.php">Home |</a>
                    </li>

                    <?php if (isset($_SESSION['userId'])) { ?>
                        <!--Solo usuarios registrados-->
                        <li class="nav-item">
                            <a class="nav-link" href="../Home/perfil_usuario.php">Mi perfil |</a>
                        </li>

                        <!--Solo usuarios registrados-->
                        <li class="nav-item">
                            <a class="nav-link" href="../Home/tickets_usuario.php">Mis tickets |</a>
                        </li>
                    <?php } ?>

                    <?php if (isset($_SESSION['userId']) && $currentUser['idRol'] == 1) { ?>
                        <!----------------Administración------------------->
                        <li class="nav-item">
                            <a class="nav-link" href="admin_index.php">Administración</a>
                        </li>
                    <?php } ?>

                </ul>
                <!--Solo usuarios registrados-->
                <?php if (isset($_SESSION['userId'])) { ?>
                    <ul class="navbar-nav ms-auto ">

                        <li class="nav-item p-1">
                            <a class="nav-link " href="#"><?= $currentUser['email'] ?> |</a>
                        </li>
                        <li class="nav-item  d-flex align-items-center ">
                            <form action="../../Controladores/AccountController.php" method="POST">
                                <input type="submit" name="logoutSubmit" value="Cerrar sesión" class="bg-light nav-link" style="border: none;">
                            </form>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </nav>
    </header>

    <main class="w-50 mt-5" style="margin: auto;">

        <h1 class="text-success fw-bold text-center m-3">MARCAS</h1>
        <div id="result"></div>

        <h2><a href="#" id="addMarcaLink">+Añadir marca</a></h2>
        <div class="row bg-dark mt-3 " id="addMarcaPanel">


        </div>

        <div class="row" id="marcas">


        </div>
    </main>
    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="../../js/AJAX//admin_marca.js"></script>
</body>