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