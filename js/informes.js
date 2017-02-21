$(document).ready(function(){
function ListarInformes(){
			$.ajax({
				type: "GET",
				url: "listarinformes.php",
				dataType: "html",
				success: function(response){
					$("#Informes-datos").html(response);					
				}
			});
		}
	function InformesLimpiar(){
		var inforform= document.getElementById("FormInformes");
		inforform.reset();
	}
	ListarInformes();
	InformesLimpiar();
		$('#buscarinforme').keyup(function(){
			var numinfor= $(this).val();
			if(numinfor !=''){
				$.ajax({
					url: "buscarinformes.php",
					method: "POST",
					data:{search:numinfor},
					dataType: "text",
					success: function(data){
						$('#Informes-datos').html(data);
					}
				});
			} else {
				ListarInformes();
			}
		});
	$("#guardarinformes").click(function InformesGuardar(){
			$.ajax({
				method: "POST",
				url: "guardarinformes.php",				
				data: $('#FormInformes').serialize(),
				dataType: "text",
				success: function(response){
					alert(response);
				}
			});
			ListarInformes();
			InformesLimpiar();
		});

	$("#modificarinformes").click(function InformesModificar(){
			if (document.getElementById("num_informe").value==null || document.getElementById("num_informe").value=="" || document.getElementById("fecha").value==null || document.getElementById("fecha").value=="" || document.getElementById("num_muestra").value==null || document.getElementById("num_muestra").value=="" || document.getElementById("tipo_muestra").value=="Seleccione" || document.getElementById("sol_cultivo").value=="Seleccione" || document.getElementById("primera_lectura").value=="Seleccione" || document.getElementById("fecha_segunda_lectura").value==null || document.getElementById("fecha_segunda_lectura").value=="" || document.getElementById("fecha_primera_lectura").value==null || document.getElementById("fecha_primera_lectura").value=="" || document.getElementById("segunda_lectura").value=="Seleccione") {
				alert("Existen campos vacios, debe rellenar los campos para modificar un registro");
			} else {				
			var preg= confirm("¿Desea modificar el registro?");
			if(preg== true){
			$.ajax({
				method: "POST",
				url: "modificarinformes.php",				
				data: $('#FormInformes').serialize(),
				dataType: "text",
				success: function(response){
					alert(response);
				}
			});
			ListarInformes();
			InformesLimpiar();						
			}
			}
		});
	$("#eliminarinformes").click(function InformesEliminar(){
		if (document.getElementById("num_informe").value==null || document.getElementById("num_informe").value=="") {
				alert("El Nº de Informe se encuentra vacío, debe ingresar un número de informe para eliminar un registro");
		} else {			
			var status = $("#num_informe").val();
			var preg= confirm("¿Desea eliminar el registro?");
			if(preg== true){				
			$.ajax({
				method: "POST",
				url: "eliminarinformes.php",
				data: {'num_informe': status},
				dataType: "text",
				success: function(response){
					alert(response);
				}
			});			
			ListarInformes();
			InformesLimpiar();			
			}						
		}
		});
});