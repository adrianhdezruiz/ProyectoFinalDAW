
<?php

$BBDD = $_POST['bbddname'];
$USERDB = $_POST['bbddusername'];
$PASSDB = $_POST['bbddpassword'];

$nombreArchivo = "dbconnection.php";
$nombreArchivo2 = $nombreArchivo;
$nuevoArchivo = fopen("../Codigo/config/$nombreArchivo2", 'w');

$codigo = "
        <?php
      
        \$servername = 'localhost';
        \$username = $USERDB;
        \$password = $PASSDB;
        \$bbdd = $BBDD;
        
        try {
            \$conn = new PDO('mysql:host=$servername;dbname=' . \$bbdd, \$username, \$password);
            // set the PDO error mode to exception
            \$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo 'Connected successfully';
        } catch (PDOException \$e) {
            //echo 'Connection failed: ' . \$e->getMessage();
        }
        ?>";

fwrite($nuevoArchivo, $codigo);
fclose($nuevoArchivo);



try {
    shell_exec("/var/www/html/ProyectoFinalDAW/Despliegue/Scripts/script.sh $BBDD $USERDB $PASSDB");
    shell_exec("/var/www/html/ProyectoFinalDAW/Despliegue/Scripts/permisos.sh");
    header("Location: ../Despliegue/aplicacion_instalada.php");
} catch (\Throwable $th) {
    throw $th;
}

?>