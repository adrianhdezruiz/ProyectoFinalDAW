#!/bin/bash


USERDB="debianDB"
PASSDB="debianDB"
BBDD="bdd"

mysqladmin -u $USERDB -p$USERDB create $BBDD 
mysql -u $USERDB -p$USERDB $BBDD < /var/www/html/ProyectoFinalDAW/BBDD/DDL.sql


