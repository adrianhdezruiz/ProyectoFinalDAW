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

                    <!--Solo usuarios registrados-->
                    <?php if (isset($_SESSION['userId'])) { ?>
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

    <main class=" w-75 " style="margin: auto;">
        <h1 class="text-success fw-bold text-center m-4">USUARIOS</h1>
        <h2 class="text-success fw-bold text-center m-4">TOTAL USUARIOS: <span id="totalUsuarios"></span></h2>

        <span id="result">


        </span>
        <!--Panel añadir usuario-->

        <div class="row mt-5">
            <div class="col-12 border text-success fs-4">
                <div class="row">

                    <div class="col-12 border bg-secondary" style="text-align:end; ">.</div>

                </div>
                <form method="POST" id="adminAddUser">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Nombre</div>
                        <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " placeholder="Introduce nombre" id="adminNombre" maxlength="50" required pattern="[A-Za-zñÑÁÉÍÓÚáéíóú'-]*"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Apellidos</div>
                        <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " placeholder="Introduce apellidos" id="adminApellidos" maxlength="200" required pattern="[ A-Za-zñÑÁÉÍÓÚáéíóú'-]*"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Telefono</div>
                        <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " placeholder="Introduce telefono" id="adminTelefono" minlength="9" maxlength="9" required pattern="[0-9]*"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Email</div>
                        <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="email" style="width: 100%;height:100%; border:none " placeholder="Introduce email" id="adminEmail" maxlength="255" required></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Rol</div>
                        <div class="col-lg-9 col-sm-12 border" style="background-color:white">
                            <select class="form-select fs-4" id="adminRol" style="border:none" aria-label="Default select example">
                                <option value="1">Admin</option>
                                <option value="2">Usuario</option>

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Contraseña</div>
                        <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="password" style="width: 100%;height:100%; border:none " placeholder="Introduce contraseña" id="adminContrasenya" minlength="6" maxlength="20" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"></div>
                    </div>

                    <div class="row">

                        <div class="col-12 border bg-secondary"> <input type="submit" style="width: 100%;height:100%; border:none" id="adminAddUserSubmit" value="AÑADIR USUARIO"></div>
                    </div>
                </form>

            </div>

        </div>

        <!--Tabla usuarios-->

        <div class="row fs-5 mt-5">
            <div class="col-12 border bg-light">

                <div class="row d-flex text-center p-2 " style="border-bottom: 3px outset grey; ">
                    <div class="col-lg-3 p-1">
                        <input type="number" class="form-inline p-1 w-25" id="usuariosPagina" min="1" max="99">
                        <input type="button" id="submitUsuariosPagina" class="form-inline bg-success p-1" style="border:none" value="Usuarios por pagina">
                    </div>
                    <div class="col-lg-6">

                        <ul class="pagination pagination-lg justify-content-center align-items-center" id="pag">

                        </ul>

                    </div>
                    <div class="col-lg-3  fs-5">
                        <input type="text" class="p-1 rounded rounded-3" style="width: 80%; position:relative;top:7%" placeholder="Buscar usuario por correo" id="searchInput">
                        <button class="btn btn-success" id="search">Buscar</button>
                        <span class="text-danger me-5" id="searchError"></span>

                    </div>
                </div>

                <!--USUARIOS-->
                <div id="display">

                </div>
                <div id="usuarios">

                </div>



            </div>

        </div>




    </main>

    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="../../js/AJAX/admin_user.js"></script>
</body>

</html>