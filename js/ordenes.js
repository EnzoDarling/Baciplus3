$(document).ready(function(){
	function ListarOrdenes(){
		$.ajax({
				type: "GET",
				url: "listarordenes.php",
				dataType: "html",
				success: function(response){
					$("#Ordenes-datos").html(response);					
				}
			});
		}
	function OrdenesLimpiar(){
		var vacform= document.getElementById("FormOrdenes");
		vacform.reset();
	}	
	$("#ord_buscar").keyup(function(){
		var valor= $(this).val();
		if(valor !=''){
			$.ajax({
				url: "buscarordenes.php",
				method: "POST",
				data:{search:valor},
				dataType: "text",
				success: function(data){
					$("#Ordenes-datos").html(data);
				}
			});
		} else{
			ListarOrdenes();				
		}
	});
	$("#guardarordenes").click(function GuardarOrdenes(){
			$.ajax({
				method: "POST",
				url: "guardarordenes.php",				
				data: $('#FormOrdenes').serialize(),
				dataType: "text",
				success: function(response){
					alert(response);
					OrdenesLimpiar();
				}
			});
			ListarOrdenes();
		});
	$("#eliminarordenes").click(function EliminarOrdenes(){
			if (document.getElementById("num_orden").value==null || document.getElementById("num_orden").value=="") {
				alert("Ingrese un número de orden para eliminar un registro");
				OrdenesLimpiar();				
			} else {				
				var status = $("#num_orden").val();			
				var preg= confirm("¿Desea eliminar el registro?");
				if(preg== true){				
				$.ajax({
					method: "POST",
					url: "eliminarordenes.php",
					data: {'num_orden': status},
					dataType: "text",
					success: function(response){
						alert(response);
						OrdenesLimpiar();
					}
				});			
				}
			}
			ListarOrdenes();						
		});
	$("#modificarordenes").click(function ModificarOrdenes(){				
			if (document.getElementById("num_orden").value==null || document.getElementById("num_orden").value=="" || document.getElementById("apellidorden").value==null || document.getElementById("apellidorden").value=="" || document.getElementById("nombreorden").value==null || document.getElementById("nombreorden").value=="" || document.getElementById("sol_cultivo").value=="Seleccione" || document.getElementById("sol_cultivo").value==null) {
				alert("Existen campos vacios, debe rellenar los campos para modificar un registro");
				OrdenesLimpiar();
			} else {
				var preg= confirm("¿Desea modificar el registro?");
				if(preg== true){
				$.ajax({
					method: "POST",
					url: "modificarordenes.php",				
					data: $('#FormOrdenes').serialize(),
					dataType: "text",
					success: function(response){
						alert(response);
						OrdenesLimpiar();
					}
				});
				ListarOrdenes();			
				}
			}
		// }
	});
	ListarOrdenes();	
});