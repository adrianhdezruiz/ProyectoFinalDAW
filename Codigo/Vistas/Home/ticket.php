<?php

include '../../config/dbconnection.php';
require_once '../../Modelos/usuario.php';
require_once '../../Modelos/modelo.php';
require_once '../../ViewModels/patinModelo.php';
require_once '../../ViewModels/procesarTicket.php';

session_start();

$user = new Usuario();

if (isset($_SESSION['userId'])) {
    $id = $_SESSION['userId'];
    $currentUser = $user->obtenerUsuario("idUsuario", $id, $conn);

    if ($currentUser['confirmado'] == 0) {
        header("Location: ../Account/confirmar_registro.php");
    } else {
        $idModelo = $_POST['idModelo'];
        $horaInicio = $_POST['horaInicio'];
        $horaFin = $_POST['horaFin'];

        $modelo = new Modelo();
        $modeloActual = $modelo->obtenerModelo($idModelo, $conn);

        $vm = new PatinModelo();
        $nombreMarca = $vm->obtenerNombreMarca($modeloActual[0]["idMarca"], $conn);

        $vmProcesarTicket = new ProcesarTicket();
        $id = $vmProcesarTicket->generarIdTicket();

        $precioTotal = $vmProcesarTicket->calcularPrecioTicket($horaInicio, $horaFin, $modeloActual[0]["precioHora"]);
        $precioTotalFormato = round($precioTotal, 2);

        $idPatin = $vmProcesarTicket->asignarIdPatin($modeloActual[0]["idModelo"], $conn);
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
    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AQq1AuTfG0-A_Jfqv7oQW54GyqCb4v42M2pbo9u7Ssm-cPTfJ1DzSK7dCxqUd6y9hVNmReiMq5NoLEcF&currency=EUR"></script>
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

    <main class="row w-50 fs-4 " style="margin: auto;position:absolute; top:30%; left:25%">

        <div class="col-12 bg-dark text-success p-1 text-center">TICKET</div>
        <a href="#" class="list-group-item list-group-item-action  " aria-current="true">
            <div class="d-flex w-100 justify-content-between">

                <h5 class="mb-1 fw-bolder" id="idTicket"><?= $id ?></h5>
                <small><i><span id="fechaRegistro"><?= $_POST['fecha'] ?></span> | <span id="horaInicio"><?= $_POST['horaInicio'] ?></span> - <span id="horaFin"><?= $_POST['horaFin'] ?></span> </i></small>
            </div>
            <p class="mb-1"><?= $currentUser["email"] ?></p>
            <small><?= $nombreMarca ?> <?= $modeloActual[0]["nombre"] ?></small>
            <hr>
            <small class="blockquote-footer">TOTAL: <?= $precioTotalFormato ?> €</small>
            <input type="hidden" id="idServicio" value="<?= $id ?>" />
            <input type="hidden" id="precioPaypal" value="<?= $precioTotalFormato ?>" />
            <input type="hidden" id="idUsuario" value="<?= $currentUser["idUsuario"] ?>" />
            <input type="hidden" id="idUsuario" value="<?= $currentUser["email"] ?>" />
            <input type="hidden" id="idPatin" value="<?= $idPatin ?>" />

            <hr>
            <div id="botonPaypalContainer" class="d-flex justify-content-center ">
                <script>
                    paypal.Buttons({
                        style: {
                            color: 'gold',
                            shape: 'pill',
                        },
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: $('#precioPaypal').val(),
                                    }
                                }]
                            })
                        },
                        onApprove: function(data, actions) {
                            const ticketData = {
                                idAccion: 3,
                                idServicio: $('#idServicio').val(),
                                totalPrecio: $('#precioPaypal').val(),
                                horaInicio: $('#horaInicio').text(),
                                horaFin: $('#horaFin').text(),
                                idUsuario: $('#idUsuario').val(),
                                idPatin: $('#idPatin').val(),
                                fechaRegistro: $('#fechaRegistro').text(),
                                email: $('#email').val(),
                            }

                            console.log(ticketData);

                            $.post('http://localhost/Codigo/Controladores/HomeController.php', ticketData, function(response) {
                                if (response == 0) {
                                    alert("Se ha producido un error durante el pago.")
                                } else {
                                    window.location.href = '../Home/pago_confirmado.php';
                                }
                            })
                        }
                    }).render('#botonPaypalContainer');
                </script>
            </div>
        </a>

    </main>

</body>

</html>