<?php
header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
require_once '../Modelos/ticket.php';
require_once '../Modelos/usuario.php';
require_once '../ViewModels/patinModelo.php';

session_start();

//BUSCAR TICKET

$idTicket = $_POST['idTicket'];

$sql = "SELECT * FROM Servicio WHERE idServicio='$idTicket' ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();


if ($result != null) {

    $usuario = new Usuario();
    $idUsuario = $result["idUsuario"];
    $resultUsuario = $usuario->obtenerUsuario("idUsuario", $idUsuario, $conn);

    $patin = new PatinModelo();
    $idPatin = $result["idPatin"];
    $resultPatin = $patin->obtenerDatosPatin($idPatin, $conn);

    $arr =  array(
        "idServicio" => $result["idServicio"],
        "idUsuario" => $resultUsuario["email"],
        "fechaRegistro" => $result["fechaRegistro"],
        "horaInicio" => $result["horaInicio"],
        "horaFinal" => $result["horaFinal"],
        "precio" => $result["totalPrecio"],
        "patin" => $resultPatin["nombreMarca"] . " " . $resultPatin["nombreModelo"],
    );

    $json = json_encode($arr);
    echo $json;
} else {
    echo 0;
}
