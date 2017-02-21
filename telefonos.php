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
				$buscar=$_POST["dni"];
				//---------------------------------------------------------------BUSCAR--------------------------------------------------------------
				if($B1=="Buscar"){
					$sql="SELECT * FROM telefonos WHERE dni='$buscar'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en ingresar los datos a la BD");
					echo'<center><strong>Datos encontrados en Telefonos</strong></center>';
					echo"<center>
					<table border='3'>
					<tr>
						<td>DNI</td>
						<td>Caracteristica</td>
						<td>Telefono Laboral</td>
						<td>Telefono Personal</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$dni=$resul[0];
						$caract=$resul[1];
						$telefonolab=$resul[2];
						$telefonoper=$resul[3];
						echo "<tr>
						<td><center>$dni</center></td>
						<td><center>$caract</center></td>
						<td><center>$telefonolab</center></td>
						<td><center>$telefonoper</center></td>
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
					$dni = $_POST["dni"];  
					$caract = $_POST["caract"];  
					$telefonolab = $_POST["telefonolab"];  
					$telefonoper = $_POST["telefonoper"];
					$sql="INSERT INTO telefonos VALUES ('$_REQUEST[dni]','$_REQUEST[caract]','$_REQUEST[telefonolab]','$_REQUEST[telefonoper]')";
					$cs=mysql_query($sql,$cn) or die ("Problemas en agregar los datos a la BD:".mysql_error());
					echo "<center>Se insertaron los datos correctamente.</center>";
				}
				//-------------------------------------------------------------------MODIFICAR------------------------------------------------------
				if($B1=="Modificar"){
					$dni = $_POST["dni"];  
					$caract = $_POST["caract"];  
					$telefonolab = $_POST["telefonolab"];  
					$telefonoper = $_POST["telefonoper"];
					$sql="UPDATE telefonos SET caract='$caract',telefonolab='$telefonolab',telefonoper='$telefonoper' WHERE dni='$dni'";
					$cs=mysql_query($sql,$cn) or die ("Problemas en modificar los datos a la BD");
					echo "<center>Se actualizo correctamente</center>";
				}
				//-------------------------------------------------------------------ELIMINAR-------------------------------------------------------
				if($B1=="Eliminar"){
					$dni=$_POST["dni"];
					$sql="DELETE FROM telefonos WHERE dni='$dni'";
					$cs=mysql_query($sql,$cn) or die ("Problemas al eliminar los datos");
					echo "<center>Se elimino correctamente</center>";
				}
				//-------------------------------------------------------------------LISTAR---------------------------------------------------------
				if($B1=="Listar"){
				$sql="select * from telefonos";
					$cs=mysql_query($sql,$cn) or die ("Problemas en buscar los datos");
					echo "<center>Telefonos</center>";
					echo"<center>
					<table border='3'>
					<tr>
						<td>DNI</td>
						<td>Caracteristica</td>
						<td>Telefono Laboral</td>
						<td>Telefono Personal</td>
					</tr>";
					while($resul=mysql_fetch_array($cs)){
						$dni=$resul[0];
						$caract=$resul[1];
						$telefonolab=$resul[2];
						$telefonoper=$resul[3];
						echo "<tr>
						<td><center>$dni</center></td>
						<td><center>$caract</center></td>
						<td><center>$telefonolab</center></td>
						<td><center>$telefonoper</center></td>
						</tr>";
					}
					echo "</table>
						</center>";
				}
			}
?><br>
<center><a href='Telefonos.html'><input id='botones' type="submit" value="Atras" name="B1"></a></center> 
</body>
</html> 
