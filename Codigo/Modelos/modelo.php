<?php


class Modelo
{

    //Atributos

    private $idModelo;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $precioHora;
    public $fechaRegistro;
    public $idMarca;


    //Constructor


    public function construct0()
    {
    }


    public function construct1($nombre, $descripcion, $imagen, $precioHora, $fechaRegistro, $idMarca)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->precioHora = $precioHora;
        $this->fechaRegistro = $fechaRegistro;
        $this->idMarca = $idMarca;
    }


    //Metodos

    public function crearModelo(Modelo $modelo, $conn)
    {

        $sql = "INSERT INTO Modelo (nombre,descripcion,imagen,precioHora,fechaRegistro,idMarca) VALUES(:nombre,:descripcion,:imagen,:precioHora,:fechaRegistro,:idMarca)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre', $modelo->nombre);
        $stmt->bindParam(':descripcion', $modelo->descripcion);
        $stmt->bindParam(':imagen', $modelo->imagen);
        $stmt->bindParam(':precioHora', $modelo->precioHora);
        $stmt->bindParam(':fechaRegistro', $modelo->fechaRegistro);
        $stmt->bindParam(':idMarca', $modelo->idMarca);

        try {
            $stmt->execute();
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }


    public function obtenerModelos($idMarca, $conn)
    {
        $sql = "SELECT * FROM Modelo WHERE idMarca =:idMarca";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idMarca', $idMarca);

        if ($stmt->execute()) {

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } else {
            return null;
        }
    }

    public function editarModelo($id, $campo, $valor, $conn)
    {
        $sql = "UPDATE Modelo SET $campo = :valor WHERE idModelo = :id";

        $stmt = $conn->prepare($sql);


        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarModelo($id, $conn)
    {

        $sql = "DELETE FROM Modelo WHERE idModelo = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
