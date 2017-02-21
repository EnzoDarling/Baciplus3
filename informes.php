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
				$buscar=$_POST["num_informe"];
				if($B1=="Buscar"){
					$sql="SELECT * FROM informes WHERE num_informe='$buscar'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en ingresar los datos a la BD");
					echo'<strong><center>Datos encontrados</center></strong>';
					echo"<center>
					<table border='3'>
					<tr>
						<td>Numero de Informe</td>
						<td>Fecha</td>
						<td>Numero de Muestra</td>
						<td>Tipo de Muestra</td>
						<td>Solicitud de Cultivo</td>
						<td>Fecha Primera Lectura</td>
						<td>Primera Lectura</td>
						<td>Fecha Segunda Lectura</td>
						<td>Segunda Lectura</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$num_informe=$resul[0];
						$fecha=$resul[1];
						$tipo_muestra=$resul[2];
						$sol_cultivo=$resul[3];
						$fecha_primera_lectura=$resul[4];
						$primera_lectura=$resul[5];
						$fecha_segunda_lectura=$resul[6];
						$segunda_lectura=$resul[7];
						echo "<tr>
						<td><center>$num_informe</center></td>
						<td><center>$fecha</center></td>
						<td><center>$tipo_muestra</center></td>
						<td><center>$sol_cultivo</center></td>
						<td><center>$fecha_primera_lectura</center></td>
						<td><center>$primera_lectura</center></td>
						<td><center>$fecha_segunda_lectura</center></td>
						<td><center>$segunda_lectura</center></td>
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
					$num_informe = $_POST["num_informe"];  
					$fecha = explode("-",$_POST['fecha']);
					$num_muestra = $_POST["num_muestra"];  
					$tipo_muestra = $_POST["tipo_muestra"];
					$sol_cultivo = $_POST["sol_cultivo"];
					$fecha_primera_lectura = explode("-",$_POST['fecha_primera_lectura']);
					$primera_lectura = $_POST["primera_lectura"];
					$fecha_segunda_lectura = explode("-",$_POST['fecha_segunda_lectura']);
					$segunda_lectura = $_POST["segunda_lectura"]; 
					$sql="INSERT INTO informes VALUES ('$_REQUEST[num_informe]','".$fecha[2]."-".$fecha[1]."-".$fecha[0]."','$_REQUEST[num_muestra]','$_REQUEST[tipo_muestra]','$_REQUEST[sol_cultivo]','".$fecha_primera_lectura[2]."-".$fecha_primera_lectura[1]."-".$fecha_primera_lectura[0]."','$_REQUEST[primera_lectura]','".$fecha_segunda_lectura[2]."-".$fecha_segunda_lectura[1]."-".$fecha_segunda_lectura[0]."','$_REQUEST[segunda_lectura]')";
					$cs=mysql_query($sql,$cn) or die ("Problemas en agregar los datos a la BD:".mysql_error());
					echo "<center>Se insertaron los datos correctamente.</center>";
				}
				if($B1=="Modificar"){
					$num_informe = $_POST["num_informe"];  
					$fecha = explode("-",$_POST['fecha']);
					$num_muestra = $_POST["num_muestra"];  
					$tipo_muestra = $_POST["tipo_muestra"];
					$sol_cultivo = $_POST["sol_cultivo"];
					$fecha_primera_lectura = explode("-",$_POST['fecha_primera_lectura']);
					$primera_lectura = $_POST["primera_lectura"];
					$fecha_segunda_lectura = explode("-",$_POST['fecha_segunda_lectura']);
					$segunda_lectura = $_POST["segunda_lectura"]; 
					$sql="UPDATE informes SET fecha='".$fecha[2]."-".$fecha[1]."-".$fecha[0]."',num_muestra='$num_muestra',tipo_muestra='$tipo_muestra',sol_cultivo='$sol_cultivo',fecha_primera_lectura='".$fecha_primera_lectura[2]."-".$fecha_primera_lectura[1]."-".$fecha_primera_lectura[0]."',primera_lectura='$primera_lectura',fecha_segunda_lectura='".$fecha_segunda_lectura[2]."-".$fecha_segunda_lectura[1]."-".$fecha_segunda_lectura[0]."',segunda_lectura='$segunda_lectura' WHERE num_informe='$num_informe'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en modificar los datos a la BD");
					echo "<center>Se actualizo correctamente</center>";
				}
				if($B1=="Eliminar"){
					$num_informe=$_POST["num_informe"];
					$sql="DELETE FROM informes WHERE num_informe='$num_informe'";
					$cs=mysql_query($sql,$cn) or die ("Problemas al eliminar los datos");
					echo "<center>Se elimino correctamente</center>";
				}
				if($B1=="Listar"){
				$sql="select * from informes";
					$cs=mysql_query($sql,$cn) or die ("Problemas en buscar los datos");
					echo'<strong><center>Turnos</center></strong>';
					echo"<center>
					<table border='3'>
					<tr>
						<td>Numero de Informe</td>
						<td>Fecha</td>
						<td>Numero de Muestra</td>
						<td>Tipo de Muestra</td>
						<td>Solicitud de Cultivo</td>
						<td>Fecha Primera Lectura</td>
						<td>Primera Lectura</td>
						<td>Fecha Segunda Lectura</td>
						<td>Segunda Lectura</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$num_informe=$resul[0];
						$fecha=$resul[1];
						$num_muestra=[2];
						$tipo_muestra=$resul[3];
						$sol_cultivo=$resul[4];
						$fecha_primera_lectura=$resul[5];
						$primera_lectura=$resul[6];
						$fecha_segunda_lectura=$resul[7];
						$segunda_lectura=$resul[8];
						echo "<tr>
						<td><center>$num_informe</center></td>
						<td><center>$fecha</center></td>
						<td><center>$num_muestra</center></td>
						<td><center>$tipo_muestra</center></td>
						<td><center>$sol_cultivo</center></td>
						<td><center>$fecha_primera_lectura</center></td>
						<td><center>$primera_lectura</center></td>
						<td><center>$fecha_segunda_lectura</center></td>
						<td><center>$segunda_lectura</center></td>
						</tr>";
					}
					echo "</table>
						</center>";
				}
			}
?><br>
<center><a href='Informes.html'><input id='botones' type="submit" value="Atras" name="B1"></a></center>
</body>  
</html> 
