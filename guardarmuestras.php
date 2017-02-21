<?php 
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$nummuestra= $_POST["num_muestra"];
	$lecturas= $_POST["lectura"];
	$tipomuestra= $_POST["tipo_muestra"];
	$soliccultivo= $_POST["sol_cultivo"];
	$numorden= $_POST["num_orden"];
	$numcultivo= $_POST["num_cultivo"];
	$sql= "INSERT INTO muestra VALUES ('$nummuestra', '$lecturas', '$tipomuestra', '$soliccultivo', '$numorden', '$numcultivo')";
	$result= mysql_query($sql);	
	if($result){
		echo "Se agregaron los datos";
	} else {
		echo mysql_error();
	}
 ?>