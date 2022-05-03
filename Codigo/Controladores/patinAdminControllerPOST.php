<?php
header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
require_once '../Modelos/patin.php';

session_start();

$idAccion = $_POST['idAccion'];

switch ($idAccion) {
    case 1:
        $patin = new Patin();
        $idMarca = $_POST['idMarca'];
        $idModelo = $_POST['idModelo'];
        try {
            $patin->crearPatin($idMarca, $idModelo, $conn);
            echo 1;
        } catch (\Throwable $th) {
            echo 0;
        }
        break;
    case 2:
        $patin = new Patin();
        $idPatin = $_POST['idPatin'];
        try {
            $patin->eliminarPatin($idPatin, $conn);
            echo 1;
        } catch (\Throwable $th) {
            echo 0;
        }
        break;
    case 3:

        $idModelo = $_POST['idModelo'];

        $sql = "SELECT * FROM Patin WHERE idModelo = $idModelo";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $json = json_encode($result);
        echo $json;

        break;

    default:
        # code...
        break;
}
