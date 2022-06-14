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

    if ($currentUser['confirmado'] == 0) {
        header("Location: ../Account/confirmar_registro.php");
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

<body class="container-fluid bg-success">

    <!--Cabecera-->
    <header class="row bg-dark d-flex justify-content-center">
        <img src="../../../Imagenes/logo1.png" id="logo_header">

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
                        <a class="nav-link" href="principal.php">Home |</a>
                    </li>

                    <!--Solo usuarios registrados-->
                    <?php if (isset($_SESSION['userId'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil_usuario.php">Mi perfil |</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tickets_usuario.php">Mis tickets |</a>
                        </li>
                    <?php } ?>

                    <!----------------Administración------------------->
                    <?php if (isset($_SESSION['userId']) && $currentUser['idRol'] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../Admin/admin_index.php"> Administración</a>
                        </li>
                    <?php } ?>
                </ul>

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


    <main class="row w-50 fs-4 " style="margin: auto;position:absolute; top:25%; left:25%">

        <div class="col-12 bg-dark text-success p-1 text-center">MI PERFIL</div>

        <a href="#" class="list-group-item list-group-item-action" aria-current="true">

            <p class="text-center"><b><?= $currentUser['email'] ?></b></p>
            <hr>
            <p><b>-Nombre: </b><i><?= $currentUser['nombre'] ?></i></p>
            <p><b>-Apellidos: </b><i><?= $currentUser['apellidos'] ?></i></p>
            <p><b>-Telefono: </b><i><?= $currentUser['telefono'] ?></i></p>
            <p>-<b>Fecha registro: </b><i><?= $currentUser['fechaRegistro'] ?></i></p>
            <hr>
            <form action="../../Controladores/HomeController.php" method="POST">
                <input type="submit" value="Eliminar mi cuenta" name="deleteAccount" id="deleteAccount" class="p-1 form-control  bg-dark text-success fs-5" style="float: right; width:20%">
            </form>
        </a>
    </main>

    <script src="../../js/jquery-3.6.0.js"></script>
    <script>
        $('#deleteAccount').click(function(e) {
            if (window.confirm("¿Estas seguro de que quieres eliminar tu cuenta? Esta accion no podra ser revertida")) {} else {
                e.preventDefault();
            }
        })
    </script>
</body>

</html>