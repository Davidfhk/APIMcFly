<?php

class Conexion
{

	public static function Connect(){
		$config = require_once 'config.php';
		try{
			$conexion = new PDO("mysql:host={$config['db']['host']};dbname={$config['db']['dbname']}",$config['db']['user'],$config['db']['password']);
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$conexion->exec("SET CHARACTER SET {$config['db']['charset']}");		
		}catch(Exception $e){
			die('Error '. $e->getMessage());
			echo "Linea del error " . $e->getLine();
		}
		return $conexion;
	}
}