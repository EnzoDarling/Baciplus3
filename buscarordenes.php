<?php
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$result=mysql_query("SELECT * FROM ordenes WHERE num_orden LIKE '%".$_POST["search"]."%'",$con) or die ("Problemas al mostrar los datos:".mysql_error());
	echo "<table border='1' class='Lista-tabla'>
		<tr>
		<td align=center><b>Nº Orden</b></td>
		<td align=center><b>Apellido</b></td>
		<td align=center><b>Nombre</b></td>
		<td align=center><b>Solc. Cultivo</b></td></td>";

	while ($data = mysql_fetch_row($result)) {
		echo "<tr contenteditable>";
		echo "<td>$data[0]</td>";
		echo "<td>$data[1]</td>";
		echo "<td>$data[2]</td>";
		echo "<td>$data[3]</td>";
		echo "</tr>";
	}
?>