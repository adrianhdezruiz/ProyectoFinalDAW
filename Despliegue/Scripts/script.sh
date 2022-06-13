#!/bin/bash

export LANG=C.UTF-8

USERDB="debianDB"
PASSDB="debianDB"
BBDD=$1

mysqladmin -u $USERDB -p$USERDB create $BBDD 
mysql -u $USERDB -p$USERDB $BBDD < /var/www/html/ProyectoFinalDAW/BBDD/DDL.sql


