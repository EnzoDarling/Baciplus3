$(document).ready(function(){
	function ListarCultivos(){
		alert('Esta página es un Demo, contacte al administrador para más información.');
	}
	ListarCultivos();
 // function ListarCultivos(){
	// 		$.ajax({
	// 			type: "GET",
	// 			url: "listarcultivos.php",
	// 			dataType: "html",
	// 			success: function(response){
	// 				$("#Cultivos-datos").html(response);					
	// 			}
	// 		});
	// 	}
	// function CultivosLimpiar(){
	// 	var cultform= document.getElementById("FormCultivos");
	// 	cultform.reset();
	// }
	// ListarCultivos();
	// CultivosLimpiar();
	// $("#cult_buscar").keyup(function(){
	// 	var valor=$(this).val();
	// 	if(valor !=''){
	// 	$.ajax({
	// 			url: "buscarcultivos.php",
	// 			method: "POST",
	// 			data:{search:valor},
	// 			dataType: "text",
	// 			success: function(data){
	// 				$("#Cultivos-datos").html(data);
	// 			}
	// 		});	
	// 	} else {
	// 		ListarCultivos();
	// 		CultivosLimpiar();			
	// 	}
	// });
	// $("#guardarcultivos").click(function CultivosGuardar(){
	// 	$.ajax({
	// 		method: "POST",
	// 		url: "guardarcultivos.php",				
	// 		data: $('#FormCultivos').serialize(),
	// 		dataType: "text",
	// 		success: function(response){
	// 			alert(response);
	// 			ListarCultivos();
	// 			CultivosLimpiar();
	// 		}
	// 	});
	// });
	// $("#eliminarcultivos").click(function CultivosEliminar(){
	// 	if (document.getElementById("num_cultivo").value==null || document.getElementById("num_cultivo").value=="") {
	// 		alert("El Nº de cultivo se encuentra vacio, debe ingresar un Nº de cultivo para eliminar un registro");
	// 	} else {			
	// 		var status = $("#num_cultivo").val();
	// 		var preg= confirm("¿Desea eliminar el registro?");
	// 		if(preg== true){				
	// 		$.ajax({
	// 			method: "POST",
	// 			url: "eliminarcultivos.php",
	// 			data: {'num_cultivo': status},
	// 			dataType: "text",
	// 			success: function(response){
	// 				alert(response);
	// 			}
	// 		});			
	// 		ListarCultivos();
	// 		CultivosLimpiar();
	// 		}						
	// 	}
	// 	});
	// 	$("#modificarcultivos").click(function CultivosModificar(){
	// 		if (document.getElementById("num_cultivo").value== null || document.getElementById("num_cultivo").value== "" || document.getElementById("fecha_primera_lectura").value== null || document.getElementById("fecha_primera_lectura").value== "" || document.getElementById("primera_lectura").value== "Seleccione" || document.getElementById("fecha_segunda_lectura").value== null || document.getElementById("fecha_segunda_lectura").value== "" || document.getElementById("segunda_lectura").value== "Seleccione" || document.getElementById("resultado").value== "Seleccione" || document.getElementById("num_muestra").value==null || document.getElementById("num_muestra").value=="" || document.getElementById("sol_cultivo").value== "Seleccione") {
	// 			alert("Existen campos vacios, rellene los campos antes de modificar un registro");
	// 		} else {				
	// 		var preg= confirm("¿Desea modificar el registro?");
	// 		if(preg== true){
	// 		$.ajax({
	// 			method: "POST",
	// 			url: "modificarcultivos.php",				
	// 			data: $('#FormCultivos').serialize(),
	// 			dataType: "text",
	// 			success: function(response){
	// 				alert(response);
	// 			}
	// 		});
	// 		ListarCultivos();
	// 		CultivosLimpiar();			
	// 		}
	// 		}
	// 	});
});