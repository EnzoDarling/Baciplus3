<?php
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	if (isset($_POST["num_cultivo"])) {
	$numcultivo= $_POST["num_cultivo"];
		} else {
			$numcultivo="";
		}
	if (isset($_POST["fecha_primera_lectura"])) {
		$fechaprimlectura= $_POST["fecha_primera_lectura"];			
		} else {
			$fechaprimlectura="";
		}
	if (isset($_POST["primera_lectura"])) {
		$primlectura= $_POST["primera_lectura"];			
		} else {
			$primlectura="";
		}
	if (isset($_POST["fecha_segunda_lectura"])) {
		$fechaseglectura= $_POST["fecha_segunda_lectura"];
		} else {
			$fechaseglectura="";
		}
	if (isset($_POST["segunda_lectura"])) {
		$seglectura= $_POST["segunda_lectura"];
		} else {
			$seglectura="";
		}
	if (isset($_POST["resultado"])) {
		$cultresultado= $_POST["resultado"];			
		} else {
			$cultresultado="";
		}
	if (isset($_POST["num_muestra"])) {
		$nummuestra= $_POST["num_muestra"];
		} else {
			$nummuestra="";
		}
	if (isset($_POST["sol_cultivo"])) {
		$solcultivo= $_POST["sol_cultivo"];			
		} else {
			$solcultivo="";
		}	
	$sql= "UPDATE cultivos SET fecha_primera_lectura='$fechaprimlectura', primera_lectura='$primlectura', fecha_segunda_lectura='$fechaseglectura', segunda_lectura='$seglectura', sol_cultivo='$solcultivo', resultado='$cultresultado', num_muestra='$nummuestra' WHERE num_cultivo='$numcultivo'";
	$result= mysql_query($sql);	
	if($result){
		echo "Se modificaron los datos";
	} else {
		echo mysql_error();
	}
?>