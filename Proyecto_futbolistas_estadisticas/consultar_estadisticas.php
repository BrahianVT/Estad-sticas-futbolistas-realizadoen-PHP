<!DOCTYPE html>
<html lang = "es">
<head>
<title>Proyecto de Bases de Datos</title>
<link rel="stylesheet" type = "text/css" href= "css/consultas_estadisticas.css" media = "screen" >
</head>
<body>
 <header>
   <h2> Bases de Datos de Estadisticas de Futbolistas</h2>
 </header>
<?php
   $id =$_GET['id'];
  include_once("funciones/conexion.php");
	include_once("GoogChart.class.php");
	$chart = new GoogChart();
	$color = array('#95b645', '#7498e9', '#999999',);
  $consulta_datos = mysql_query("select nombre, edad, domicilio, telefono, salario_men , fecha_debut from jugador where id_jugador ='".$id."'" ,$conexion) or die(mysql_error());
  $consulta_est = mysql_query("select nombre_equipo , pos_equipo,tiros_agol , goles, partidos_jugados, posicion_jugador, targeta_roja, targeta_amarilla , tipo_division from equipo , estadistica, division where equipo.id_jugador ='".$id."' and estadistica.id_jugador ='".$id."' and division.id_equipo ='".$id."'") or die(mysql_error());
  

  while($filas = mysql_fetch_array($consulta_datos) and $filas2 = mysql_fetch_array($consulta_est)){
	$nombre = $filas['nombre'];
	$edad = $filas['edad'];
	$domicilio = $filas['domicilio'];
	$telefono= $filas['telefono'];
	$salario_men = $filas['salario_men'];
	$fecha_debut = $filas['fecha_debut'];
	$nombre_equipo = $filas2['nombre_equipo'];
	$pos_equipo = $filas2['pos_equipo'];
	$tiros_agol = $filas2['tiros_agol'];
	$goles = $filas2['goles'];
	$partidos_jugados = $filas2['partidos_jugados'];
	$posicion_jugador = $filas2['posicion_jugador'];
	$targeta_amarilla = $filas2['targeta_amarilla'];
	$targeta_roja = $filas2['targeta_roja'];
	$tipo_division = $filas2['tipo_division'];
	$datos = array(
		
			'Tiros a gol' => $tiros_agol,
			'Goles anotados' => $goles,
			'Partidos jugados' => $partidos_jugados,
			'Targetas amarillas' => $targeta_amarilla,
			'Targetas rojas' => $targeta_roja,
		
	);
	
?>
  <section>
   <h2> Datos Personales</h2>
   <center><div id ="datos"> 
   <b>NOMBRE:</b> <?php echo $nombre;?>.<br>
   <b>EDAD:</b> <?php echo $edad;?>.<br>
   <b>Domicilio:</b> <?php echo $domicilio;?>.<br>
   <b>TELEFONO: </b><?php echo $telefono;?>.<br>
   <b>SALARIO MENSUAL:</b> <?php echo $salario_men . " MXN.";?><br>
   <b>FECHA DE DEBUT: </b><?php echo $fecha_debut; ?>.<br>
   </div><br><br><center>
   <center><table width = "40%" border = 1 style="text-align:center;">
   <tr>
	<td><b>Nombre del equipo</b></td>
	<td><b>Division del equipo</b></td>
	<td><b>Posision en la tabla</b></td>
	<td><b>Tiros a gol</b></td>
	<td><b>Goles</b></td>
	<td><b>Partidos jugados</b></td>
	<td><b>Posicion del jugador</b></td>
	<td><b>Targetas amarillas</b></td>
	<td><b>Targetas rojas</b></td>
   </tr>
   <tr>
	<td><?php echo "<p style='color:#666;'>".$nombre_equipo. "</p>";?></td>
	<td><?php echo "<p style='color:#666;'>".$tipo_division."</p>"?></td>
	<td><?php echo "<p style='color:#666;'>".$pos_equipo. "</p>";?></td>
	<td><?php echo "<p style='color:#666;'>".$tiros_agol. "</p>";?></td>
	<td><?php echo "<p style='color:#666;'>".$goles. "</p>";?></td>
	<td><?php echo "<p style='color:#666;'>".$partidos_jugados. "</p>";?></td>
	<td><?php echo "<p style='color:#666;'>".$posicion_jugador. "</p>";?></td>
	<td><?php echo "<p style='color:#666;'>".$targeta_amarilla. "</p>";?></td>
	<td><?php echo "<p style='color:#666;'>".$targeta_roja. "</p>";?></td>
   </tr>
   </table></center>
   <?php }	
	echo "<h2><center>ESTADISTICAS DEL JUGADOR </center></h2>";
	$chart->setChartAttrs(array(
		'type' => 'sparkline',
		'title' =>'Estadisticas de '.$nombre,
		'data' => $datos,
		'size' => array(500, 400),
		'color' => $color,
		'labelsXY' => true,
	));
   ?>
   <div id = "grafica"style="width: 500px; margin: 20px auto; font-family:sans-serif; border: 1px solid red;">
   <?php echo $chart;?>
   </div>
   <br><a href= "consultar.php"> Regresar a la pagina anterior</a>
  </section>
 </body>
</html>