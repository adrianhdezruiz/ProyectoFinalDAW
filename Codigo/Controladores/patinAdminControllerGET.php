<?php
header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
require_once '../Modelos/patin.php';
require_once '../ViewModels/patinModelo.php';

session_start();

$idMarca = $_GET['idMarca'];

$patin = new PatinModelo();
$listadoPatines = $patin->listadoPatines($idMarca, $conn);
$select = $patin->rellenarSelect($idMarca, $conn);

$result = array(

    'patines' => $listadoPatines,
    'select' => $select,
);


$json = json_encode($result);
echo $json;
