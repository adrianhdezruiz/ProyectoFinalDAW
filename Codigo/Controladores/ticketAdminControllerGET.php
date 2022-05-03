<?php
header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
require_once '../Modelos/ticket.php';
require_once '../ViewModels/ticketActivos.php';
require_once '../Modelos/usuario.php';
require_once '../ViewModels/patinModelo.php';

session_start();

//CARGAR TICKETS ACTIVOS

$tickets = new TicketActivos();
$result = $tickets->obtenerTicketsActivos($conn);

//NUEVO ARRAY QUE EN VEZ DE GUARDAR LA ID DEL USUARIO Y EL MODELO MOSTRARA SUS RESPECTIVOS NOMBRES



$resultsArray = [];

for ($i = 0; $i < sizeof($result); $i++) {

    $usuario = new Usuario();
    $idUsuario = $result[$i]["idUsuario"];
    $resultUsuario = $usuario->obtenerUsuario("idUsuario", $idUsuario, $conn);

    $patin = new PatinModelo();
    $idPatin = $result[$i]["idPatin"];
    $resultPatin = $patin->obtenerDatosPatin($idPatin, $conn);

    $fecha = explode(" ", $result[$i]["fechaRegistro"]);

    $arr =  array(

        "idServicio" => $result[$i]["idServicio"],
        "idUsuario" => $resultUsuario["email"],
        "fechaRegistro" => $fecha[0],
        "horaInicio" => $result[$i]["horaInicio"],
        "horaFinal" => $result[$i]["horaFinal"],
        "precio" => $result[$i]["totalPrecio"],
        "patin" => $resultPatin["nombreMarca"] . " " . $resultPatin["nombreModelo"],
    );

    array_push($resultsArray, $arr);
}

$json = json_encode($resultsArray);
echo $json;
