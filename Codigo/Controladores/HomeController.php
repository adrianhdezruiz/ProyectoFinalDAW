<?php

header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
include '../librerias/PHPMailer-master/mail.php';
require_once '../Modelos/usuario.php';
require_once '../Modelos/modelo.php';
require_once '../ViewModels/patinModelo.php';
require_once '../Modelos/ticket.php';

session_start();

$idAccion = $_POST["idAccion"];


//Eliminar usuario

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



if ($idAccion != null) {
    switch ($idAccion) {

            //Devuelve array que contiene el nombre de la marca y los modelos relacionados con esta 
        case 1:
            $idMarca = $_POST["idMarca"];
            $modelo = new Modelo();
            $modelosMarca = $modelo->obtenerModelos($idMarca, $conn);
            $pm = new PatinModelo();
            $nombreMarca = $pm->obtenerNombreMarca($idMarca, $conn);

            $result = array(

                "modelosMarca" => $modelosMarca,
                "nombreMarca" => $nombreMarca,
            );

            $json = json_encode($result);
            echo $json;
            break;
        case 2:

            //Busqueda de modelo
            //Devuelve array que contiene un array con el nombre de las marcas y otro array con el resultado de la busqueda para
            //asignar el nombre de la marca

            $search = $_POST['searchVal'];
            $pm = new PatinModelo();
            $searchResult = $pm->buscarModelo($search, $conn);
            $listaMarcas = [];

            for ($i = 0; $i < sizeof($searchResult); $i++) {
                $nombreMarca = $pm->obtenerNombreMarca($searchResult[$i]["idMarca"], $conn);
                array_push($listaMarcas, $nombreMarca);
            }

            $result = array(

                "modelos" => $searchResult,
                "listaMarcas" => $listaMarcas,
            );

            $json = json_encode($result);
            echo $json;

            break;
        case 3:

            //Crear ticket

            $idServicio = $_POST['idServicio'];
            $totalPrecio = $_POST['totalPrecio'];
            $horaInicio = $_POST['horaInicio'];
            $horaFin = $_POST['horaFin'];
            $idUsuario = $_POST['idUsuario'];
            $idPatin = $_POST['idPatin'];
            $fechaRegistro = $_POST['fechaRegistro'];
            $email = $_POST['email'];

            $ticket = new Ticket();
            $ticket->construct1($idServicio, $totalPrecio, $fechaRegistro, $horaInicio, $horaFin, $idUsuario, $idPatin);
            if ($ticket->crearTicket($ticket, $conn)) {
                //sendMailPago($email);
                echo 1;
            } else {
                echo 0;
            }

        default:
            # code...
            break;
    }
}
