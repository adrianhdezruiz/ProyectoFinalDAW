<?php

include '../../config/dbconnection.php';
include '../../config/db.php';
require_once '../../Modelos/usuario.php';

$db = new DB();
$db->checkIfDBExists();

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
                        <li class="nav-item">
                            <a class="nav-link" href="../Home/tickets_usuario.php">Mis tickets |</a>
                        </li>
                    <?php } ?>

                    <!----------------Administración------------------->
                    <?php if (isset($_SESSION['userId']) && $currentUser['idRol'] == 1) { ?>
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

    <main class="row  w-50 text-success fs-3 " style="margin: auto; position:absolute; top:30%;left:25%">
        <h1 class="text-success text-center fw-bold">PANEL DE ADMINISTRACION</h1>
        <div class="col-12 mt-3">
            <button class="w-100 bg-success p-4 m-3 fw-bold d-flex align-items-center text-center rounded-3" onclick="location.href='admin_user.php'" style="height: 10rem;">
                <img src="../../../Imagenes/icono2-modified.png" class="img-fluid me-3 ">
                USUARIOS
            </button>
        </div>

        <div class="col-12 ">
            <button class="w-100 bg-success p-4 m-3 fw-bold d-flex align-items-center rounded-3" onclick="location.href='admin_marca.php'" style="height: 10rem;">
                <img src="../../../Imagenes/icono4-modified.png" class="img-fluid me-3 rounded-3" style="height: 87px; width:83px">
                PATINES
            </button>
        </div>

        <div class="col-12 ">
            <button class="w-100 bg-success p-4 m-3 fw-bold d-flex  align-items-center rounded-3" onclick="location.href='admin_ticket.php'" style="height: 10rem;">
                <img src="../../../Imagenes/icono3-modified.png" class="img-fluid me-3 ">
                TICKETS
            </button>
        </div>
    </main>
</body>

</html>