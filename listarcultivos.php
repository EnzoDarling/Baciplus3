<?php
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$result=mysql_query("SELECT * FROM cultivos",$con) or die ("Problemas al mostrar los datos:".mysql_error());
	echo "<table border='1' class='Lista-tabla'>
		<tr>
		<td align=center><b>Nº Cultivo</b></td>
		<td align=center><b>Fecha 1º Lectura</b></td>
		<td align=center><b>1º Lectura</b></td>
		<td align=center><b>Fecha 2º Lectura</b></td></td>
		<td align=center><b>2º Lectura</b></td></td>
		<td align=center><b>Solic. Cultivo </b></td></td>
		<td align=center><b>Resultado</b></td></td>
		<td align=center><b>Nº Muestra</b></td></td>";

	while ($data = mysql_fetch_row($result)) {
		echo "<tr contenteditable>";
		echo "<td>$data[0]</td>";
		echo "<td>$data[1]</td>";
		echo "<td>$data[2]</td>";
		echo "<td>$data[3]</td>";
		echo "<td>$data[4]</td>";
		echo "<td>$data[5]</td>";
		echo "<td>$data[6]</td>";
		echo "<td>$data[7]</td>";
		echo "</tr>";
	}
?>