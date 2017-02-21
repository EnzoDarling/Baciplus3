<?php 
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$numficha= $_POST["numeroficha"];
	$vacbcg= $_POST["bcg"];
	$vaccuadruple= $_POST["cuadruple"];
	$vactripledpt= $_POST["tripledpt"];
	$vacsabin= $_POST["sabin"];
	$vactripleviral= $_POST["tripleviral"];	
	$sql= "INSERT INTO vacunas VALUES ('$numficha', '$vacbcg', '$vaccuadruple', '$vactripledpt', '$vacsabin', '$vactripleviral')";
	$result= mysql_query($sql);	
	if($result){
		echo "Se agregaron los datos";
	} else {
		echo mysql_error();
	}
 ?>