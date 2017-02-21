<?php 
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$dnipaciente= $_POST["dni_paciente"];
	$pacapellido= $_POST["pac_apellido"];
	$pacnombre= $_POST["pac_nombre"];
	$direpaciente= $_POST["dire"];
	$telpaciente= $_POST["telefono"];
	$numordenpaciente= $_POST["num_orden"];
	$sql= "INSERT INTO paciente VALUES ('$dnipaciente', '$pacapellido','$pacnombre','$direpaciente', '$telpaciente', '$numordenpaciente')";
	$result= mysql_query($sql);	
	if($result){
		echo "Se agregaron los datos";
	} else {
		echo mysql_error();
	}
 ?>