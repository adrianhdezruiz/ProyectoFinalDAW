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
    <main class="w-75 " style="position:absolute; left:15%">
        <h1 class="text-success fw-bold text-center m-5">TICKETS</h1>

        <div class="row">
            <div class="col-3 me-2 bg-success p-1 mb-1">
                <p class="text-center fs-3" style="line-height: 24px;">BUSCAR TICKET</p>
            </div>
            <div class="col-8 bg-success p-1 mb-1">
                <div class="row">
                    <div class="col-7">
                        <p class=" fs-3" style="line-height: 24px;display:inline; float:right">TICKETS ACTIVOS</p>
                    </div>
                    <div class="col-5 "><img src="../../../Imagenes/159657.png" id="actualizarTicketsActivos" class="m-2 me-3" width="5%" height="50%" style="float:right"></div>
                </div>
            </div>

        </div>

        <div class=" row">
            <div class="col-3 me-2 bg-dark p-1">
                <ul class="list-group  ">

                    <li class="list-group-item p-3 border border-0 bg-secondary">
                        <div class="row ">
                            <div class="col-9"><input type="text" id="valueTicket" class="form-control" placeholder="Introduce la ID del ticket ..." maxlength="14"></div>

                            <div class="col-3"><input type="button" class="form-control" value="Buscar " id="buscarTicket"></div>
                            <span id="error" class="text-danger"></span>
                        </div>
                    </li>
                    <li class="list-group-item   p-3 border border-0"><b>USUARIO:</b> <span id="usuarioTicket"></span></li>
                    <li class="list-group-item bg-secondary  p-3 border border-0"><b>FECHA:</b> <span id="fechaTicket"></li>
                    <li class="list-group-item  p-3 border border-0"><b>HORA INICIO:</b> <span id="horaInicioTicket"></li>
                    <li class="list-group-item bg-secondary  p-3 border border-0"><b>HORA FIN:</b> <span id="horaFinalTicket"></li>
                    <li class="list-group-item  p-3 border border-0"><b>PATIN:</b> <span id="patinTicket"> </li>
                    <li class="list-group-item p-3 border border-0 bg-secondary"><b>PRECIO FINAL:</b> <span id="precioTicket"></li>
                </ul>
            </div>
            <div class="col-8 bg-dark" id="ticketsActivos">
                <div class="row ">
                    <div class="col-2 bg-light p-3 text-center mb-1"><b>ID</b></div>
                    <div class="col-2 bg-light p-3 text-center mb-1"><b>Usuario</b></div>
                    <div class="col-2 bg-light p-3 text-center mb-1"><b>Fecha</b></div>
                    <div class="col-2 bg-light p-3 text-center mb-1"><b>Hora inicio - Hora fin</b></div>
                    <div class="col-2 bg-light p-3 text-center  mb-1"><b>Precio</b> </div>
                    <div class="col-2 bg-light p-3 text-center  mb-1"><b>Patin</b> <span class="me-2" style="float:right">🟢</span></div>
                </div>

            </div>

        </div>

    </main>
    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="../../js/AJAX/admin_ticket.js"></script>
</body>

</html>