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

// ----------Consulta para linkear al archivo nuevo.php, donde crearemos una nueva nota-----------

$app->get('/nueva/nota', function() use ($app){
	$app->render('nuevo.php');
});

// ----------Consulta para crear una nueva nota--------------------

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

// -----------------------Consulta para mostrar los detalles de la nota-------------------

$app->get('/nota/:id', function(int $id) use ($app,$db){
	$sql = $db->prepare("SELECT * FROM notas WHERE id = :id");
	$sql->execute(array(':id' => $id));
	$data = $sql->fetch(PDO::FETCH_ASSOC);
	// $data = json_encode($data);
	$app->render('nota.php', $data);
});

// -----------------------Consulta para borrar la nota-------------------

$app->delete('/borrar/:id', function(int $id) use ($app,$db){

	$sql = $db->prepare("DELETE FROM notas WHERE id = :id");
	$sql->execute(array(':id' => $id));

	$app->redirect('../notas');
});

// -----Consulta para mostrar en la vista de editar.php, la nota que vamos a editar------

$app->get('/editar/:id', function(int $id) use ($app,$db){
	$request = $app->request;
	$sql = $db->prepare("SELECT * FROM notas WHERE id = :id" );
	$sql->execute(array(':id' => $id));
	$data = $sql->fetch(PDO::FETCH_ASSOC);
	// $data = json_encode($data);
	if (!$data) {
		$app->halt(404, 'Nota no encontrado');
	}
	$app->render('editar.php', $data);
});

// -----------------------Consulta para editar la nota--------------------

$app->put('/editar/:id', function(int $id) use ($app,$db){
	$request = $app->request;
	$nombre = $request->post('nombre');
	$descripcion = $request->post('descripcion');

	// $sql = $db->prepare("UPDATE notas SET nombre = ':nombre',descripcion = ':descripcion' WHERE id = ':id'");


	// $modificado = $sql->execute(array(':id' => $id, ':nombre' => $nombre, ':descripcion' => $descripcion));

	$sql = $db->prepare("UPDATE notas SET nombre = '$nombre',descripcion = '$descripcion' WHERE id = '$id'");


	$modificado = $sql->execute();
	if ($modificado) {
		$app->flash('message','Nota modificada con exito');
	}else{
		$app->flash('error','Error al modificar la nota');
	}

	$app->redirect("$id");
});

// -----------------------Consulta para guardar la nota favorita--------------------

$app->post('/nota/:id', function(int $id) use ($app,$db){
	$request = $app->request;
	$favorita = $request->post('favorita');
	if (!isset($favorita)) {
		$favorita = 0;
	}
	$sql = $db->prepare("UPDATE notas SET favorita = $favorita WHERE id = '$id'");
	$sql->execute();

	$app->redirect('../notas');

});

// -----------------------Consulta para mostrar los usuarios favoritas--------------------

$app->get('/favoritas', function() use ($app,$db){
	$favorita = 1;
	$sql = $db->prepare("SELECT * FROM notas WHERE favorita = :favorita");
	$sql->execute(array(':favorita' => $favorita));
	$data = $sql->fetchAll(PDO::FETCH_ASSOC);
	// $data = json_encode($data);
	$app->render('notas_fav.php', array('notas' => $data));
});
