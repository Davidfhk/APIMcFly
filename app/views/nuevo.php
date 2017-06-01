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
			<input type="text" name="nombre" placeholder="nombre">
			</td>
		</tr>
		<tr>
			<td>
			<textarea name="descripcion" placeholder="descripcion"></textarea>
			</td>
		</tr>
		<tr>
			<td>
			<input type="submit" name="guardar" value="Guardar">
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
	<a href="../notas">Lista de todas las Notas</a>
</body>
</html>