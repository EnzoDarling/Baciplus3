<?php
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	if(isset($_POST["num_muestra"])){
		$nummuestra= $_POST["num_muestra"];
	} else{
		$nummuestra= "";
	}
	if (isset($_POST["lectura"])) {
		$lecturamue= $_POST["lectura"];		
	} else {
		$lecturamue= "";
	}
	if (isset($_POST["tipo_muestra"])) {
		$tipomuestra= $_POST["tipo_muestra"];
	} else {
		$tipomuestra= "";
	}
	if (isset($_POST["sol_cultivo"])) {
		$solcultivo= $_POST["sol_cultivo"];
	} else {
		$solcultivo="";
	}
	if (isset($_POST["num_orden"])) {
		$numorden= $_POST["num_orden"];		
	} else {
		$numorden="";
	}
	if (isset($_POST["num_cultivo"])) {
		$numcultivo= $_POST["num_cultivo"];		
	} else {
		$numcultivo="";
	}	
	$sql= "UPDATE muestra SET lectura='$lecturamue', tipo_muestra='$tipomuestra', sol_cultivo='$solcultivo', num_orden='$numorden', num_cultivo='$numcultivo' WHERE num_muestra='$nummuestra'";
	$result= mysql_query($sql);	
	if($result){
		echo "Se modificaron los datos";
	} else {
		echo mysql_error();
	}
?>