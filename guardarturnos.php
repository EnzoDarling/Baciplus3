<?php 
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$idturno= $_POST["id_turno"];
	$apellido= $_POST["apellido"];
	$nombre= $_POST["nombre"];
	$fecha= $_POST["fecha"];
	$hora= $_POST["hora"];
	$sql= "INSERT INTO turnos VALUES ('$idturno', '$apellido', '$nombre', '$fecha', '$hora')";
	$result= mysql_query($sql);	
	if($result){
		echo "Se agregaron los datos";
	} else {
		echo mysql_error();
	}
 ?>