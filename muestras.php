<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all"> 
</head>  
<body>
<?php
	$cn = mysql_connect("localhost", "root", "") or die("Problemas en la conexión");
	$db = mysql_select_db("baciplus", $cn) or die ("Problemas en la selección de la base de datos");
	$var="";
	$var1="";
	$var2="";
	$var3="";  
		if(isset($_POST["B1"]))
			{
				$B1=$_POST["B1"];
				$buscar=$_POST["num_muestra"];
				//---------------------------------------------------------------BUSCAR--------------------------------------------------------------
				if($B1=="Buscar"){
					$sql="SELECT * FROM muestra WHERE num_muestra='$buscar' ORDER BY num_muestra ASC";
					$cs=mysql_query($sql,$cn) or die ("Problemas en ingresar los datos a la BD");
					echo'<center><strong>Datos encontrados en Muestras</strong></center>';
					echo"<center>
					<table border='3'>
					<tr>
						<td>Numero de Muestra</td>
						<td>Lectura</td>
						<td>Tipo de Muestra</td>
						<td>Solicitud de Cultivo</td>
						<td>Numero de Orden</td>
						<td>Numero de Cultivo</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$num_muestra=$resul[0];
						$lectura=$resul[1];
						$tipo_muestra=$resul[2];
						$sol_cultivo=$resul[3];
						$num_orden=$resul[4];
						$num_cultivo=$resul[5];
						echo "<tr>
						<td><center>$num_muestra</center></td>
						<td><center>$lectura</center></td>
						<td><center>$tipo_muestra</center></td>
						<td><center>$sol_cultivo</center></td>
						<td><center>$num_orden</center></td>
						<td><center>$num_cultivo</center></td>
						</tr>";
						}
						echo "</table>
						</center>";
				}
				//if($B1=="Nuevo"){
				//	$sql="SELECT COUNT(num_orden),Max(num_orden) from ordenes";
				//	$cs=mysql_query($sql,$cn);
				//	while ($resul=mysql_fetch_array($cs)) {
				//		$count=$resul[0];
				//		$max=$resul[1];
				//	}
				//	if($count==0){
				//		$var="A0001";
				//	}
				//	else{
				//		$var='A'.substr((substr($max,1)+10001),1);
				//	}
				//}
				//-------------------------------------------------------------------INSERTAR-----------------------------------------------------
				if($B1=="Insertar"){
					$num_muestra = $_POST["num_muestra"];
					$lectura = $_POST["lectura"];
					$tipo_muestra = $_POST["tipo_muestra"];  
					$sol_cultivo = $_POST["sol_cultivo"];
					$num_orden = $_POST["num_orden"];
					$num_cultivo = $_POST["num_cultivo"];
					$sql="INSERT INTO muestra VALUES ('$_REQUEST[num_muestra]','$_REQUEST[lectura]','$_REQUEST[tipo_muestra]','$_REQUEST[sol_cultivo]','$_REQUEST[num_orden]','$_REQUEST[num_cultivo]')";
					$cs=mysql_query($sql,$cn) or die ("Problemas en agregar los datos a la BD:".mysql_error());
					echo "<center>Se insertaron los datos correctamente.</center>";
				}
				//-------------------------------------------------------------------MODIFICAR------------------------------------------------------
				if($B1=="Modificar"){
					$num_muestra = $_POST["num_muestra"];
					$lectura = $_POST["lectura"];
					$tipo_muestra = $_POST["tipo_muestra"];  
					$sol_cultivo = $_POST["sol_cultivo"];
					$num_orden = $_POST["num_orden"];
					$num_cultivo = $_POST["num_cultivo"];
					$sql="UPDATE muestra SET lectura='$lectura',tipo_muestra='$tipo_muestra',sol_cultivo='$sol_cultivo',num_orden='$num_orden',num_cultivo='$num_cultivo' WHERE num_muestra='$num_muestra'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en modificar los datos a la BD");
					echo "<center>Se actualizo correctamente</center>";
				}
				//-------------------------------------------------------------------ELIMINAR-------------------------------------------------------
				if($B1=="Eliminar"){
					$dni=$_POST["dni"];
					$sql="DELETE FROM muestra WHERE num_muestra='$num_muestra'";
					$cs=mysql_query($sql,$cn) or die ("Problemas al eliminar los datos");
					echo "<center>Se elimino correctamente</center>";
				}
				//-------------------------------------------------------------------LISTAR---------------------------------------------------------
				if($B1=="Listar"){
				$sql="select * from muestra ORDER BY num_muestra ASC";
					$cs=mysql_query($sql,$cn) or die ("Problemas en buscar los datos");
					echo "<center>Muestras</center>";
					echo"<center>
					<table border='3'>
					<tr>
						<td>Numero de Muestra</td>
						<td>Lectura</td>
						<td>Tipo de Muestra</td>
						<td>Solicitud de Cultivo</td>
						<td>Numero de Orden</td>
						<td>Numero de Cultivo</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$num_muestra=$resul[0];
						$lectura=$resul[1];
						$tipo_muestra=$resul[2];
						$sol_cultivo=$resul[3];
						$num_orden=$resul[4];
						$num_cultivo=$resul[5];
						echo "<tr>
						<td><center>$num_muestra</center></td>
						<td><center>$lectura</center></td>
						<td><center>$tipo_muestra</center></td>
						<td><center>$sol_cultivo</center></td>
						<td><center>$num_orden</center></td>
						<td><center>$num_cultivo</center></td>
						</tr>";
					}
					echo "</table>
						</center>";
				}
			}
?><br>
<center><a href="Muestras.html"><input id='botones' type="submit" value="Atras" name="B1"></a></center>
</body>
</head>