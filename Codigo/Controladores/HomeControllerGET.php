<?php

header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
include '../Modelos/modelo.php';
require_once '../Modelos/marca.php';

session_start();

$modelo = new Modelo();
$modeloResult = $modelo->obtenerModelosCompleto($conn);

$marca = new Marca();
$marcasResult = $marca->obtenerMarcas($conn);

$result = array(

    "modelos" => $modeloResult,
    "listaMarcas" => $marcasResult,
);

$json = json_encode($result);
echo $json;
