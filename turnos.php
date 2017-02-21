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
				$buscar=$_POST["id_turno"];
				if($B1=="Buscar"){
					$sql="SELECT * FROM turnos WHERE id_turno='$buscar'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en ingresar los datos a la BD");
					echo'<strong><center>Datos encontrados</center></strong>';
					echo"<center>
					<table border='3'>
					<tr>
						<td>ID Turno</td>
						<td>Apellido</td>
						<td>Nombre</td>
						<td>Fecha</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$id_turno=$resul[0];
						$apellido=$resul[1];
						$nombre=$resul[2];
						$fecha=$resul[3];
						echo "<tr>
						<td><center>$id_turno</center></td>
						<td><center>$apellido</center></td>
						<td><center>$nombre</center></td>
						<td><center>$fecha</center></td>
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
					$id_turno = $_POST["id_turno"];  
					$apellido = $_POST["apellido"];
					$nombre = $_POST["nombre"];
					$fecha = explode("-",$_POST['fecha']); 
					$sql="INSERT INTO turnos VALUES ('$_REQUEST[id_turno]','$_REQUEST[apellido]','$_REQUEST[nombre]','".$fecha[2]."-".$fecha[1]."-".$fecha[0]."')";
					$cs=mysql_query($sql,$cn) or die ("Problemas en agregar los datos a la BD:".mysql_error());
					echo "<center>Se insertaron los datos correctamente.</center>";
				}
				if($B1=="Modificar"){
					$id_turno = $_POST["id_turno"];  
					$apellido = $_POST["apellido"];
					$nombre = $_POST["nombre"];
					$fecha = explode("-",$_POST['fecha']);
					$sql="UPDATE turnos SET apellido='$apellido',nombre='$nombre',fecha='".$fecha[2]."-".$fecha[1]."-".$fecha[0]."' WHERE id_turno='$id_turno'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en modificar los datos a la BD");
					echo "<center>Se actualizo correctamente</center>";
				}
				if($B1=="Eliminar"){
					$id_turno=$_POST["id_turno"];
					$sql="DELETE FROM turnos WHERE id_turno='$id_turno'";
					$cs=mysql_query($sql,$cn) or die ("Problemas al eliminar los datos");
					echo "<center>Se elimino correctamente</center>";
				}
				if($B1=="Listar"){
				$sql="select * from turnos";
					$cs=mysql_query($sql,$cn) or die ("Problemas en buscar los datos");
					echo'<strong><center>Turnos</center></strong>';
					echo"<center>
					<table border='3'>
					<tr>
						<td>ID Turno</td>
						<td>Apellido</td>
						<td>Nombre</td>
						<td>Fecha</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$id_turno=$resul[0];
						$apellido=$resul[1];
						$nombre=$resul[2];
						$fecha=$resul[3];
						echo "<tr>
						<td><center>$id_turno</center></td>
						<td><center>$apellido</center></td>
						<td><center>$nombre</center></td>
						<td><center>$fecha</center></td>
						</tr>";
					}
					echo "</table>
						</center>";
				}
			}
?>
<br>
<center><a href='Turnos.html'><input id='botones' type="submit" value="Atras" name="B1"></a></center>
</body>  

</html>