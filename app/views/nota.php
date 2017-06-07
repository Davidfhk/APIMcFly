<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Detalles de la nota</h1>
		<h3>Nombre</h3>
			<p><?= $nombre ?></p>
		<h3>Descripción</h3>
			<p><?= $descripcion?></p>
<form action="" method="POST">
	<label><input type="checkbox" name="favorita" value="1" <?php if($favorita){echo 'checked';}?>>Guardar en favoritas</label></br>
	<input type="submit" name="guardar" value="Guardar">
</form>
</body>
</html>