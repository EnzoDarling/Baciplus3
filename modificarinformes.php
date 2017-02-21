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
	$sql= "UPDATE informes SET fecha='$fechainfome', num_muestra='$nummuestra', tipo_muestra='$tipomuestra', sol_cultivo='$solcultivo', fecha_primera_lectura='$fechaprimlectura', primera_lectura='$primlecura', fecha_segunda_lectura='$fechaseglectura', segunda_lectura='$seglectura' WHERE num_informe='$numinforme'";
	$result= mysql_query($sql);	
	if($result){
		echo "Se modificaron los datos";
	} else {
		echo mysql_error();
	}
?>