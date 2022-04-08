<?php

include '../config/dbconnection.php';
include '../librerias/PHPMailer-master/mail.php';
require_once '../Modelos/usuario.php';


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

    $user = new Usuario($nombre, $apellidos, $telefono, $email, $fechaRegistro, $contrasenya, $codigoRegistro, $confirmado, $idRol);

    try {

        //Introducir usuario en la base de datos
        $user->crearUsuario($user, $conn);

        session_start();
        $_SESSION["userId"] = $conn->lastInsertId();

        //Enviar codigo de registro por correo
        sendMail($email, $codigoRegistro, $nombre, $apellidos);

        header("Location: ../Vistas/Home/principal.php");
    } catch (\Throwable $th) {
        echo "<script>alert('El registro ha fallado. Vuelva a intentarlo, si el problema persiste contacte con el administrador')</script>";
        echo "<script>setTimeout(\"document.location.href = '../Vistas/Account/registro.php';\",0);</script>";
    }
}

//LOGIN

if (!empty($_POST['loginSubmit'])) {

    //password_verify();
}

//CONFIRMAR REGISTRO

if (!empty($_POST['confirmSubmit'])) {

    if (isset($_SESSION['userId'])) {

        $cod = $_POST['cod1'] . $_POST['cod2'] . $_POST['cod3'] . $_POST['cod4'] . $_POST['cod5'] . $_POST['cod6'];

        $id = $_SESSION['userId'];
    }
}
