<?php
include("conexion.php");
mysql_select_db("baciplus",$con);
if(isset($_POST['numeroficha'])){
	$numficha= $_POST['numeroficha'];
} else{
	$numficha= "";
}
$sql="DELETE FROM vacunas WHERE numeroficha='$numficha'";
$resultado= mysql_query($sql);
if($resultado){
	echo "Se eliminó/naron los datos";
} else {
	echo mysql_error();
}
?>