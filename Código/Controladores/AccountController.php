<?php

include '../config/dbconnection.php';
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
    $codigoRegistro = substr(md5(rand()), 0, rand(7, 15));
    $confirmado = 0;
    $idRol = 2;

    //Instancia clase usuario

    $user = new Usuario($nombre, $apellidos, $telefono, $email, $fechaRegistro, $contrasenya, $codigoRegistro, $confirmado, $idRol);

    //Crear usuario

    if ($user->crearUsuario($user, $conn)) {
        echo "<script>alert('Te has registrado con exito')</script>";
        header("Location: ../Vistas/Home/principal.php");
    } else {
        //Error al registrarse
    }
}

//LOGIN

if (!empty($_POST['loginSubmit'])) {

    //password_verify();
}
