<?php
header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
require_once '../Modelos/marca.php';

session_start();

switch ($_POST['idAccion']) {
    case 1:
        //CREAR

        $nombre = htmlspecialchars(strip_tags($_POST['nombre']));
        $fechaRegistro = date("Y-m-d H:i:s");

        $marca = new Marca();
        $marca->construct1($nombre, $fechaRegistro);

        try {

            $marca->crearMarca($marca, $conn);
            echo 1;
        } catch (\Throwable $th) {

            echo 0;
        }
        break;
    case 2:

        $id = $_POST['idMarca'];
        $nombre = htmlspecialchars(strip_tags($_POST['nuevoNombre']));

        $marca = new Marca();
        try {
            $marca->editarMarca($id, "nombre", $nombre, $conn);
            echo 1;
        } catch (\Throwable $th) {
            echo 0;
        }

        break;

    case 3:

        $id = $_POST["idMarca"];

        $marca = new Marca();
        try {
            $marca->eliminarMarca($id, $conn);
            echo 1;
        } catch (\Throwable $th) {
            echo 0;
        }
        break;

    default:
        # code...
        break;
}
