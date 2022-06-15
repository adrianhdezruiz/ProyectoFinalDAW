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

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <?php if (!isset($_SESSION['userId'])) { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="../Account/login.php">Login </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../Account/registro.php">Registro </a>
                        </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link" href="principal.php">Home </a>
                    </li>

                    <!--Solo usuarios registrados-->
                    <?php if (isset($_SESSION['userId'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil_usuario.php">Mi perfil </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tickets_usuario.php">Mis tickets </a>
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
                            <a class="nav-link " href="perfil_usuario.php"><?= $currentUser['email'] ?> </a>
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


    <main class="row w-75 fs-4 " style="margin: auto;position:absolute; top:25%; left:12.5%">

        <input type="hidden" id="idUsuario" value="<?= $currentUser['idUsuario'] ?>" />
        <input type="hidden" id="emailUsuario" value="<?= $currentUser['email'] ?>" />


        <div id="ticketsUsuario">

        </div>

    </main>
    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../js/AJAX/home_ticket.js"></script>
</body>

</html>