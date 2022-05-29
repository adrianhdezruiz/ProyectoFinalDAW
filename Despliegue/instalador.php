
<?php

try {
    shell_exec("/var/www/html/ProyectoFinalDAW/Despliegue/Script/script.sh");
    echo "SCRIPT EJECUTADO CON EXITO";
} catch (\Throwable $th) {
    throw $th;
}

//shell_exec("chown -R www-data:www-data /var/www/html/");
//shell_exec("chmod -R /var/www/html/");


?>