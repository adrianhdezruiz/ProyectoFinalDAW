<?php

class ProcesarTicket
{
    public function generarIdTicket()
    {
        $idTicket = substr(md5(rand()), 0, rand(4, 4)) . "-" . substr(md5(rand()), 0, rand(4, 4)) . "-" . substr(md5(rand()), 0, rand(4, 4));
        return $idTicket;
    }

    public function calcularPrecioTicket($horaInicio, $horaFin, $precioHora)
    {
        // s--> min
        $tiempoTotal = (strtotime($horaFin) -  strtotime($horaInicio)) / 60;
        $precioFinal = ($precioHora * $tiempoTotal) / 60;

        return $precioFinal;
    }

    public function asignarIdPatin($idModelo, $conn)
    {

        $sql = "SELECT * FROM Patin WHERE idModelo = $idModelo";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $indiceAleatorio = rand(0, sizeof($result) - 1);
        $idPatin = $result[$indiceAleatorio]["idPatin"];

        return $idPatin;
    }
}
