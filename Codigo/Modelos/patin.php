<?php

class Patin
{

    //PROPIEDADES

    private $idPatin;
    public $idMarca;
    public $idModelo;

    //CONSTRUCTORES

    public function construct0()
    {
    }

    public function construct1($idModelo, $idMarca)
    {
        $this->idMarca = $idMarca;
        $this->idModelo = $idModelo;
    }

    //METODOS

    public function obtenerPatines($idMarca, $conn)
    {
        $sql = "SELECT * FROM Patin WHERE idMarca = $idMarca";

        $stmt = $conn->prepare($sql);


        if ($stmt->execute()) {

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } else {
            return null;
        }
    }

    public function crearPatin($idMarca, $idModelo, $conn)
    {
        $sql = "INSERT INTO Patin (idMarca,idModelo) VALUES (:idMarca,:idModelo)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':idMarca', $idMarca);
        $stmt->bindParam(':idModelo', $idModelo);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarPatin($idPatin, $conn)
    {
        $sql = "DELETE FROM Patin  WHERE idPatin=$idPatin";

        $stmt = $conn->prepare($sql);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
