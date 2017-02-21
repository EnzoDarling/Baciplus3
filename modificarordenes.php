<?php
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$numorden= $_POST["num_orden"];
	$apellidoorden= $_POST["apellido"];
	$nombreorden= $_POST["nombre"];
	$solcultivoorden= $_POST["sol_cultivo"];
	$sql= "UPDATE ordenes SET apellido='$apellidoorden', nombre='$nombreorden', sol_cultivo='$solcultivoorden' WHERE num_orden='$numorden'";
	$result= mysql_query($sql);	
	if($result){
		echo "Se ha modificado la orden";
	} else {
		echo mysql_error();
	}
?>