<?php

class DB
{


    //Constructor

    public function __construct()
    {
    }

    //Metodos

    public function checkIfDBExists()
    {
        $nombreArchivo = '/var/www/html/ProyectoFinalDAW/Codigo/config/dbconnection.php';
        if (!file_exists($nombreArchivo)) {
            header('Location:/ProyectoFinalDAW/Despliegue/index.php');
        } else {
            return;
        }
    }
}
