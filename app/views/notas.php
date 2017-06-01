<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Notas</h1>
	<table>
	<?php foreach($notas as $nota):?>
	
		<tr>
			<td><?= $nota['nombre']?></td>
			<td><a href="">Editar</a></td>
			<td><a href="">Borrar</a></td>
			<td><a href="">Detalles</a></td>
		</tr>
	<?php endforeach; ?>
		<tr>
			<td colspan="3"><a href="nueva/nota">Añadir nueva nota</a></td>
		</tr>
		<tr>
			<td colspan="3"><a href="">Inicio</a></td>
		</tr>
	</table>
</body>
</html>