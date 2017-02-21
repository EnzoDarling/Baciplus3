<?php
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	$result=mysql_query("SELECT * FROM vacunas WHERE numeroficha LIKE '%".$_POST["search"]."%'",$con) or die ("Problemas al mostrar los datos:".mysql_error());
	echo "<table border='1' class='Lista-tabla'>
		<tr>
		<td align=center><b>Nº Ficha</b></td>
		<td align=center><b>BCG</b></td>
		<td align=center><b>Cuadruple</b></td>
		<td align=center><b>TripleDBT</b></td></td>
		<td align=center><b>Sabin</b></td></td>
		<td align=center><b>TripleViral</b></td></td>";
	while ($data = mysql_fetch_row($result)) {
		echo "<tr contenteditable>";
		echo "<td>$data[0]</td>";
		echo "<td>$data[1]</td>";
		echo "<td>$data[2]</td>";
		echo "<td>$data[3]</td>";
		echo "<td>$data[4]</td>";		
		echo "<td>$data[5]</td>";				
		echo "</tr>";
	}
?>