<?php

class TicketActivos
{

    //PROPIEDADES

    public $fechaActual;
    public $horaActual;

    //CONSTRUCTOR

    public function __construct()
    {
        $this->fechaActual = date("Y-m-d");
        $this->horaActual = date("H:i:s");
    }

    //METODOS

    public function obtenerTicketsActivos($conn)
    {

        $fecha = $this->fechaActual;
        $hora = $this->horaActual;

        $sql = "SELECT * FROM Servicio WHERE fechaRegistro='$fecha' AND '$hora' BETWEEN horaInicio AND horaFinal";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }
}
