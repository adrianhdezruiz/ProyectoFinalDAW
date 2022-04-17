<?php
header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
require_once '../Modelos/marca.php';
require_once '../ViewModels/count.php';

session_start();

$marca = new Marca();
$result = $marca->obtenerMarcas($conn);


$countArr = [];

foreach ($result as $key => $value) {
    $id = $value["idMarca"];
    $count = new Count($id, $conn);
    $arr = array(
        'numModelos' => $count->numModelos[0],
        'numPatines' => $count->numPatines[0],
    );

    array_push($countArr, $arr);
}

$response = array(

    'marcas' => $result,
    'count'  => $countArr,

);

$json = json_encode($response);
echo $json;
