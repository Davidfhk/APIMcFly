<?php

//-----------------------Consulta para linkear nuestra pagina de inicio--------------------

$app->get('/', function() use ($app){
	$app->render('inicio.php');
});

//-----------------------Consulta para mostrar todas las notas--------------------

$app->get('/notas', function() use ($app,$db){
	$sql = $db->prepare("SELECT * FROM notas");
	$sql->execute();
	$data = $sql->fetchAll(PDO::FETCH_ASSOC);
	
	$app->render('notas.php',array('notas' => $data));
});

// ----------Consulta para linkear al archivo nuevo.php, donde crearemos un nuevo usuario-----------

$app->get('/nueva/nota', function() use ($app){
	$app->render('nuevo.php');
});

// ----------Consulta para crear el nuevo usuario--------------------

$app->post('/nueva/nota', function() use ($app,$db){
	$request = $app->request;
	$nombre = $request->post('nombre');
	$descripcion = $request->post('descripcion');

	$sql = $db->prepare("INSERT INTO notas(nombre,descripcion) VALUES (:nombre,:descripcion)");
	$guardado = $sql->execute(array(':nombre' => $nombre, ':descripcion' => $descripcion));

	if ($guardado) {
		$app->flash('message','Nota guardada con exito');
	}else{
		$app->flash('error','Fallo al guardar la nota');
	}

	$app->redirect('nota');
});

$app->get('/nota/:id', function(int $id) use ($app,$db){
	$sql = $db->prepare("SELECT * FROM notas WHERE id = :id");
	$sql->execute(array(':id' => $id));
	$data = $sql->fetch(PDO::FETCH_ASSOC);
	// $data = json_encode($data);
	$app->render('nota.php', $data);
});

$app->delete('/borrar/:id', function(int $id) use ($app,$db){

	$sql = $db->prepare("DELETE FROM notas WHERE id = :id");
	$sql->execute(array(':id' => $id));

	$app->redirect('../notas');
});