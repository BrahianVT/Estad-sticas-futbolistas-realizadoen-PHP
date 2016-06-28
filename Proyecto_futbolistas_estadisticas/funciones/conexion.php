<?php
	$host_bd = "localhost";
	$usuario_bd = "root";
	$bd = "futbolistas";
	//realizar conexion a la base de datos
	$conexion = mysql_connect($host_bd, $usuario_bd,"");
	//por si se encuentra alguna falla
	if(!$conexion){
		die("No se pudo realizar la conexion devido a :" . mysql_error());
	}
	//seleccionamos la base de datos
	mysql_select_db($bd, $conexion);
?>