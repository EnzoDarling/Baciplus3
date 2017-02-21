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
				$buscar=$_POST["dni_paciente"];
				if($B1=="Buscar"){
					$sql="SELECT * FROM paciente WHERE dni_paciente='$buscar'";
					$cs=mysql_query($sql,$cn) or die ("<center>Problemas en ingresar los datos a la BD</ce");
					echo'<strong><center>Datos encontrados</center></strong>';
					echo"<center>
					<table border='3'>
					<tr>
						<td>DNI</td>
						<td>Direccion</td>
						<td>Telefono</td>
						<td>Numero de Orden</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$dni_paciente=$resul[0];
						$dire=$resul[1];
						$telefono=$resul[2];
						$num_orden=$resul[3];
						echo "<tr>
						<td><center>$dni_paciente</center></td>
						<td><center>$dire</center></td>
						<td><center>$telefono</center></td>
						<td><center>$num_orden</center></td>
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
				if($B1=="Insertar"){
					$dni_paciente = $_POST["dni_paciente"];  
					$dire = $_POST["dire"];  
					$telefono = $_POST["telefono"];  
					$num_orden = $_POST["num_orden"];
					$sql="INSERT INTO paciente VALUES ('$_REQUEST[dni_paciente]','$_REQUEST[dire]','$_REQUEST[telefono]','$_REQUEST[num_orden]')";
					$cs=mysql_query($sql,$cn) or die ("Problemas en agregar los datos a la BD:".mysql_error());
					echo "<center>Se insertaron los datos correctamente.</center>";
				}
				if($B1=="Modificar"){
					$dni_paciente = $_POST["dni_paciente"];  
					$dire = $_POST["dire"];  
					$telefono = $_POST["telefono"];  
					$num_orden = $_POST["num_orden"];
					$sql="UPDATE paciente SET dire='$dire',telefono='$telefono' WHERE dni_paciente='$dni_paciente'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en modificar los datos a la BD");
					echo "<center>Se actualizo correctamente</center>";
				}
				if($B1=="Eliminar"){
					$dni_paciente=$_POST["dni_paciente"];
					$sql="DELETE FROM paciente WHERE dni_paciente='$dni_paciente'";
					$cs=mysql_query($sql,$cn) or die ("Problemas al eliminar los datos");
					echo "<center>Se elimino correctamente</center>";
				}
				if($B1=="Listar"){
				$sql="select * from paciente";
					$cs=mysql_query($sql,$cn) or die ("Problemas en buscar los datos");
					echo"<center>
					<table border='3'>
					<tr>
						<td>DNI</td>
						<td>Direccion</td>
						<td>Telefono</td>
						<td>Numero de Orden</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$dni_paciente=$resul[0];
						$dire=$resul[1];
						$telefono=$resul[2];
						$num_orden=$resul[3];
						echo "<tr>
						<td><center>$dni_paciente</center></td>
						<td><center>$dire</center></td>
						<td><center>$telefono</center></td>
						<td><center>$num_orden</center></td>
						</tr>";
					}
					echo "</table>
						</center>";
				}
			}
?>
<center><a href='Pacientes.html'><input id='botones' type="submit" value="Atras" name="B1"></a></center>
</body>  

</html> 
