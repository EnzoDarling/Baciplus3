<?php
include("conexion.php");
mysql_select_db("baciplus",$con);
if(isset($_POST['num_informe'])){
	$num_informe= $_POST['num_informe'];
} else{
	$num_informe= "";
}
$sql="DELETE FROM informes WHERE num_informe='$num_informe'";
$resultado= mysql_query($sql);
if($resultado){
	echo "Se eliminó/naron los datos";
} else {
	echo mysql_error();
}
?>