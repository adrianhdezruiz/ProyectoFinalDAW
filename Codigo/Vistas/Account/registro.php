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

<body>

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
                            <a class="nav-link" href="login.php">Login </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="registro.php">Registro </a>
                        </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link" href="../Home/principal.php">Home </a>
                    </li>

                    <!--Solo usuarios registrados-->
                    <?php if (isset($_SESSION['userId'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../Home/perfil_usuario.php">Mi perfil </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../Home/tickets_usuario.php">Mis tickets </a>
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

    <div class="container-fluid border d-flex justify-content-center align-items-center vh-100 bg-success">
        <form action="../../Controladores/AccountController.php" id="registerForm" method="POST" class="needs-validation border w-50  bg-light text-center fs-5" style="position: absolute;top:35%;" novalidate>

            <!-- Cabecera login-->
            <div class="container bg-dark w-100 p-1 mb-3">
                <p class="text-success text-center"><b>REGISTRO</b></p>
            </div>
            <!-- Formulario -->
            <div class="row">
                <!--Izqda-->
                <div class="col-6 ">
                    <!--Nombre-->
                    <div class="form-group p-2 ms-3">
                        <label class="mb-3" for="nombreRegistro"><b>NOMBRE</b></label>
                        <input type="text" class="form-control p-2" name="nombreRegistro" id="nombreRegistro" placeholder="Introduce tu nombre" required maxlength="50" pattern="[A-Za-ñÑzÁÉÍÓÚáéíóú'-]*">
                        <div class="valid-feedback">Campo correcto</div>
                        <div class="invalid-feedback">Solo se permiten letras. No introduzcas espacios</div>
                    </div>
                    <!--Telefono-->
                    <div class="form-group p-2 ms-3">
                        <label class="mb-3" for="telefonoRegistro"><b>TELEFONO</b></label>
                        <input type="text" class="form-control p-2" name="telefonoRegistro" id="telefonoRegistro" placeholder="Introduce tu telefono" pattern="[0-9]*" minlength="9" maxlength="9" required>
                        <div class="valid-feedback">Campo correcto</div>
                        <div class="invalid-feedback">Introduzca un numero telefónico válido</div>
                    </div>
                    <!--Contraseña-->
                    <div class="form-group p-2 ms-3 mb-1">
                        <label class="mb-3" for="contrasenyaRegistro"><b>CONTRASEÑA</b></label>
                        <input type="password" class="form-control p-2" name="contrasenyaRegistro" id="contrasenyaRegistro" placeholder="Introduce tu contraseña" minlength="6" maxlength="20" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
                        <div class="valid-feedback">Campo correcto</div>
                        <div class="invalid-feedback">Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula y un número</div>
                    </div>
                </div>
                <!--Derecha-->
                <div class="col-6 ">
                    <!--Apellidos-->
                    <div class="form-group p-2 me-3">
                        <label class="mb-3" for="apellidosRegistro"><b>APELLIDOS</b></label>
                        <input type="text" class="form-control p-2" name="apellidosRegistro" id="apellidosRegistro" placeholder="Introduce tus apellidos" maxlength="200" pattern="[ A-Za-zñÑÁÉÍÓÚáéíóú'-]*" required>
                        <div class="valid-feedback">Campo correcto</div>
                        <div class="invalid-feedback">Solo se permiten letras</div>
                    </div>
                    <!--Correo electrónico-->
                    <div class="form-group p-2 me-3">
                        <label class="mb-3" for="emailRegistro"><b>EMAIL</b></label>

                        <input type="email" class="form-control p-2" id="emailRegistro" name="emailRegistro" placeholder="Introduce tu email" maxlength="255" pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ_-.]*@(gmail|outlook|yahoo)\.[a-z]{2,3}" required>

                        <div class="valid-feedback">Campo correcto</div>
                        <div class="invalid-feedback">Introduzca un dominio válido</div>
                    </div>
                    <!--Repetir contraseña-->
                    <div class="form-group p-2 me-3">
                        <label class="mb-3" for="rcontrasenyaRegistro"><b>REPETIR CONTRASEÑA</b></label>
                        <input type="password" class="form-control p-2 mb-1" id="rcontrasenyaRegistro" placeholder="Repite tu contraseña" minlength="6" maxlength="20" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
                        <div class="valid-feedback">Campo correcto</div>
                        <div class="invalid-feedback">Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula y un número</div>
                    </div>

                </div>
            </div>
            <!--Boton-->
            <div class="form-group mb-3 mt-3 p-3">
                <small>Te enviaremos un correo para confirmar tu email</small>
                <input type="submit" name="registerSubmit" id="registerSubmit" class="btn btn-dark mt-3 mb-3 w-100" value="Registrarse"></input>
                <span id="errorContrasenya" class="text-danger"></span>

                <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>

            </div>
        </form>
    </div>

    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../js/validacion.js"></script>
    <script>
        $(document).ready(function() {

            $('#registerSubmit').click(function(e) {

                var passwd = $('#contrasenyaRegistro').val();
                var passwdConfirmed = $('#rcontrasenyaRegistro').val();

                if (passwd != passwdConfirmed) {

                    e.preventDefault();
                    $('#errorContrasenya').html('Las contraseñas no coinciden');
                } else {
                    $('#errorContrasenya').html('');

                }
            })
        })
    </script>
</body>

</html>