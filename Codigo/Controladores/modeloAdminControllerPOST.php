<?php
header('Access-Control-Allow-Origin: *');

include '../config/dbconnection.php';
require_once '../Modelos/modelo.php';

session_start();

$idAccion = $_POST['idAccion'];

switch ($idAccion) {
        //CREAR

    case 1:

        //OBTENER ULTIMA ID DE MODELO INSERTADO PARA NOMBRAR IMAGEN 

        $sql = "SELECT idModelo+1 FROM Modelo ORDER BY idModelo DESC LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $lastModelId = $stmt->fetch();

        //SUBIDA ARCHIVO AL SERVIDOR

        $nombre_archivo = $_FILES['file']['name'];
        $nombre_archivo_temporal = $_FILES['file']['tmp_name'];

        $uploadFileDir = "../../Imagenes/Modelos/";

        $fileNameCmps = explode(".", $nombre_archivo);
        $fileExtension = strtolower(end($fileNameCmps));

        $nombre_archivo_nuevo = "modelo" . $lastModelId[0] . "marca" . $_POST['idMarca'] . "." . $fileExtension;
        $dest_path = $uploadFileDir . $nombre_archivo_nuevo;

        $allowedfileExtensions = array('jpg', 'png');
        if (in_array($fileExtension, $allowedfileExtensions)) {

            if (move_uploaded_file($nombre_archivo_temporal, $dest_path)) {
                //echo "Archivo enviado";
            } else {
                //echo "ERROR";
            }
        } else {
            //echo "El archivo tiene una extension no valida";
        }

        $modelo = new Modelo();

        $modelo->nombre = $_POST['modelo'];
        $modelo->descripcion = $_POST['descripcion'];
        $modelo->imagen = $nombre_archivo_nuevo;
        $modelo->precioHora = $_POST['precio'];
        $modelo->fechaRegistro = date("Y-m-d H:i:s");
        $modelo->idMarca = $_POST['idMarca'];

        $result =  $modelo->crearModelo($modelo, $conn);
        echo $result;

        break;
    case 2:

        $id = $_POST['idModelo'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precioHora'];

        $modelo = new Modelo();

        try {
            $modelo->editarModelo($id, "nombre", $nombre, $conn);
            $modelo->editarModelo($id, "descripcion", $descripcion, $conn);
            $modelo->editarModelo($id, "precioHora", $precio, $conn);
            echo 1;
        } catch (\Throwable $th) {
            echo 0;
        }

        break;

    case 3:

        $id = $_POST['idModelo'];
        $modelo = new Modelo();

        try {
            $modelo->eliminarModelo($id, $conn);
            echo 1;
        } catch (\Throwable $th) {
            echo 0;
        }


        break;
    default:
        # code...
        break;
}
