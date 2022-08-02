<?php

//cargamos la librerias
require_once 'config/config.php';

//TODO: CORREGIR ESTE CODIGO CON AUTO CARGA DE SPL

//Carga de las clases de forma tradicional
/* require_once 'libs/Core.php'; // rutas o enrutador del framework
require_once 'libs/Controller.php'; //orm del framework
require_once 'libs/Dbase.php'; // CONTROLADOR BASE */

spl_autoload_register( function ($nombreClase){
    require_once 'libs/'.$nombreClase.'.php';
});