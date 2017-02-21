<?php 
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$numinforme= $_POST["num_informe"];
	$fechainfome= $_POST["fecha"];
	$nummuestra= $_POST["num_muestra"];
	$tipomuestra= $_POST["tipo_muestra"];
	$solcultivo= $_POST["sol_cultivo"];
	$fechaprimlectura= $_POST["fecha_primera_lectura"];
	$primlecura= $_POST["primera_lectura"];
	$fechaseglectura= $_POST["fecha_segunda_lectura"];
	$seglectura= $_POST["segunda_lectura"];
	$sql= "INSERT INTO informes VALUES ('$numinforme', '$fechainfome', '$nummuestra', '$tipomuestra', '$solcultivo', '$fechaprimlectura', '$primlecura', '$fechaseglectura', '$seglectura')";
	$result= mysql_query($sql);	
	if($result){
		echo "Se agregaron los datos";
	} else {
		echo mysql_error();
	}
 ?>