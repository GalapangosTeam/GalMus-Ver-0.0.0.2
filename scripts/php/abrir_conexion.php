<?php 

	//variables para la conexion.
	$host = "p:localhost";
	$usuariobd = "id5050640_galapangos";
	$password = "galapangos123";
	$bdd = "id5050640_bdgalmus";
	
	//lista de tablas de la bd
	$tbl1 = "admingal";
	$tbl2 = "usuariosgeneral";

	//asi es el parametro para acceder a una BD, en las nuevas versiones.
	$conexion=mysqli_connect($host,$usuariobd,$password,$bdd);
	if ($conexion->connect_errno){
		echo "Nuestro sitio esta experimentando fallos {$conexion->connect_errno}";
		exit();
	}
?>
