<?php

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

    public function crearUsuario(Usuario $user, $conn)
    {
        $sql = "INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES(:nombre,:apellidos,:telefono,:email,:fechaRegistro,:contrasenya,:codigoRegistro,:confirmado,:idRol)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre', $user->nombre);
        $stmt->bindParam(':apellidos', $user->apellidos);
        $stmt->bindParam(':telefono', $user->telefono);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':fechaRegistro', $user->fechaRegistro);
        $stmt->bindParam(':contrasenya', $user->contrasenya);
        $stmt->bindParam(':codigoRegistro', $user->codigoRegistro);
        $stmt->bindParam(':confirmado', $user->confirmado);
        $stmt->bindParam(':idRol', $user->idRol);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
