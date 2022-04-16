<?php

header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
require_once '../Modelos/usuario.php';
include '../librerias/PHPMailer-master/mail.php';

session_start();

switch ($_POST["idAccion"]) {
    case 1:
        //Crear

        $nombre = htmlspecialchars(strip_tags($_POST['nombre']));
        $apellidos = htmlspecialchars(strip_tags($_POST['apellidos']));
        $telefono = htmlspecialchars(strip_tags($_POST['telefono']));
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $fechaRegistro = date("Y-m-d H:i:s");
        $contrasenya = password_hash($_POST['contrasenya'], PASSWORD_DEFAULT);
        $codigoRegistro = substr(md5(rand()), 0, rand(6, 6));
        $confirmado = 0;
        $idRol = $_POST['rol'];

        $user = new Usuario();
        $user->construct1($nombre, $apellidos, $telefono, $email, $fechaRegistro, $contrasenya, $codigoRegistro, $confirmado, $idRol);

        try {
            $user->crearUsuario($user, $conn);

            sendMail($email, $codigoRegistro, $nombre, $apellidos);
            echo 1;
        } catch (\Throwable $th) {
            echo 0;
        }

        break;
    case 2:
        //Editar
        $id = $_POST['id'];
        $nombre = htmlspecialchars(strip_tags($_POST['nombre']));
        $apellidos = htmlspecialchars(strip_tags($_POST['apellidos']));
        $telefono = htmlspecialchars(strip_tags($_POST['telefono']));
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $idRol = $_POST['rol'];

        $user = new Usuario();

        try {
            $user->editarUsuario($id, "nombre", $nombre, $conn);
            $user->editarUsuario($id, "apellidos", $apellidos, $conn);
            $user->editarUsuario($id, "telefono", $telefono, $conn);
            $user->editarUsuario($id, "email", $email, $conn);
            $user->editarUsuario($id, "idRol", $idRol, $conn);

            echo 1;
        } catch (\Throwable $th) {
            echo 0;
        }

        break;
    case 3:
        //Ver
        break;
    case 4:
        //Eliminar
        $id = $_POST['id'];

        $user = new Usuario();
        try {
            $user->eliminarUsuario($id, $conn);
            echo 1;
        } catch (\Throwable $th) {
            echo 0;
        }

        break;
    case 5:
        //Buscar usuario

        $busqueda = $_POST['searchValue'];
        $sql = "SELECT idUsuario, email FROM Usuario WHERE email LIKE '$busqueda%' ORDER BY email";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuarios = $stmt->fetchAll();
            $json = json_encode($usuarios);
            echo $json;
        } else {
            echo 0;
        }
        break;

    default:
        # code...
        break;
}
