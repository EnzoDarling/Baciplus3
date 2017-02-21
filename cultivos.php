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
				$buscar=$_POST["num_cultivo"];
				//---------------------------------------------------------------BUSCAR--------------------------------------------------------------
				if($B1=="Buscar"){
					$sql="SELECT * FROM cultivos WHERE num_cultivo='$buscar' ORDER BY num_cultivo ASC";
					$cs=mysql_query($sql,$cn) or die ("Problemas en ingresar los datos a la BD");
					echo'<center><strong>Datos encontrados en Muestras</strong></center>';
					echo"<center>
					<table border='3'>
					<tr>
						<td>Numero de Cultivo</td>
						<td>Fecha Primera Lectura</td>
						<td>Primera Lectura</td>
						<td>Fecha Segunda Lectura</td>
						<td>Segunda Lectura</td>
						<td>Solicitud de Cultivo</td>
						<td>Resultado</td>
						<td>Numero de Muestra</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$num_cultivo=$resul[0];
						$fecha_primera_lectura=$resul[2];
						$primera_lectura=$resul[3];
						$fecha_segunda_lectura=$resul[4];
						$segunda_lectura=$resul[5];
						$sol_cultivo=$resul[6];
						$resultado=$resul[7];
						$num_muestra=$resul[1];
						echo "<tr>
						<td><center>$num_cultivo</center></td>
						<td><center>$fecha_primera_lectura</center></td>
						<td><center>$primera_lectura</center></td>
						<td><center>$fecha_segunda_lectura</center></td>
						<td><center>$segunda_lectura</center></td>
						<td><center>$sol_cultivo</center></td>
						<td><center>$resultado</center></td>
						<td><center>$num_muestra</center></td>
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
					$num_cultivo = $_POST["num_cultivo"];
					$fecha_primera_lectura = date("Y-m-d");
					$primera_lectura = $_POST["primera_lectura"];  
					$fecha_segunda_lectura = date("Y-m-d");
					$segunda_lectura = $_POST["segunda_lectura"];
					$sol_cultivo = $_POST["sol_cultivo"];
					$resultado = $_POST["resultado"];
					$num_muestra = $_POST["num_muestra"]; 
					$fecha_primera_lectura = explode("-",$_POST['fecha_primera_lectura']);
					$fecha_segunda_lectura = explode("-",$_POST['fecha_segunda_lectura']);
					$sql="INSERT INTO cultivos VALUES ('$_REQUEST[num_cultivo]','".$fecha_primera_lectura[2]."-".$fecha_primera_lectura[1]."-".$fecha_primera_lectura[0]."','$_REQUEST[primera_lectura]','".$fecha_segunda_lectura[2]."-".$fecha_segunda_lectura[1]."-".$fecha_segunda_lectura[0]."','$_REQUEST[segunda_lectura]','$_REQUEST[sol_cultivo]','$_REQUEST[resultado]','$_REQUEST[num_muestra]')";
					$cs=mysql_query($sql,$cn) or die ("Problemas en agregar los datos a la BD:".mysql_error());
					echo "<center>Se insertaron los datos correctamente.</center>";
				}
				//-------------------------------------------------------------------MODIFICAR------------------------------------------------------
				if($B1=="Modificar"){
					$num_cultivo = $_POST["num_cultivo"]; 
					$fecha_primera_lectura = date("Y-m-d");
					$primera_lectura = $_POST["primera_lectura"];  
					$fecha_segunda_lectura = date("Y-m-d");
					$segunda_lectura = $_POST["segunda_lectura"];
					$sol_cultivo = $_POST["sol_cultivo"];
					$resultado = $_POST["resultado"];
					$num_muestra = $_POST["num_muestra"];
					$fecha_primera_lectura = explode("-",$_POST['fecha_primera_lectura']);
					$fecha_segunda_lectura = explode("-",$_POST['fecha_segunda_lectura']);
					$sql="UPDATE cultivos SET fecha_primera_lectura='".$fecha_primera_lectura[2]."-".$fecha_primera_lectura[1]."-".$fecha_primera_lectura[0]."',primera_lectura='$primera_lectura',fecha_segunda_lectura='".$fecha_segunda_lectura[2]."-".$fecha_segunda_lectura[1]."-".$fecha_segunda_lectura[0]."',segunda_lectura='$segunda_lectura',sol_cultivo='$sol_cultivo',resultado='$resultado',num_muestra='$num_muestra' WHERE num_cultivo='$num_cultivo'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en modificar los datos a la BD");
					echo "<center>Se actualizo correctamente</center>";
				}
				//-------------------------------------------------------------------ELIMINAR-------------------------------------------------------
				if($B1=="Eliminar"){
					$num_cultivo=$_POST["num_cultivo"];
					$sql="DELETE FROM cultivos WHERE num_cultivo='$num_cultivo'";
					$cs=mysql_query($sql,$cn) or die ("Problemas al eliminar los datos");
					echo "<center>Se elimino correctamente</center>";
				}
				//-------------------------------------------------------------------LISTAR---------------------------------------------------------
				if($B1=="Listar"){
				$sql="select * from cultivos ORDER BY num_cultivo ASC";
					$cs=mysql_query($sql,$cn) or die ("Problemas en buscar los datos");
					echo "<center>Muestras</center>";
					echo"<center>
					<table border='3'>
					<tr>
						<td>Numero de Cultivo</td>
						<td>Fecha Primera Lectura</td>
						<td>Primera Lectura</td>
						<td>Fecha Segunda Lectura</td>
						<td>Segunda Lectura</td>
						<td>Solicitud de Cultivo</td>
						<td>Resultado</td>
						<td>Numero de Muestra</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$num_cultivo=$resul[0];
						$fecha_primera_lectura=$resul[1];
						$primera_lectura=$resul[2];
						$fecha_segunda_lectura=$resul[3];
						$segunda_lectura=$resul[4];
						$sol_cultivo=$resul[5];
						$resultado=$resul[6];
						$num_muestra=$resul[7];
						echo "<tr>
						<td><center>$num_cultivo</center></td>
						<td><center>$fecha_primera_lectura</center></td>
						<td><center>$primera_lectura</center></td>
						<td><center>$fecha_segunda_lectura</center></td>
						<td><center>$segunda_lectura</center></td>
						<td><center>$sol_cultivo</center></td>
						<td><center>$resultado</center></td>
						<td><center>$num_muestra</center></td>
						</tr>";
					}
					echo "</table>
						</center>";
				}
			}
?><br>
<center><a href="Cultivos.html"><input id='botones' type="submit" value="Atras" name="B1"></a></center> 
</body> 
</html> 
