<?php
header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
require_once '../Modelos/usuario.php';

session_start();

//GET

$user = new Usuario();
$result = $user->obtenerUsuarios($conn);


$json = json_encode($result);
echo $json;
