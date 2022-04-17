<?php


class Marca
{

    //Atributos

    private $idMarca;
    public $nombre;
    public $fechaRegistro;


    //Constructores

    public function construct0()
    {
    }


    public function construct1($nombre, $fechaRegistro)
    {
        $this->nombre = $nombre;
        $this->fechaRegistro = $fechaRegistro;
    }

    //Métodos


    public function crearMarca(Marca $marca, $conn)
    {

        $sql = "INSERT INTO Marca (nombre,fechaRegistro) VALUES(:nombre,:fechaRegistro)";

        $stmt = $conn->prepare($sql);


        $stmt->bindParam(':nombre', $marca->nombre);
        $stmt->bindParam(':fechaRegistro', $marca->fechaRegistro);


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function obtenerMarcas($conn)
    {
        $sql = "SELECT * FROM Marca";

        $stmt = $conn->prepare($sql);


        if ($stmt->execute()) {

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } else {
            return null;
        }
    }
}
