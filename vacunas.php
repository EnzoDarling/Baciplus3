<html>  

<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<title>Guardamos los datos en la base de datos</title>  
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
				$buscar=$_POST["numeroficha"];
				//---------------------------------------------------------------BUSCAR--------------------------------------------------------------
				if($B1=="Buscar"){
					$sql="SELECT * FROM vacunas WHERE numeroficha='$buscar'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en ingresar los datos a la BD");
					echo'<center><strong>Datos encontrados en Vacunas</strong></center>';
					echo"<center>
					<table border='3'>
					<tr>
						<td><center>Numero Ficha</center></td>
						<td><center>BCG</center></td>
						<td><center>Cuadruple</center></td>
						<td><center>Triple DPT</center></td>
						<td><center>Sabin</center></td>
						<td><center>Triple Viral</center></td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$numeroficha=$resul[0];
						$bcg=$resul[1];
						$cuadruple=$resul[2];
						$tripledpt=$resul[3];
						$sabin=$resul[4];
						$tripleviral=$resul[5];
						echo "<tr>
						<td><center>$numeroficha</center></td>
						<td><center>$bcg</center></td>
						<td><center>$cuadruple</center></td>
						<td><center>$tripledpt</center></td>
						<td><center>$sabin</center></td>
						<td><center>$tripleviral</center></td>
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
					$numeroficha = $_POST["numeroficha"];  
					$bcg = $_POST["bcg"];  
					$cuadruple = $_POST["cuadruple"];  
					$tripledpt = $_POST["tripledpt"];
					$sabin = $_POST["sabin"];
					$tripleviral = $_POST["tripleviral"];
					$sql="INSERT INTO vacunas VALUES ('$_REQUEST[numeroficha]','$_REQUEST[bcg]','$_REQUEST[cuadruple]','$_REQUEST[tripledpt]','$_REQUEST[sabin]','$_REQUEST[tripleviral]')";
					$cs=mysql_query($sql,$cn) or die ("Problemas en agregar los datos a la BD:".mysql_error());
					echo "<center>Se insertaron los datos correctamente.</center>";
				}
				//-------------------------------------------------------------------MODIFICAR------------------------------------------------------
				if($B1=="Modificar"){
					$numeroficha = $_POST["numeroficha"];  
					$bcg = $_POST["bcg"];  
					$cuadruple = $_POST["cuadruple"];  
					$tripledpt = $_POST["tripledpt"];
					$sabin = $_POST["sabin"];
					$tripleviral = $_POST["tripleviral"];
					$sql="UPDATE vacunas SET bcg='$bcg',cuadruple='$cuadruple',tripledpt='$tripledpt',sabin='$sabin',tripleviral='$tripleviral' WHERE numeroficha='$numeroficha'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en modificar los datos a la BD");
					echo "<center>Se actualizo correctamente</center>";
				}
				//-------------------------------------------------------------------ELIMINAR-------------------------------------------------------
				if($B1=="Eliminar"){
					$numeroficha=$_POST["numeroficha"];
					$sql="DELETE FROM vacunas WHERE numeroficha='$numeroficha'";
					$cs=mysql_query($sql,$cn) or die ("Problemas al eliminar los datos");
					echo "<center>Se elimino correctamente</center>";
				}
				//-------------------------------------------------------------------LISTAR---------------------------------------------------------
				if($B1=="Listar"){
				$sql="select * from vacunas";
					$cs=mysql_query($sql,$cn) or die ("Problemas en buscar los datos");
					echo "<center><strong>Vacunas</strong></center>";
					echo"<center>
					<table border='3'>
					<tr>
						<td>Numero de Ficha</td>
						<td>BCG</td>
						<td>Cuadruple</td>
						<td>Triple DTP</td>
						<td>Sabin</td>
						<td>Triple Viral</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$numeroficha=$resul[0];
						$bcg=$resul[1];
						$cuadruple=$resul[2];
						$tripledpt=$resul[3];
						$sabin=$resul[4];
						$tripleviral=$resul[5];
						echo "<tr>
						<td><center>$numeroficha</center></td>
						<td><center>$bcg</center></td>
						<td><center>$cuadruple</center></td>
						<td><center>$tripledpt</center></td>
						<td><center>$sabin</center></td>
						<td><center>$tripleviral</center></td>
						</tr>";
					}
					echo "</table>
						</center>";
				}
			}
?>
<br>
<center><a href='Vacunas.html'><input id='botones' type="submit" value="Atras" name="B1"></a></center>
</body>
</html> 
