<?php
	include("conexion.php");
	mysql_select_db("baciplus",$con);	
	$result=mysql_query("SELECT * FROM turnos WHERE apellido LIKE '%".$_POST["search"]."%'",$con) or die ("Problemas al mostrar los datos:".mysql_error());
	echo "<table border='1' class='Lista-tabla'>
		<tr>
		<td align=center><b>Nº Turno</b></td>
		<td align=center><b>Apellido</b></td>
		<td align=center><b>Nombre</b></td>
		<td align=center><b>Fecha</b></td></td>
		<td align=center><b>Hora</b></td></td>";
	while ($data = mysql_fetch_row($result)) {
		echo "<tr>";
		echo "<td>$data[0]</td>";
		echo "<td>$data[1]</td>";
		echo "<td>$data[2]</td>";
		echo "<td>$data[3]</td>";
		echo "<td>$data[4]</td>";		
		echo "</tr>";
	}
?>