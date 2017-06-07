<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="app/js/js.js" type="text/javascript"></script>	
</head>
<body>
	<h1>Notas</h1>
	<table>
	<?php foreach($notas as $nota):?>
	
		<tr id="<?= $nota['id']?>">
			<td><?= $nota['nombre']?></td>
			<td><a href="editar/<?=$nota['id']?>">Editar</a></td>
			<td><a id="borrar" href="" title="<?=$nota['id']?>">Borrar</a></td>
			<td><a href="nota/<?=$nota['id']?>">Detalles</a></td>
		</tr>
	<?php endforeach; ?>

		<tr>
			<td colspan="3"><a href="nueva/nota">Añadir nueva nota</a></td>
		</tr>
		<tr>
			<td colspan="3"><a href="../api_mcfly/">Inicio</a></td>
		</tr>
	</table>
</body>
</html>