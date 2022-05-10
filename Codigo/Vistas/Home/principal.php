<?php

include '../../config/dbconnection.php';
require_once '../../Modelos/usuario.php';

session_start();

$user = new Usuario();

if (isset($_SESSION['userId'])) {
    $id = $_SESSION['userId'];
    $currentUser = $user->obtenerUsuario("idUsuario", $id, $conn);

    if ($currentUser['confirmado'] == 0) {
        header("Location: ../Account/confirmar_registro.php");
    }
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

<body class="bg-success">
    <!-- Contenedor -->
    <div class="container-fluid bg-success vh-100">

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

                        <?php if (isset($_SESSION['userId'])) { ?>
                            <!--Solo usuarios registrados-->
                            <li class="nav-item">
                                <a class="nav-link" href="perfil_usuario.php">Mi perfil |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="tickets_usuario.php">Mis tickets |</a>
                            </li>
                        <?php } ?>

                        <?php if (isset($_SESSION['userId']) && $currentUser['idRol'] == 1) { ?>
                            <!----------------Administración------------------->
                            <li class="nav-item">
                                <a class="nav-link" href="../Admin/admin_index.php"> Administración</a>
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

        <!--Nav-->
        <nav class="row  mb-3 w-75 mt-3" style="margin: auto;">
            <div class="col-12 col-lg-3 col-md-12 col-sm-12 p-3 mb-1  d-flex justify-content-center">
                <select class="form-select" id="selectMarca" style="width:17rem; border: none;">

                </select>
                <input type="submit" class="form-control ms-1 bg-dark text-success" id="buscarMarca" style="width:6rem; border: none;" value="Buscar">
            </div>

            <div class="col-12 col-lg-6 col-md-12 col-sm-12 p-3 mb-1 d-flex justify-content-center " id="pag">

            </div>

            <div class="col-12 col-lg-3 col-md-12 col-sm-12 p-3 mb-1  d-flex justify-content-center">
                <input type="text" id="buscarModelo" class="form-control me-5" style="width:25rem" placeholder="Busca un modelo...">

            </div>
        </nav>

        <!--Main-->
        <main class="row w-75 " style="margin: auto;">
            <!--Fila 1 MAIN-->

            <div class="row" id="modelos">



            </div>

        </main>
        <!-- Pie de página-->
        <footer class="row bg-dark vh-75">

        </footer>
    </div>
    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="../../js/AJAX/home_principal.js"></script>
</body>

</html>