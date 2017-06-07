<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="app/js/js.js" type="text/javascript"></script>	
</head>
<body>
	<h1>Notas Favoritas</h1>
	<table>
	<?php foreach($notas as $nota):?>
	
		<tr id="<?= $nota['id']?>">
			<td><?= $nota['nombre']?></td>
			<td><a href="nota/<?=$nota['id']?>">Detalles</a></td>
		</tr>
	<?php endforeach; ?>
		<tr>
			<td colspan="3"><a href="../api_mcfly/">Inicio</a></td>
		</tr>
	</table>
</body>
</html>