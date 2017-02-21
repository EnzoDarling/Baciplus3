$(document).ready(function(){
	function ListarVacunas(){
		$.ajax({
			type: "GET",
			url: "listarvacunas.php",
			dataType: "html",
			success: function(response){
				$("#Vacunas-datos").html(response);					
			}
		});		
	}
	ListarVacunas();
	function Limpiar(){
		var vacform= document.getElementById("FormVacunas");
		vacform.reset();
	}
	$("#vac_buscar").keyup(function(){
		var valor= $(this).val();
		if(valor !=''){
			$.ajax({
				url: "buscarvacunas.php",
				method: "POST",
				data:{search:valor},
				dataType: "text",
				success: function(data){
					$("#Vacunas-datos").html(data);
					Limpiar();
				}
			});
		} else{
			ListarVacunas();
		}
	});
	$("#guardarvacunas").click(function VacunasGuardar(){
			$.ajax({
				method: "POST",
				url: "guardarvacunas.php",				
				data: $('#FormVacunas').serialize(),
				dataType: "text",
				success: function(response){
					alert(response);
					ListarVacunas();
					Limpiar();
				}
			});
		});
	$("#eliminarvacunas").click(function VacunasEliminar(){
			var status = $("#numeroficha").val();
			if(document.getElementById('numeroficha').value == null || document.getElementById('numeroficha').value == ""){				
				alert("Existen campos vacios, complete los campos antes de eliminar un registro");
			} else {
				var preg= confirm("¿Desea eliminar el registro?");
				if(preg== true){				
					$.ajax({
						method: "POST",
						url: "eliminarvacunas.php",
						data: {'numeroficha': status},
						dataType: "text",
						success: function(response){
							alert(response);
							ListarVacunas();
							Limpiar();
						}
					});			
				}
			}
		});
		$("#modificarvacunas").click(function VacunasModificar(){
			if (document.getElementById('numeroficha').value==null || document.getElementById('numeroficha').value=="" || document.getElementById('bcg').value==null || document.getElementById('bcg').value=="" || document.getElementById('cuadruple').value==null || document.getElementById('cuadruple').value=="" || document.getElementById('tripledpt').value==null || document.getElementById('tripledpt').value=="" || document.getElementById('sabin').value==null || document.getElementById('sabin').value=="" || document.getElementById('tripleviral').value==null || document.getElementById('tripleviral').value=="") {
				alert('Existen campos vacios, complete los campos antes de modificar un registro');
			} else {
				var preg= confirm("¿Desea modificar el registro?");
				if(preg== true){
					$.ajax({
						method: "POST",
						url: "modificarvacunas.php",				
						data: $('#FormVacunas').serialize(),
						dataType: "text",
						success: function(response){
							alert(response);
						}
					});
				}
			}
			ListarVacunas();			
		});
});