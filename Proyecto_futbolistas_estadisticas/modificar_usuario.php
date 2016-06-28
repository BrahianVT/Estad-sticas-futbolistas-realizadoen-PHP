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
  <?php
  $id =$_GET['id'];
  include_once("funciones/conexion.php");
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
	}
  if (isset($_POST['modificar'])){
	$nombre2 = $_POST['nombre2'];
	$edad2 = $_POST['edad2'];
	$domicilo2 = $_POST['domicilo2'];
	$telefono2 = $_POST['telefono2'];
	$salario2 = $_POST['salario2'];
	$debut2 = $_POST['debut2'];
	$nombre_equipo2 = $_POST['nombre_equipo2'];
	$posicion2 = $_POST['posicion2'];
	$division2 = $_POST['division2'];
	$tiros_gol2 = $_POST['tiros_gol2'];
	$goles2 = $_POST['goles2'];
	$posicion_j2 = $_POST['posicion_j2'];
	$partidos_j2 = $_POST['partidos_j2'];
	$tar_rojas2 = $_POST['tar_rojas2'];
	$tar_amarillas2 = $_POST['tar_amarillas2'];
	
	mysql_query("UPDATE jugador SET nombre = '$nombre2', edad = $edad2 , domicilio = '$domicilo2', telefono='$telefono2',salario_men =$salario2, fecha_debut='$debut2' WHERE id_jugador = $id", $conexion) or die(mysql_error());
	mysql_query("UPDATE equipo SET nombre_equipo = '$nombre_equipo2', pos_equipo = $posicion2 WHERE id_jugador = $id", $conexion) or die(mysql_error());
	mysql_query("UPDATE division SET tipo_division = '$division2' WHERE id_equipo = $id", $conexion) or die(mysql_error());
	mysql_query("UPDATE estadistica SET tiros_agol = $tiros_gol2 , goles= $goles2, partidos_jugados= $partidos_j2 , posicion_jugador= '$posicion_j2', targeta_roja= $tar_rojas2 , targeta_amarilla = $tar_amarillas2 WHERE id_jugador = $id", $conexion) or die(mysql_error());
	header('refresh: 1; url=modificar.php');
	echo "<h2><p style='color:white'>INSERCCION REALIZADA CON EXITO</p>";
	}
  ?>
  <section>
  <h2>Modifique el campo que guste</h2>
  <div>

  <form name = "formulario" method = "post" action = "">
    <h3><p>Datos Personales</p></h3>
	<p>Nombre <input type = "text"  value="<?php echo $nombre;?>" maxlength ="50" size = "50"name = nombre2 required>*
	   Edad <input type = "number" value="<?php echo $edad;?>" maxlength ="2"  name = edad2 required>*
	</p>
	<p>Domicilio <input type = "text"value="<?php echo $domicilio;?>" maxlength ="60" size= "50" name = domicilo2 required>*
	   Telefono <input type = "text" maxlength ="18" value="<?php echo $telefono;?>" name = telefono2 required>*
	</p>
	<p>Salario <input type = "text" maxlength ="15" value="<?php echo $salario_men;?>" name = salario2 required>*
	   Debut (YYYY-MM-DD) <input type = "text" maxlength ="15" value="<?php echo $fecha_debut;?>" name = debut2 required>*
	</p>
	<p><h3>Estadisticas</h3></p>
	<p>Equipo <input type = "text" maxlength ="20" value="<?php echo $nombre_equipo;?>" name = nombre_equipo2 required>*
	   Posicion equipo <input type = "number"  maxlength ="2" value="<?php echo $pos_equipo;?>"name = posicion2 required>*
	</p>
	<p>Division <input type = "text"  maxlength ="10" value="<?php echo $tipo_division;?>" name = division2 required>*
	   Tiros <input type = "number"  maxlength ="4" value="<?php echo $tiros_agol;?>" name = tiros_gol2 required>*
	</p>
	<p>Goles <input type = "number"  maxlength ="4" value="<?php echo $goles;?>"name = goles2 required>*
	   Partidos jugados <input type = "number"  maxlength ="4" value="<?php echo $partidos_jugados;?>"name = partidos_j2 required>*
	</p>
	<p>Posicion <input type = "text"  maxlength ="15" value="<?php echo $posicion_jugador;?>" name = posicion_j2 required>*
	   T. rojas <input type = "number"  maxlength ="2" value="<?php echo $targeta_roja;?>"name = tar_rojas2 required>*
	</p>
	<p>T. amarillas<input type = "text"  maxlength ="2" value="<?php echo $targeta_amarilla;?>"name = tar_amarillas2 required>*</p>	
	<input type = "submit" value= "Modificar" name= "modificar">
  </form>
  </div>
  <a href="index.php">Regresar al menu principal</a>
 </section>
 </body>
</html>