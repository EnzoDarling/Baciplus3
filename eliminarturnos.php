<?php
include("conexion.php");
mysql_select_db("baciplus",$con);
if(isset($_POST['id_turno'])){
	$idturno= $_POST['id_turno'];
} else{
	$idturno= "";
}
$sql="DELETE FROM turnos WHERE id_turno='$idturno'";
$resultado= mysql_query($sql);
if($resultado){
	echo "Se eliminó/naron los datos";
} else {
	echo mysql_error();
}
?>