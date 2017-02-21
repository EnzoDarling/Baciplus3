<?php
include("conexion.php");
mysql_select_db("baciplus",$con);
if(isset($_POST['num_cultivo'])){
	$num_cultivo= $_POST['num_cultivo'];
} else{
	$num_cultivo= "";
}
$sql="DELETE FROM cultivos WHERE num_cultivo='$num_cultivo'";
$resultado= mysql_query($sql);
if($resultado){
	echo "Se eliminó/naron los datos";
} else {
	echo mysql_error();
}
?>