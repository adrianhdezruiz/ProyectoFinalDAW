<?php

include '../../config/dbconnection.php';
include '../../config/db.php';
require_once '../../Modelos/usuario.php';
require_once '../../Modelos/modelo.php';

$db = new DB();
$db->checkIfDBExists();

session_start();

$idModelo = $_GET["id"];
$modelo = new Modelo();
$modeloActual = $modelo->obtenerModelo($idModelo, $conn);

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
    <div class="container-fluid bg-success " style="height: 950px;">

        <!--Cabecera-->
        <header class="row bg-dark d-flex justify-content-center">
            <img src="../../../Imagenes/logo1.png" id="logo_header" alt="logo">

            <!-- Nav -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light fs-4 navbar-center ">

                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

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
                            <a class="nav-link" href="principal.php">Home </a>
                        </li>

                        <?php if (isset($_SESSION['userId'])) { ?>
                            <!--Solo usuarios registrados-->
                            <li class="nav-item">
                                <a class="nav-link" href="perfil_usuario.php">Mi perfil </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="tickets_usuario.php">Mis tickets </a>
                            </li>
                        <?php } ?>

                        <?php if (isset($_SESSION['userId']) && $currentUser['idRol'] == 1) { ?>
                            <!----------------Administración------------------->
                            <li class="nav-item">
                                <a class="nav-link" href="../Admin/admin_index.php"> Administracion</a>
                            </li>
                        <?php } ?>

                    </ul>
                    <!--Solo usuarios registrados-->
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

        <!--Main-->
        <main class="row w-75 mt-5 mb-5 border border-5 " style="margin: auto; ">

            <!--Main Izqda -->
            <div class="col-12 col-lg-5 col-md-12 col-sm-12 bg-dark text-success d-flex justify-content-center p-3 ">
                <div class="card" style="width: 45em;">
                    <img class="card-img-top" alt="patin" id="img" src="../../../Imagenes/Modelos/<?= $modeloActual[0]["imagen"] ?>" style="height: 100%;" data-zoom-image="../../Imagenes/567213_00_1.jpg">

                </div>
            </div>

            <!--Main Derecha-->
            <div class="col-12 col-lg-7  col-md-12 col-sm-12 bg-ligth  bg-light text-center">


                <!--Header-->
                <div class="row bg-dark ">
                    <h1 class="text-success"><?= strtoupper($modeloActual[0]["nombre"]); ?></h1>
                </div>

                <div class="row mt-3 fs-4">

                    <div class="col-12  fs-4 mb-3">

                        <h2 class="fw-bolder ">Descripcion</h2>
                        <hr>
                        <p class="blockquote fs-5 mb-4"><?= $modeloActual[0]["descripcion"] ?></p>
                        <hr>
                        <label class="fw-bolder mb-4" for="precioHora">Precio / hora: </label>
                        <input type="text" class="mb-4" name="precioHora" id="precioHora" readonly value="<?= $modeloActual[0]["precioHora"] . "€" ?> " style="border:inset; text-align:center">
                    </div>

                    <div class="row bg-dark mb-4 ms-0">
                        <h1 class="text-success">DATOS ALQUILER</h1>
                    </div>

                    <form action="ticket.php" method="POST" id="form">
                        <input type="hidden" name="idModelo" value="<?= $modeloActual[0]["idModelo"] ?>">
                        <div>
                            <label for="fecha" class="form-label fw-bold">Fecha</label>
                            <input type="date" class="form-control text-center w-100" id="fecha" name="fecha" required>
                        </div>
                        <hr>
                        <div class="col-12 ">
                            <div class="row ">
                                <div class="col-6 b">
                                    <div class="mb-3">
                                        <label for="horaInicio" class="form-label fw-bold">Hora inicio</label>
                                        <input type="time" class="form-control text-center w-100" id="horaInicio" name="horaInicio" required>
                                    </div>
                                </div>

                                <div class="col-6">

                                    <label for="horaFin" class="form-label fw-bold">Hora fin</label>
                                    <input type="time" class="form-control text-center w-100" id="horaFin" name="horaFin" required>
                                </div>
                            </div>
                        </div>

                        <input type="submit" id="submit" value="Ir a pagar" name="submit" class="btn btn-dark text-success m-3 fs-4">
                        <br>
                        <span class="text-danger mb-2" id="error"></span>
                    </form>
                </div>

            </div>
        </main>
    </div>
    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../js/AJAX/home_producto.js"></script>
</body>

</html>