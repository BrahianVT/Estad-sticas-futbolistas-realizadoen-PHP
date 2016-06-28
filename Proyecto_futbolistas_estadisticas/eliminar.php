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
  <p>Elimina un futbolista</p>
  <?php include_once("funciones/conexion.php"); 
	$consulta = mysql_query("select nombre , id_jugador from jugador " ,$conexion) or die(mysql_error());
  ?>
  <table width = "40%" border = "1">
  <tr> 
	 <td ><b>NOMBRE DEL FUTBOLISTA</b></td>
	 <td ><b>OPCIONES</b></td>
  </tr>
  <?php
	while($filas = mysql_fetch_array($consulta)){
		$Nombre = $filas['nombre'];
		$id = $filas['id_jugador']
  ?>
  <tr>
	 <td><?php echo "<p style='color:#666;'>".$Nombre. "</p>";?></td>
	 <td><form method="post" action="">
         <input type="submit" value="Eliminar" name="eliminar" /></form>
	</td>
  </tr>
  <?php }
  if(isset($_POST['eliminar']))
{
		
		mysql_query("DELETE FROM jugador WHERE id_jugador = $id", $conexion) or die(mysql_error());
		mysql_query("DELETE FROM equipo WHERE id_jugador = $id", $conexion) or die(mysql_error());
		mysql_query("DELETE FROM division WHERE id_equipo = $id", $conexion) or die(mysql_error());
		mysql_query("DELETE FROM estadistica WHERE id_jugador = $id", $conexion) or die(mysql_error());
		
		header('refresh: 1; url=eliminar.php');
		
		echo "<p style='color:white;'>ELIMINACION REALIZADA CON EXITO</p>";
}

  ?>
  </table><br>
  <a href="index.php">Regresar al menu principal</a>
 </section>
 </body>
</html>