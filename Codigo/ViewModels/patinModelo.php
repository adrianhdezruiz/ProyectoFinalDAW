<?php

class PatinModelo
{

    public function listadoPatines($idMarca, $conn)
    {
        $sql = "SELECT idPatin, Modelo.nombre AS nombreModelo FROM Patin INNER JOIN Modelo ON Patin.idModelo=Modelo.idModelo WHERE Patin.idMarca = $idMarca;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public function rellenarSelect($idMarca, $conn)
    {

        $sql = "SELECT DISTINCT idModelo,nombre FROM Modelo WHERE idMarca =$idMarca";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public function obtenerDatosPatin($idPatin, $conn)
    {

        $sql = "SELECT idPatin, Modelo.nombre AS nombreModelo,Marca.nombre AS nombreMarca FROM Patin INNER JOIN Modelo ON Patin.idModelo=Modelo.idModelo INNER JOIN Marca ON Patin.idMarca=Marca.idMarca WHERE idPatin =$idPatin";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();

        return $result;
    }

    public function obtenerNombreMarca($idMarca, $conn)
    {
        $sql = "SELECT nombre FROM Marca WHERE idMarca=$idMarca";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();


        return $result[0];
    }

    public function obtenerNombreModelo($idModelo, $conn)
    {
        $sql = "SELECT nombre FROM Modelo WHERE idMarca=$idModelo";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();

        return $result[0];
    }

    public function buscarModelo($search, $conn)
    {

        $sql = "SELECT * FROM Modelo WHERE nombre LIKE '$search%' ORDER BY idModelo";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }
}
