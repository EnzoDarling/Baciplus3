<?php 
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$numcultivo= $_POST["num_cultivo"];
	$fechaprimlectura= $_POST["fecha_primera_lectura"];	
	$primlectura= $_POST["primera_lectura"];
	$fechaseglectura= $_POST["fecha_segunda_lectura"];
	$seglectura= $_POST["segunda_lectura"];
	$cultresultado= $_POST["resultado"];
	$nummuestra= $_POST["num_muestra"];
	$solcultivo= $_POST["sol_cultivo"];
	$sql= "INSERT INTO cultivos VALUES ('$numcultivo', '$fechaprimlectura', '$primlectura', '$fechaseglectura', '$seglectura', '$cultresultado', '$nummuestra', '$solcultivo')";
	$result= mysql_query($sql);	
	if($result){
		echo "Se agregaron los datos";
	} else {
		echo mysql_error();
	}
 ?>