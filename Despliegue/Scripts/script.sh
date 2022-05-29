#!/bin/bash

USERDB="debianDB"
PASSDB="debianDB"
BBDD="bdd"
DATOS="DDL.sql"

mysqladmin -u $USERDB -p$USERDB create $BBDD
mysql -u $USERDB -p$USERDB $BBDD < ../BBDD/$DATOS