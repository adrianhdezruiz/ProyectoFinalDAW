<?php

include '../config/dbconnection.php';

class Usuario

{
    //Atributos

    private $idUsuario;
    public $nombre;
    public $apellidos;
    public $telefono;
    public $email;
    public $fechaRegistro;
    public $contrasenya;
    public $codigoRegistro;
    public $confirmado;
    public $idRol;

    //Constructor

    public function __construct($nombre, $apellidos, $telefono, $email, $fechaRegistro, $contrasenya, $codigoRegistro, $confirmado, $idRol)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->fechaRegistro = $fechaRegistro;
        $this->contrasenya = $contrasenya;
        $this->codigoRegistro = $codigoRegistro;
        $this->confirmado = $confirmado;
        $this->idRol = $idRol;
    }

    //Metodos

    public function crearUsuario(Usuario $user)
    {
    }
}
