<?php
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$result=mysql_query("SELECT * FROM paciente WHERE apellido LIKE '%".$_POST["search"]."%'",$con) or die ("Problemas al mostrar los datos:".mysql_error());
	echo "<table border='1' class='Lista-tabla'>
		<tr>
		<td align=center> <b>DNI</b></td>
		<td align=center><b>Direccion</b></td>
		<td align=center><b>Telefono</b></td>
		<td align=center><b>Num. Orden</b></td></td>";
	while ($data = mysql_fetch_row($result)) {
		echo "<tr contenteditable>";
		echo "<td>$data[0]</td>";
		echo "<td>$data[1]</td>";
		echo "<td>$data[2]</td>";
		echo "<td>$data[3]</td>";
		echo "</tr>";
	}
?>