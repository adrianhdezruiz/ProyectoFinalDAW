<?php
class Ticket
{

    //PROPIEDADES

    public $idServicio;
    public $totalPrecio;
    public $fechaRegistro;
    public $horaInicio;
    public $horaFinal;
    public $idUsuario;
    public $idPatin;

    //CONSTRUCTOR

    public function construct0()
    {
    }

    public function construct1($idServicio, $totalPrecio, $fechaRegistro, $horaInicio, $horaFinal, $idUsuario, $idPatin)
    {
        $this->idServicio = $idServicio;
        $this->totalPrecio = $totalPrecio;
        $this->fechaRegistro = $fechaRegistro;
        $this->horaInicio = $horaInicio;
        $this->horaFinal = $horaFinal;
        $this->idUsuario = $idUsuario;
        $this->idPatin = $idPatin;
    }


    //METODOS

    public function crearTicket(Ticket $ticket, $conn)
    {

        $sql = "INSERT INTO Servicio (idServicio,totalPrecio,fechaRegistro,horaInicio,horaFinal,idUsuario,idPatin) VALUES (:idServicio,:totalPrecio,:fechaRegistro,:horaInicio,:horaFinal,:idUsuario,:idPatin)";
        $stmt = $conn->prepare($sql);


        $stmt->bindParam(':idServicio', $ticket->idServicio);
        $stmt->bindParam(':totalPrecio', $ticket->totalPrecio);
        $stmt->bindParam(':fechaRegistro', $ticket->fechaRegistro);
        $stmt->bindParam(':horaInicio', $ticket->horaInicio);
        $stmt->bindParam(':horaFinal', $ticket->horaFinal);
        $stmt->bindParam(':idUsuario', $ticket->idUsuario);
        $stmt->bindParam(':idPatin', $ticket->idPatin);


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerTicketUsuario($idUsuario, $conn)
    {

        $sql = "SELECT * FROM Servicio WHERE idUsuario = $idUsuario ORDER BY fechaRegistro DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }
}
