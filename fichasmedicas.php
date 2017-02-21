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
					$sql="SELECT * FROM fichamedica WHERE numeroficha='$buscar'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en ingresar los datos a la BD");
					echo'<center><strong>Datos encontrados en Fichas Medicas</strong></center>';
					echo"<center>
					<table border='3'>
					<tr>
						<td>Numero Ficha</td>
						<td>ID Turno</td>
						<td>ID Analisis</td>
						<td>Apto Fisico</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$numeroficha=$resul[0];
						$id_turno=$resul[1];
						$id_analisis=$resul[2];
						$aptofisico=$resul[3];
						echo "<tr>
						<td><center>$numeroficha</center></td>
						<td><center>$id_turno</center></td>
						<td><center>$id_analisis</center></td>
						<td><center>$aptofisico</center></td>
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
					$id_turno = $_POST["id_turno"];  
					$id_analisis = $_POST["id_analisis"];  
					$aptofisico = $_POST["aptofisico"];
					$sql="INSERT INTO fichamedica VALUES ('$_REQUEST[numeroficha]','$_REQUEST[id_turno]','$_REQUEST[id_analisis]','$_REQUEST[aptofisico]')";
					$cs=mysql_query($sql,$cn) or die ("Problemas en agregar los datos a la BD:".mysql_error());
					echo "<center>Se insertaron los datos correctamente.</center>";
				}
				//-------------------------------------------------------------------MODIFICAR------------------------------------------------------
				if($B1=="Modificar"){
					$numeroficha = $_POST["numeroficha"];  
					$id_turno = $_POST["id_turno"];  
					$id_analisis = $_POST["id_analisis"];  
					$aptofisico = $_POST["aptofisico"];
					$sql="UPDATE fichamedica SET id_turno='$id_turno',id_analisis='$id_analisis',aptofisico='$aptofisico' WHERE numeroficha='$numeroficha'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en modificar los datos a la BD");
					echo "<center>Se actualizo correctamente</center>";
				}
				//-------------------------------------------------------------------ELIMINAR-------------------------------------------------------
				if($B1=="Eliminar"){
					$numeroficha=$_POST["numeroficha"];
					$sql="DELETE FROM fichamedica WHERE numeroficha='$numeroficha'";
					$cs=mysql_query($sql,$cn) or die ("Problemas al eliminar los datos");
					echo "<center>Se elimino correctamente</center>";
				}
				//-------------------------------------------------------------------LISTAR---------------------------------------------------------
				if($B1=="Listar"){
				$sql="select * from fichamedica";
					$cs=mysql_query($sql,$cn) or die ("Problemas en buscar los datos");
					echo "<center>Fichas Medicas</center>";
					echo"<center>
					<table border='3'>
					<tr>
						<td>Numero Ficha</td>
						<td>ID Turno</td>
						<td>ID Analisis</td>
						<td>Apto Fisico</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$numeroficha=$resul[0];
						$id_turno=$resul[1];
						$id_analisis=$resul[2];
						$aptofisico=$resul[3];
						echo "<tr>
						<td><center>$numeroficha</center></td>
						<td><center>$id_turno</center></td>
						<td><center>$id_analisis</center></td>
						<td><center>$aptofisico</center></td>
						</tr>";
					}
					echo "</table>
						</center>";
				}
			}
?><br>
<center><a href='Fichas Medicas.html'><input id='botones' type="submit" value="Atras" name="B1"></a></center>
</body>  

</html> 
