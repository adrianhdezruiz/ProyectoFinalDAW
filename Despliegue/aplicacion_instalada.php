<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Codigo/sass/custom.css">
</head>

<body class="bg-secondary">
    <!--Cabecera-->
    <header class="row bg-dark d-flex justify-content-center">
        <img src="../Imagenes/logo1.png" id="logo_header" alt="logo">
    </header>
    <div style="margin:auto;border:1px solid black" class="w-50 p-3 mt-5">
        <h1>INSTALADOR - Cuenta administrador</h1>
        <hr>

        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="m-2">

            <div class="form-group row mt-1">
                <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext border p-2" name="nombreRegistro" placeholder="Introduce tu nombre" required maxlength="50" pattern="[A-Za-ñÑzÁÉÍÓÚáéíóú'-]*">
                </div>
                <div class="valid-feedback">Campo correcto</div>
                <div class="invalid-feedback">Solo se permiten letras. No introduzcas espacios</div>
            </div>
            <div class="form-group row mt-1">
                <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">Apellidos</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext border p-2" name="apellidosRegistro" placeholder="Introduce tus apellidos" required maxlength="200" pattern="[ A-Za-zñÑÁÉÍÓÚáéíóú'-]*">
                </div>
                <div class="valid-feedback">Campo correcto</div>
                <div class="invalid-feedback">Solo se permiten letras</div>
            </div>
            <div class="form-group row mt-1">
                <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext border p-2" name="emailRegistro" placeholder="Introduce tu email" required maxlength="255" pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ_-.]*@(gmail|outlook|yahoo)\.[a-z]{2,3}">
                </div>
                <div class="valid-feedback">Campo correcto</div>
                <div class="invalid-feedback">Introduzca un dominio válido</div>
            </div>
            <div class="form-group row mt-1">
                <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">Telefono</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext border p-2" name="telefonoRegistro" placeholder="Introduce tu telefono" required pattern="[0-9]*" minlength="9" maxlength="9">
                </div>
                <div class="valid-feedback">Campo correcto</div>
                <div class="invalid-feedback">Introduzca un numero telefónico válido</div>
            </div>
            <div class="form-group row mt-1">
                <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">Contraseña</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control-plaintext border p-2" name="contrasenyaRegistro" placeholder="Introduce tu contraseña" required minlength="6" maxlength="20" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$">
                </div>
                <div class="valid-feedback">Campo correcto</div>
                <div class="invalid-feedback">Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula y un número</div>
            </div>

            <input type="submit" value="Crear cuenta" class="btn btn-dark mt-3" name="submit">
            <p style="float:right;" class="mt-4">2</p>
        </form>

    </div>
    <script src="../Codigo/js/validacion.js"></script>
    <?php

    $nombreArchivo = '../Codigo/config/dbconnection.php';

    if (file_exists($nombreArchivo)) {
        include '../Codigo/config/dbconnection.php';
        include '../Codigo/Modelos/usuario.php';

        if (!empty($_POST['submit'])) {
            $user = new Usuario();

            $nombre = htmlspecialchars(strip_tags($_POST['nombreRegistro']));
            $apellidos = htmlspecialchars(strip_tags($_POST['apellidosRegistro']));
            $telefono = htmlspecialchars(strip_tags($_POST['telefonoRegistro']));
            $email = filter_var($_POST['emailRegistro'], FILTER_SANITIZE_EMAIL);
            $fechaRegistro = date("Y-m-d H:i:s");
            $contrasenya = password_hash($_POST['contrasenyaRegistro'], PASSWORD_DEFAULT);
            $codigoRegistro = "000000";
            $confirmado = 1;
            $idRol = 1;

            $user->construct1($nombre, $apellidos, $telefono, $email, $fechaRegistro, $contrasenya, $codigoRegistro, $confirmado, $idRol);

            if ($user->crearUsuario($user, $conn)) {
                header('Location: ../Codigo/Vistas/Account/login.php');
            } else {
                echo "<script>alert('Se ha producido un error al registrar al administrador')</script>";
            }
        }
    } else {
        header('Location: index.php');
    }





    ?>
</body>


</html>