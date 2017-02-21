<?php 
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$numorden= $_POST["num_orden"];
	$apellidoorden= $_POST["apellido"];
	$nombreorden= $_POST["nombre"];
	$solcultivoorden= $_POST["sol_cultivo"];
	$sql= "INSERT INTO ordenes VALUES ('$numorden', '$apellidoorden', '$nombreorden', '$solcultivoorden')";
	$result= mysql_query($sql);	
	if($result){
		echo "Se guardaron los datos";
	} else {
		echo mysql_error();
	}
 ?>