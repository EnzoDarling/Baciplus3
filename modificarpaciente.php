<?php
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$dnipaciente= $_POST["dni_paciente"];
	$pacapellido= $_POST["pac_apellido"];
	$pacnombre= $_POST["pac_nombre"];
	$direpaciente= $_POST["dire"];
	$telpaciente= $_POST["telefono"];
	$numordenpaciente= $_POST["num_orden"];		
	$sql= "UPDATE paciente SET  apellido='$pacapellido', nombre='$pacnombre', dire='$direpaciente', telefono='$telpaciente', num_orden='$numordenpaciente' WHERE dni_paciente='$dnipaciente'";
	$result= mysql_query($sql);	
	if($result){
		echo "Se modificaron los datos";
	} else {
		echo mysql_error();
	}
?>