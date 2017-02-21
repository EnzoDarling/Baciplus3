$(document).ready(function(){
	function ListarMuestras(){
		$.ajax({
				type: "GET",
				url: "listarmuestras.php",
				dataType: "html",
				success: function(response){
					$("#Muestras-datos").html(response);					
				}
			});
		}
		ListarMuestras();
		$("#mues_buscar").keyup(function(){
			var valor=$(this).val();
			if(valor != ''){
				$.ajax({
				url: "buscarmuestras.php",
				method: "POST",
				data:{search:valor},
				dataType: "text",
				success: function(data){
					$("#Muestras-datos").html(data);
				}
			});
			} else{
				ListarMuestras();
			}
		});
		$("#guardarmuestras").click(function MuestrasGuardar(){
			$.ajax({
				method: "POST",
				url: "guardarmuestras.php",				
				data: $('#FormMuestras').serialize(),
				dataType: "text",
				success: function(response){
					alert(response);
				}
			});
			ListarMuestras();
		});
		$("#eliminarmuestras").click(function MuestrasEliminar(){
			if (document.getElementById("num_muestra").value== null || document.getElementById("num_muestra").value=="") {
				alert("Existen campos vacios, debe rellenar los campos para eliminar un registro");
			} else {				
				var status = $("#num_muestra").val();
				var preg= confirm("¿Desea eliminar el registro?");
				if(preg== true){				
					$.ajax({
						method: "POST",
						url: "eliminarmuestras.php",
						data: {'num_muestra': status},
						dataType: "text",
						success: function(response){
							alert(response);
						}
					});			
				}
				ListarMuestras();
			}
		});
		$("#modificarmuestras").click(function MuestrasModificar(){
			if (document.getElementById("num_muestra").value==null || document.getElementById("num_muestra").value=="" || document.getElementById("num_orden").value==null || document.getElementById("num_orden").value=="" || document.getElementById("num_cultivo").value==null || document.getElementById("num_cultivo").value=="" || document.getElementById("lectura").value=="Seleccione" || document.getElementById("sol_cultivo").value=="Seleccione" || document.getElementById("tipo_muestra").value=="Seleccione"){
				alert("Existen campos vacios, debe rellenar los campos antes de modificar un registro");
			} else {
				var preg= confirm("¿Desea modificar el registro?");
				if(preg== true){
					$.ajax({
						method: "POST",
						url: "modificarmuestras.php",				
						data: $('#FormMuestras').serialize(),
						dataType: "text",
						success: function(response){
							alert(response);
						}
					});
				}
				ListarMuestras();
			}
		});
		ListarMuestras();		
});