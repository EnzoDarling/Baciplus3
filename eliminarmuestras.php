<?php
include("conexion.php");
mysql_select_db("baciplus",$con);
if(isset($_POST['num_muestra'])){
	$nummuestra= $_POST['num_muestra'];
} else {
	$nummuestra= "";
}
$sql="DELETE FROM muestra WHERE num_muestra='$nummuestra'";
$resultado= mysql_query($sql);
if($resultado){
	echo "Se eliminó/naron los datos";
} else {
	echo mysql_error();
}
?>