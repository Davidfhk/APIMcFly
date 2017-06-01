<?php
session_start();

require 'vendor/autoload.php';
require 'app/db/dbconnect.php';
// aplicación
$app = new \Slim\Slim();
$db = Conexion::Connect();

$app->config(array(
			'debug' => true,
			'templates.path' => 'app/views',
			));


require 'app/routes/routes.php';

$app->run();