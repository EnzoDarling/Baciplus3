<html>  

<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">  
<title>Guardamos los datos en la base de datos</title>  
</head>  

<body>  
<!--<?php

// Recibimos por POST los datos procedentes del formulario  

//$nummuestra = $_POST["num_orden"];  
//$apellido = $_POST["apellido"];  
//$nombre = $_POST["nombre"];
//$solicitudcultivo = $_POST["sol_cultivo"];
//$conexion = mysql_connect("localhost", "root", "") or die("Problemas en la conexión");
//mysql_select_db("baciplus", $conexion) or die ("Problemas en la selección de la base de datos");


//$_GRABAR_SQL = "INSERT INTO ordenes (num_orden,apellido,nombre,sol_cultivo) VALUES ('$_REQUEST[num_orden]','$_REQUEST[apellido]','$_REQUEST[nombre]','$_REQUEST[sol_cultivo]')";  
//mysql_query($_GRABAR_SQL) or die("Problemas en agregar los datos a la BD:".mysql_error()); 

//echo "La orden ha sido registrada";

//mysql_close($conexion);  
//?>-->
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
				$buscar=$_POST["num_orden"];
				if($B1=="Buscar"){
					$sql="SELECT * FROM ordenes WHERE num_orden='$buscar'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en ingresar los datos a la BD");
					echo'<strong>Datos encontrados</strong>';
					echo"<center>
					<table border='3'>
					<tr>
						<td>Numero Ordenes</td>
						<td>Apellido</td>
						<td>nombre</td>
						<td>Solicitud de Cultivo</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$num_orden=$resul[0];
						$apellido=$resul[1];
						$nombre=$resul[2];
						$sol_cultivo=$resul[3];
						echo "<tr>
						<td><center>$num_orden</center></td>
						<td><center>$apellido</center></td>
						<td><center>$nombre</center></td>
						<td><center>$sol_cultivo</center></td>
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
					$num_orden = $_POST["num_orden"];  
					$apellido = $_POST["apellido"];  
					$nombre = $_POST["nombre"];
					$solicitudcultivo = $_POST["sol_cultivo"];
					$sql="INSERT INTO ordenes VALUES ('$_REQUEST[num_orden]','$_REQUEST[apellido]','$_REQUEST[nombre]','$_REQUEST[sol_cultivo]')";
					$cs=mysql_query($sql,$cn) or die ("Problemas en agregar los datos a la BD:".mysql_error());
					echo "<center>Se insertaron los datos correctamente.</center>";
				}
				if($B1=="Modificar"){
					$num_orden = $_POST["num_orden"];  
					$apellido = $_POST["apellido"];  
					$nombre = $_POST["nombre"];
					$solicitudcultivo = $_POST["sol_cultivo"];
					$sql="UPDATE ordenes SET apellido='$apellido',nombre='$nombre',sol_cultivo='$solicitudcultivo' WHERE num_orden='$num_orden'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en modificar los datos a la BD");
					echo "Se actualizo correctamente";
				}
				if($B1=="Eliminar"){
					$num_orden=$_POST["num_orden"];
					$sql="DELETE FROM ordenes WHERE num_orden='$num_orden'";
					$cs=mysql_query($sql,$cn) or die ("Problemas al eliminar los datos");
					echo "<center>Se elimino correctamente</center>";
				}
				if($B1=="Listar"){
				$sql="select * from ordenes";
					$cs=mysql_query($sql,$cn) or die ("Problemas en buscar los datos");
					echo"<center>
					<table border='3'>
					<tr>
						<td>Numero Ordenes</td>
						<td>Apellido</td>
						<td>nombre</td>
						<td>Solicitud de Cultivo</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$num_orden=$resul[0];
						$apellido=$resul[1];
						$nombre=$resul[2];
						$sol_cultivo=$resul[3];
						echo "<tr>
						<td><center>$num_orden</center></td>
						<td><center>$apellido</center></td>
						<td><center>$nombre</center></td>
						<td><center>$sol_cultivo</center></td>
						</tr>";
					}
					echo "</table>
						</center>";
				}
			}
?>
<br>
<center><a href='Ordenes.html'><input id='botones' type="submit" value="Atras" name="B1"></a></center>
</body>  

</html>