<?php

include '../config/dbconnection.php';
include '../librerias/PHPMailer-master/mail.php';
require_once '../Modelos/usuario.php';

session_start();

//REGISTRO

if (!empty($_POST['registerSubmit'])) {

    //Filtrado y asignacion datos provenientes del formulario  de registro

    $nombre = htmlspecialchars(strip_tags($_POST['nombreRegistro']));
    $apellidos = htmlspecialchars(strip_tags($_POST['apellidosRegistro']));
    $telefono = htmlspecialchars(strip_tags($_POST['telefonoRegistro']));
    $email = filter_var($_POST['emailRegistro'], FILTER_SANITIZE_EMAIL);
    $fechaRegistro = date("Y-m-d H:i:s");
    $contrasenya = password_hash($_POST['contrasenyaRegistro'], PASSWORD_DEFAULT);
    $codigoRegistro = substr(md5(rand()), 0, rand(6, 6));
    $confirmado = 0;
    $idRol = 2;

    //Instancia clase usuario

    $user = new Usuario();
    $user->construct1($nombre, $apellidos, $telefono, $email, $fechaRegistro, $contrasenya, $codigoRegistro, $confirmado, $idRol);

    try {

        //Introducir usuario en la base de datos
        $user->crearUsuario($user, $conn);

        $_SESSION["userId"] = $conn->lastInsertId();

        //Enviar codigo de registro por correo
        sendMail($email, $codigoRegistro, $nombre, $apellidos);

        header("Location: ../Vistas/Home/principal.php");
    } catch (\Throwable $th) {
        if (!is_null($user->obtenerUsuario("email", $email, $conn))) {
            echo "<script>alert('El email introducido ya se encuentra registrado')</script>";
            echo "<script>setTimeout(\"document.location.href = '../Vistas/Account/registro.php';\",0);</script>";
        } else {
            echo "<script>alert('El registro ha fallado. Vuelva a intentarlo, si el problema persiste contacte con el administrador')</script>";
            echo "<script>setTimeout(\"document.location.href = '../Vistas/Account/registro.php';\",0);</script>";
        }
    }
}

//LOGIN

if (!empty($_POST['loginSubmit'])) {

    //Comprobar si email existe

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contrasenya = $_POST['contrasenya'];

    $user = new Usuario();

    $result = $user->obtenerUsuario("email", $email, $conn);

    if (!$result == null) {


        //Verificar contraseña

        if (password_verify($contrasenya, $result['contrasenya'])) {
            $_SESSION['userId'] = $result['idUsuario'];
            echo "<script>setTimeout(\"document.location.href = '../Vistas/Home/principal.php';\",0);</script>";
        } else {
            echo "<script>alert('La contraseña introducida no es correcta')</script>";
            echo "<script>setTimeout(\"document.location.href = '../Vistas/Account/login.php';\",0);</script>";
        }
    } else {
        echo "<script>alert('El email introducido no se encuentra registrado')</script>";
        echo "<script>setTimeout(\"document.location.href = '../Vistas/Account/login.php';\",0);</script>";
    }
}

//LOGOUT

if (!empty($_POST['logoutSubmit'])) {

    session_destroy();
    header("Location: ../Vistas/Account/login.php");
}

//CONFIRMAR REGISTRO

if (!empty($_POST['confirmSubmit'])) {

    //Se comprueba si el codigo introducido por el usuario es igual que el que se encuentra en la base de datos

    if (isset($_SESSION['userId'])) {

        $id = $_SESSION['userId'];

        $cod = $_POST['cod1'] . $_POST['cod2'] . $_POST['cod3'] . $_POST['cod4'] . $_POST['cod5'] . $_POST['cod6'];

        $user = new Usuario();

        if (!is_null($user->obtenerUsuario("idUsuario", $id, $conn))) {
            $result = $user->obtenerUsuario("idUsuario", $id, $conn);

            if ($result['codigoRegistro'] == $cod) {

                if ($user->editarUsuario($id, "confirmado", 1, $conn)) {
                    echo "<script>alert('Su cuenta ha sido verificada con éxito')</script>";
                    echo "<script>setTimeout(\"document.location.href = '../Vistas/Home/principal.php';\",0);</script>";
                }
            } else {
                echo "<script>alert('El código introducido no es correcto')</script>";
                echo "<script>setTimeout(\"document.location.href = '../Vistas/Account/confirmar_registro.php';\",0);</script>";
            }
        }
    }
}
