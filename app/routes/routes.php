<?php

//-----------------------Consulta para linkear nuestra pagina de inicio--------------------

$app->get('/', function() use ($app){
	$app->render('inicio.php');
});

$app->get('/notas', function() use ($app,$db){
	$sql = $db->prepare("SELECT * FROM notas");
	$sql->execute();
	$data = $sql->fetchAll(PDO::FETCH_ASSOC);
	
	$app->render('notas.php',array('notas' => $data));
});