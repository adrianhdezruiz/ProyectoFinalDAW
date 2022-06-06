#!/bin/bash


USERDB="debianDB"
PASSDB="debianDB"
BBDD="bdd"

mysqladmin -u $USERDB -p$USERDB create $BBDD 
mysql -u $USERDB -p$USERDB $BBDD < /var/www/html/ProyectoFinalDAW/BBDD/DDL.sql

sudo chown -R www-data:www-data /var/www/html/ProyectoFinalDAW/
sudo chmod -R 775 /var/www/html/ProyectoFinalDAW/
