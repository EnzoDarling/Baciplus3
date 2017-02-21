<?php 
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
if ($username&&$password)
{
	$connectar= mysql_connect("localhost","root","") or die ("No se pudo conectar!");
	mysql_select_db("phplogin") or die("No se pudo encontrar la BD");
	$query = mysql_query("SELECT * FROM usuario WHERE username='$username'");
	$numrow = mysql_num_rows($query);
	if ($numrow!=0){
		while ($row=mysql_fetch_assoc($query)) {
			$dbusername = $row['username'];
			$dbpassword = $row['password'];			
		}
		if($username==$dbusername && $password==$dbpassword)
		{
			echo "Estas logueado! <a href='Inicio.html'>Click</a> aqui para regresar a la página de inicio";
			$_SESSION['username']=$dbusername;
		}
		else
			echo "Password incorrecto!";
	}
	else
		die("Ese usuario no existe");
	echo $numrow;
}	
else
	die("Ingrese un nombre de usuario y password");
?>

