<?php
	$con=mysql_connect("localhost","root","");
	if (!$con) {
		die('No se pudo conectar:' . mysql_error());
	}
?>