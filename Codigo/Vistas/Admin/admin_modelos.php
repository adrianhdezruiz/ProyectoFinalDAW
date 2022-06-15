<?php

include '../../config/dbconnection.php';
include '../../config/db.php';
require_once '../../Modelos/usuario.php';
require_once '../../Modelos/marca.php';

$db = new DB();
$db->checkIfDBExists();

session_start();


$idMarca = $_GET['id'];

$marca = new Marca();
$marcaActual = $marca->obtenerMarca("idMarca", $idMarca, $conn);

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
                        <a class="nav-link" href="../Home/principal.php">Home </a>
                    </li>

                    <?php if (isset($_SESSION['userId'])) { ?>
                        <!--Solo usuarios registrados-->
                        <li class="nav-item">
                            <a class="nav-link" href="../Home/perfil_usuario.php">Mi perfil </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Home/tickets_usuario.php">Mis tickets </a>
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
                            <a class="nav-link " href="../Home/perfil_usuario.php"><?= $currentUser['email'] ?> </a>
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
    <main class="w-75" style="margin:auto">

        <input type="hidden" id="idMarca" value="<?php echo $marcaActual["idMarca"] ?>" />

        <h1 class="text-success fw-bold text-center m-4">
            <?php echo $marcaActual["nombre"] ?>
        </h1>

        <!--MODELOS-->

        <div id="result"></div>


        <div class="row d-flex text-center p-2 mt-5  bg-success">
            <div class="col-4 p-1 fs-5"><a href="#" id="anadirModeloEnlace">+Añadir modelo</a></div>
            <div class="col-4 fs-3 ">MODELOS</div>
            <div class="col-4"></div>
        </div>
        <div id="display"></div>
        <div id="modelos">
            <div class="row d-flex text-center p-2 bg-secondary fs-5" style="border-bottom: 5px double black; ">
                <div class="col-4 p-1"><b>ID MODELO</b></div>
                <div class="col-4"><b>MODELO</b></div>
                <div class="col-4"></div>
            </div>
        </div>


        <!--Panel que se mostrara cuando el administrador pulse en editar modelo-->



        <!--Panel que se mostrara cuando el administrador pulse en ver modelo-->



        <!--PATINES-->
        <!--Order by Modelo-->

        <div class="row d-flex text-center p-2  bg-success mt-5" id="modelos">
            <div class="col-4 p-1 fs-5"><a href="" id="addPatin">+Añadir patin</a></div>
            <div class="col-4 fs-4 ">PATINES</div>
            <div class="col-4">
                <select id="selectPatin" class="p-1 rounded rounded-3" style="width: 80%; position:relative;top:7%" id="searchInput">

                </select>
                <button class="btn btn-dark" id="search">Buscar</button>
            </div>
        </div>
        <div id="displayPatin"></div>
        <div class="row d-flex text-center p-2 bg-secondary fs-5" style="border-bottom: 5px double black; ">
            <div class="col-4 p-1"><b>ID PATIN</b></div>
            <div class="col-4"><b>MODELO</b></div>
            <div class="col-4"></div>
        </div>
        <div id="patines">

        </div>



    </main>
    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../js/AJAX/admin_modelo.js"></script>
</body>