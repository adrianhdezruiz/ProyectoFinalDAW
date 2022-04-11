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

    public function construct0()
    {
    }


    public function construct1($nombre, $apellidos, $telefono, $email, $fechaRegistro, $contrasenya, $codigoRegistro, $confirmado, $idRol)
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


    public function obtenerUsuario($campo, $valor, $conn)
    {
        $sql = "SELECT * FROM Usuario WHERE $campo = :valor";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':valor', $valor);

        if ($stmt->execute()) {

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        } else {
            return null;
        }
    }

    public function editarUsuario($id, $campo, $valor, $conn)
    {
        $sql = "UPDATE Usuario SET $campo = :valor WHERE idUsuario = :id";

        $stmt = $conn->prepare($sql);


        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
