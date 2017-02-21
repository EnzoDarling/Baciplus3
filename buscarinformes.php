<?php
	include("conexion.php");
	mysql_select_db("baciplus",$con);
	if (isset($_POST["search"])) {
		$businforme= $_POST["search"];
	} else {
		$businforme="";
	}
	
	$result=mysql_query("SELECT * FROM informes WHERE num_informe LIKE '%".$businforme."%'",$con) or die ("Problemas al mostrar los datos:".mysql_error());
	echo "<table border='1' class='Lista-tabla'>
		<tr>
		<td align=center><b>Nº Informe</b></td>
		<td align=center><b>Fecha</b></td>
		<td align=center><b>Nº Muestra</b></td>
		<td align=center><b>Tipo Muestra</b></td></td>
		<td align=center><b>Solc. Cultivo</b></td></td>
		<td align=center><b>Fecha 1º lectura </b></td></td>
		<td align=center><b>1º Lectura</b></td></td>
		<td align=center><b>Fecha 2º lectura</b></td></td>
		<td align=center><b>2º lectura</b></td></td>";

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
		echo "<td>$data[8]</td>";
		echo "</tr>";
	}
?>