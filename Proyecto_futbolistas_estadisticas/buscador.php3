<!DOCTYPE html>
<html lang = "es">
<head>
<title>Proyecto de Bases de Datos</title>
<link rel="stylesheet" type = "text/css" href= "css/menu_principal.css" media = "screen" >
</head>
<body>
  <header>
   <h2> Realizar busqueda por nombre</h2>
  </header>
 <section>
 <?php
	include_once("funciones/conexion.php");
	$buscar = $_POST['buscar'];
	$consulta = mysql_query("select nombre , id_jugador from jugador where nombre LIKE '%$buscar%' order by nombre" ,$conexion) or die(mysql_error());	
?>
<table width = "40%" border = "1">
  <tr> 
	 <td ><b>NOMBRE DEL FUTBOLISTA</b></td>
	 <td ><b>VISUALIZAR ESTADISTICAS</b></td>
  </tr>
  <?php
   if (mysql_num_rows($consulta) != 0){
		
	while($filas = mysql_fetch_array($consulta)){
		$Nombre = $filas['nombre'];
		$id = $filas['id_jugador']
  ?>
  <tr>
	 <td><?php echo "<p style='color:#666;'>".$Nombre. "</p>";?></td>
	 <td><a href = "consultar_estadisticas.php?id=<?php echo $id;?>" style='color:#666;'>consultar estadisticas</a></td>
  </tr>
  <?php }  }
  else{
  echo "<h2><p style='color:red'>No SE ENCONTRARON RESULTADOS</p>";
  }
  ?>
  </table><br>
  <a href="buscar.php">Realizar otra busqueda</a>
 </section>
 </body>
</html>
