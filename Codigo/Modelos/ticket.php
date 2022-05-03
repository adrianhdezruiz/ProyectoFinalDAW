<?php
class Ticket
{

    //PROPIEDADES

    private $idServicio;
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

    public function construct1($totalPrecio, $fechaRegistro, $horaInicio, $horaFinal, $idUsuario, $idPatin)
    {
        $this->idServicio = substr(md5(rand()), 0, rand(4, 4)) . "-" . substr(md5(rand()), 0, rand(4, 4)) . "-" . substr(md5(rand()), 0, rand(4, 4));
        $this->totalPrecio = $totalPrecio;
        $this->fechaRegistro = $fechaRegistro;
        $this->horaInicio = $horaInicio;
        $this->horaFinal = $horaFinal;
        $this->idUsuario = $idUsuario;
        $this->idPatin = $idPatin;
    }


    //METODOS
}
