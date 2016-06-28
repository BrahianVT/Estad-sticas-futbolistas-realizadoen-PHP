<!DOCTYPE html>
<html lang = "es">
<head>
<title>Proyecto de Bases de Datos</title>
<link rel="stylesheet" type = "text/css" href= "css/menu_principal.css" media = "screen" >
</head>
<body>
  <header>
   <h2> Bases de Datos de Estadisticas de Futbolistas</h2>
  </header>
 <section>
  <p>Visualizar informacion</p>
  <?php include_once("funciones/conexion.php"); 
	$consulta = mysql_query("select nombre , id_jugador from jugador " ,$conexion) or die(mysql_error());
  ?>
  <table width = "40%" border = "1">
  <tr> 
	 <td ><b>NOMBRE DEL FUTBOLISTA</b></td>
	 <td ><b>VISUALIZAR ESTADISTICAS</b></td>
  </tr>
  <?php
	while($filas = mysql_fetch_array($consulta)){
		$Nombre = $filas['nombre'];
		$id = $filas['id_jugador']
  ?>
  <tr>
	 <td><?php echo "<p style='color:#666;'>".$Nombre. "</p>";?></td>
	 <td><a href = "consultar_estadisticas.php?id=<?php echo $id;?>" style='color:#666;'>consultar estadisticas</a></td>
  </tr>
  <?php }?>
  </table><br>
  <a href="index.php">Regresar al menu principal</a>
 </section>
 </body>
</html>