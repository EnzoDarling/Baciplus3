<?php
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	if (isset($_POST["numeroficha"])) {
		$numficha= $_POST["numeroficha"];		
	} else {
		$numficha="";
	}
	if (isset($_POST["bcg"])) {
		$vacbcg= $_POST["bcg"];
	} else {
		$vacbcg="";
	}
	if (isset($_POST["cuadruple"])) {
		$vaccuadruple= $_POST["cuadruple"];
	} else {
		$vaccuadruple="";
	}
	if (isset($_POST["tripledpt"])) {
		$vactripledpt= $_POST["tripledpt"];		
	} else {
		$vactripledpt="";
	}
	if (isset($_POST["sabin"])) {
		$vacsabin= $_POST["sabin"];
	} else {
		$vacsabin="";
	}
	if (isset($_POST["tripleviral"])) {
		$vactripleviral= $_POST["tripleviral"];
	} else {
		$vactripleviral="";
	}
	$sql= "UPDATE vacunas SET bcg='$vacbcg', cuadruple='$vaccuadruple', tripledpt='$vactripledpt', sabin='$vacsabin', tripleviral='$vactripleviral' WHERE numeroficha='$numficha'";
	$result= mysql_query($sql);	
	if($result){
		echo "Se modificaron los datos";
	} else {
		echo mysql_error();
	}
?>