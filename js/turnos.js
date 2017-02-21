$(document).ready(function(){
	function ListarTurnos(){
		$.ajax({
			type: "GET",
			url: "listarturnos.php",
			dataType: "html",
			success: function(response){
				$("#Turnos-datos").html(response);					
			}
			});
	}
	ListarTurnos();
	$("#turn_buscar").keyup(function(){
		var valor= $(this).val();
		if(valor !='') {
			$.ajax({
				url: "buscarturnos.php",
				method: "POST",
				data:{search:valor},
				dataType: "text",
				success: function(data){
					$("#Turnos-datos").html(data);
				}
			});
		} else {
			ListarTurnos();	
		}
	});
	$("#guardarturnos").click(function TurnosGuardar(){
			$.ajax({
				method: "POST",
				url: "guardarturnos.php",				
				data: $('#FormTurnos').serialize(),
				dataType: "text",
				success: function(response){
					alert(response);
				}
			});
			ListarTurnos();
		});
	$("#eliminarturnos").click(function TurnosEliminar(){
			var status = $("#id_turno").val();
			var preg= confirm("¿Desea eliminar el registro?");
			if(preg== true){				
			$.ajax({
				method: "POST",
				url: "eliminarturnos.php",
				data: {'id_turno': status},
				dataType: "text",
				success: function(response){
					alert(response);
				}
			});			
			ListarTurnos();
			}						
		});
		$("#modificarturnos").click(function TurnosModificar(){
			var preg= confirm("¿Desea modificar el registro?");
			if(preg== true){
			$.ajax({
				method: "POST",
				url: "modificarturnos.php",				
				data: $('#FormTurnos').serialize(),
				dataType: "text",
				success: function(response){
					alert(response);
				}
			});
			ListarTurnos();			
			}
		});
	ListarTurnos();
});