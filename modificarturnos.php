<?php
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	if (isset($_POST["id_turno"])) {
		$idturno= $_POST["id_turno"];		
	} else {
		$idturno="";
	}
	if (isset($_POST["apellido"])) {
	$apellidoturn= $_POST["apellido"];
	} else {
		$apellidoturn="";
	}
	if (isset($_POST["nombre"])) {
	$nombreturn= $_POST["nombre"];
	} else {
		$nombreturn="";
	}
	if (isset($_POST["fecha"])) {
		$fechaturn= $_POST["fecha"];		
	} else {
		$fechaturn="";
	}
	if (isset($_POST["hora"])) {
	$horaturn= $_POST["hora"];
	} else {
		$horaturn="";
	}
	$sql= "UPDATE turnos SET apellido='$apellidoturn', nombre='$nombreturn', fecha='$fechaturn', hora='$horaturn' WHERE id_turno='$idturno'";
	$result= mysql_query($sql);	
	if($result){
		echo "Se modificaron los datos";
	} else {
		echo mysql_error();
	}
?>