
<?php
session_start();

$BBDD = $_POST['bbddname'];
$USERDB = $_POST['bbddusername'];
$PASSDB = $_POST['bbddpassword'];

$_SESSION['bbddname'] = $BBDD;
$_SESSION['bbddusername'] = $USERDB;
$_SESSION['bbddpassword'] = $PASSDB;

try {
    shell_exec("/var/www/html/ProyectoFinalDAW/Despliegue/Scripts/script.sh $BBDD $USERDB $PASSDB");
    shell_exec("/var/www/html/ProyectoFinalDAW/Despliegue/Scripts/permisos.sh");
    header("Location: ../Despliegue/aplicacion_instalada.php");
} catch (\Throwable $th) {
    throw $th;
}

?>