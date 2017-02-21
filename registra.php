<html>  

<head>  
<title>Guardamos los datos en la base de datos</title>  
</head>  

<body>  
<?php  

// Recibimos por POST los datos procedentes del formulario  

$nombre = $_POST["nombre"];  
$email = $_POST["email"];  
$fecha = date("Y-m-d");  


$conexion = mysql_connect("localhost", "root", "");
mysql_select_db /*Nombre de base de datos */ ("baciplus", $conexion); 
$_GRABAR_SQL = "INSERT INTO /*Nombre de la tabla*/ tabla1 (nombre,email,fecha) VALUES ('$nombre','$email','$fecha')";  
mysql_query($_GRABAR_SQL); 

echo "BIEN!";

mysql_close($conexion);  



?>  
</body>  

</html> 
