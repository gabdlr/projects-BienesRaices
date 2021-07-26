<?php

require 'funciones.php';

require 'config/database.php';

require '../vendor/autoload.php';

define('TEMPLATES_URL', __DIR__.'/templates');

define('FUNCIONES_URL', __DIR__.'funciones.php');

//Conectarnos a la base de datos

$db = conectarDB();

require '../models/Activerecord.php';
use Model\ActiveRecord;



ActiveRecord::setDB($db);

