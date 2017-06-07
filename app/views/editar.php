<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="" method="POST">
	<table>
		<tr>
			<td>
			<input type="text" name="nombre" placeholder="nombre" value="<?=$nombre?>">
			</td>
		</tr>
		<tr>
			<td>
			<textarea name="descripcion" placeholder="descripcion"><?=$descripcion?></textarea>
			</td>
		</tr>
		<tr>
			<td>
			<input type="hidden" name="_METHOD" value="PUT"/>
			<input type="submit" name="modificar" value="Modificar">
			</td>
		</tr>
	
	</table>
</form>
	<?php if (isset($flash['message'])) {
		echo $flash['message']." </br>";
	} ?>
	<?php if (isset($flash['error'])) {
		echo $flash['error']." </br>";
	} ?>
	<a href="../notas">Lista de Notas</a>
</body>
</html>