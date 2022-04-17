<?php

class Count
{


    public $idMarca;
    public $numModelos;
    public $numPatines;

    //CONSTRUCTOR

    public function __construct($idMarca, $conn)
    {

        $sql = "SELECT COUNT(*) FROM Modelo WHERE idMarca = $idMarca;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $this->numModelos = $stmt->fetch();

        $sql = "SELECT COUNT(*) FROM Patin WHERE idMarca = $idMarca;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $this->numPatines = $stmt->fetch();
    }
}
