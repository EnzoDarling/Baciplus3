$(document).ready(function(){
		function ListarPacientes(){
			$.ajax({
				type: "GET",
				url: "listar.php",
				dataType: "html",
				success: function(response){
					$("#Pacientes-datos").html(response);					
				}
			});
		}
		$("#pacbuscar").keyup(function(){
			var valor= $(this).val();
			if(valor !='') {
				$.ajax({
					url: "buscarpaciente.php",
					method: "POST",
					data:{search:valor},
					dataType: "text",
					success: function(data){
						$("#Pacientes-datos").html(data);
					}
				});
			} else{
				ListarPacientes();
			}
		});		
		$("#guardarpacientes").click(function GuardarPacientes(){
			$.ajax({
				method: "POST",
				url: "GuardarPacientes.php",				
				data: $('#FormPacientes').serialize(),
				dataType: "text",
				success: function(response){
					alert(response);
				}
			});
			ListarPacientes();
		});
		$("#eliminarpacientes").click(function EliminarPaciente(){
			var status = $("#dni_paciente").val();
			var preg= confirm("¿Desea eliminar el registro?");
			if(preg== true){				
			$.ajax({
				method: "POST",
				url: "eliminarpacientes.php",
				data: {'dni_paciente': status},
				dataType: "text",
				success: function(response){
					alert(response);
				}
			});			
			ListarPacientes();
			}						
		});
		$("#modificarpaciente").click(function ModificarPacientes(){
			var preg= confirm("¿Desea modificar el registro?");
			if(preg== true){
			$.ajax({
				method: "POST",
				url: "modificarpaciente.php",				
				data: $('#FormPacientes').serialize(),
				dataType: "text",
				success: function(response){
					alert(response);
				}
			});
			ListarPacientes();			
			}
		});
		ListarPacientes();		
	});