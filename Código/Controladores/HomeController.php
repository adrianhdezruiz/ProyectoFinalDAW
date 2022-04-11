<?php

include '../config/dbconnection.php';
include '../librerias/PHPMailer-master/mail.php';
require_once '../Modelos/usuario.php';

session_start();

if (!empty($_POST['deleteAccount'])) {

    $id = $_SESSION['userId'];

    $user = new Usuario();

    if ($user->eliminarUsuario($id, $conn)) {
        session_destroy();
        header("Location: ../Vistas/Account/login.php");
    } else {
        echo "<script>alert('Ocurrio un error durante la eliminacion de su cuenta. Si el problema persiste contacte con el administrador')</script>";
        echo "<script>setTimeout(\"document.location.href = '../Vistas/Account/login.php';\",0);</script>";
    }
}
