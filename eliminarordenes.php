<?php
include("conexion.php");
mysql_select_db("baciplus",$con);
if (isset($_POST['num_orden'])) {
$numorden= $_POST['num_orden'];	
} else {
	$numorden="";
}
$sql="DELETE FROM ordenes WHERE num_orden='$numorden'";
$resultado= mysql_query($sql);
if($resultado){
	echo "Se eliminó/naron los datos";
} else {
	echo mysql_error();
}
?>