<?php
include("conexion.php");
mysql_select_db("baciplus",$con);
$dni_paciente= $_POST['dni_paciente'];
$sql="DELETE FROM paciente WHERE dni_paciente='$dni_paciente'";
$resultado= mysql_query($sql);
if($resultado){
	echo "Se eliminó/naron los datos";
} else {
	echo mysql_error();
}
?>