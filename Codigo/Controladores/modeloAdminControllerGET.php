<?php
header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
require_once '../Modelos/modelo.php';

session_start();

$idMarca = $_GET['idMarca'];

$modelo = new Modelo();
$result = $modelo->obtenerModelos($idMarca, $conn);

$json = json_encode($result);
echo $json;
