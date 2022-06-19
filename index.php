<?php
require 'Codigo/config/db.php';
$db = new DB();
$db->checkIfDBExists();
header('Location: Codigo/Vistas/Home/home_principal.php');
