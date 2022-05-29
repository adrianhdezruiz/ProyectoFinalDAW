
<?php

try {
    shell_exec("chown -R www-data:www-data /var/www/html/");
    shell_exec("chmod -R /var/www/html/");
    shell_exec("/var/www/html/ProyectoFinalDAW/Despliegue/Scripts/script.sh");
    header("Location: ../Despliegue/aplicacion_instalada.php");
} catch (\Throwable $th) {
    throw $th;
}


?>