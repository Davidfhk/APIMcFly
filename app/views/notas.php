<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		var links = document.querySelectorAll("a[href='']");
		for (var i=0; i<links.length; i++){
			links[i].addEventListener("click",enviar,false);
		}
	});

	function enviar(e){
		/*Para identificar la id de la nota, mediante el title y para identificar la id del propio link 
		(borrar)*/
		var id = $(e.target).attr('title');
		var nombre = $(e.target).attr('id');
		
		if (nombre == 'borrar'){
			
			    $.ajax({
			    type: "post",
			    url: 'borrar/'+ id,
			    data: {_METHOD: "DELETE"},
			    success: function(result){
			    	$("#"+id).remove();

			    },
			    error: function(error){
			    		alert('error; ' + eval(error));
			    }
			    });
			    
		}
		e.preventDefault();
	}

	                
</script>
<body>
	<h1>Notas</h1>
	<table>
	<?php foreach($notas as $nota):?>
	
		<tr id="<?= $nota['id']?>">
			<td><?= $nota['nombre']?></td>
			<td><a href="">Editar</a></td>
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