<?php
header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
require_once '../Modelos/ticket.php';
require_once '../ViewModels/patinModelo.php';


session_start();

$idUsuario = $_GET['idUsuario'];
$emailUsuario = $_GET['emailUsuario'];

$ticket = new Ticket();
$ticketsUsuario = $ticket->obtenerTicketUsuario($idUsuario, $conn);
$infoPatin = [];

for ($i = 0; $i < sizeof($ticketsUsuario); $i++) {

    $idPatin = $ticketsUsuario[$i]["idPatin"];
    $vm = new PatinModelo();
    $patin = $vm->obtenerDatosPatin($idPatin, $conn);
    array_push($infoPatin, $patin);
}


$result = array(
    "ticketsUsuario" => $ticketsUsuario,
    "emailUsuario" => $emailUsuario,
    "infoPatin" => $infoPatin,
);

$json = json_encode($result);
echo $json;
