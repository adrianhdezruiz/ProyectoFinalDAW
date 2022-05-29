
<?php

if (!empty($_POST["instalar"])) {
    if (shell_exec("/var/www/html/ProyectoFinalDAW/Despliegue/Script/script.sh")) {
        echo "SCRIPT EJECUTADO CON EXITO";
    } else {
        echo "ERROR";
    }

    shell_exec("chown -R www-data:www-data /var/www/html/");
    shell_exec("chmod -R /var/www/html/");
}

?>