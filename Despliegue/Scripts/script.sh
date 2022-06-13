#!/bin/bash

export LANG=C.UTF-8

USERDB=$2
PASSDB=$3
BBDD=$1

mysqladmin -u $USERDB -p$USERDB create $BBDD 
mysql -u $USERDB -p$USERDB $BBDD < /var/www/html/ProyectoFinalDAW/BBDD/DDL.sql


