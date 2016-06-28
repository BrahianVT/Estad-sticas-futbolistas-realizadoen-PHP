<!DOCTYPE html>
<html lang = "es">
<head>
<title>Proyecto de Bases de Datos</title>
<link rel="stylesheet" type = "text/css" href= "css/agregar.css" media = "screen" >
</head>
<body>
<?php
	include_once("funciones/conexion.php"); 
	$rs = mysql_query("SELECT MAX(id_jugador) AS id FROM jugador");
	if ($row = mysql_fetch_row($rs)) {
	$id = trim($row[0]);
	}
	$actual_id= $id + 1;
  if (isset($_POST['registrar'])){
	$nombre = $_POST['nombre'];
	$edad = $_POST['edad'];
	$domicilo = $_POST['domicilo'];
	$telefono = $_POST['telefono'];
	$salario = $_POST['salario'];
	$debut = $_POST['debut'];
	$nombre_equipo = $_POST['nombre_equipo'];
	$posicion = $_POST['posicion'];
	$division = $_POST['division'];
	$tiros_gol = $_POST['tiros_gol'];
	$goles = $_POST['goles'];
	$posicion_j = $_POST['posicion_j'];
	$partidos_j = $_POST['partidos_j'];
	$tar_rojas = $_POST['tar_rojas'];
	$tar_amarillas = $_POST['tar_amarillas'];
	
	$primera= "insert into jugador(nombre,edad,domicilio,telefono,salario_men,fecha_debut) values('$nombre',$edad,'$domicilo','$telefono',$salario,'$debut')";
	$segunda = "insert into equipo(nombre_equipo,pos_equipo,id_jugador) values('$nombre_equipo' ,$posicion,$actual_id)";
	$tercera = "insert into division(tipo_division,id_equipo) values('$division',$actual_id)";
	$cuarta = "insert into estadistica(tiros_agol,goles,partidos_jugados,posicion_jugador,targeta_roja,targeta_amarilla,id_jugador) values($tiros_gol,$goles,$partidos_j,'$posicion_j',$tar_rojas,$tar_amarillas,$actual_id)";
	mysql_query($primera, $conexion) or die(mysql_error());
	mysql_query($segunda, $conexion) or die(mysql_error());
	mysql_query($tercera, $conexion) or die(mysql_error());
	mysql_query($cuarta, $conexion) or die(mysql_error());
	echo "<h2><p style='color:white'>INSERCCION REALIZADA CON EXITO</p>";
	}
else{
	echo "error ";
}
?>
  <header>
   <h2> Bases de Datos de Estadisticas de Futbolistas</h2>
  </header>
 <section>
  <h2>Agrega futbolista</h2>
  <div>

  <form name = "formulario" method = "post" action = "">
    <h3><p>Datos Personales</p></h3>
	<p>Nombre <input type = "text" placeholder = "Indica nombre completo" maxlength ="50" size = "50"name = nombre required>*
	   Edad <input type = "number" placeholder = "Indica edad" maxlength ="2"  name = edad required>*
	</p>
	<p>Domicilio <input type = "text" placeholder = "Indica domicilo" maxlength ="100" size= "50" name = domicilo required>*
	   Telefono <input type = "text" placeholder = "Indica telefono" maxlength ="18" name = telefono required>*
	</p>
	<p>Salario <input type = "text" placeholder = "Indica el salario" maxlength ="15" name = salario required>*
	   Debut(YYYY-MM-DD) <input type = "text" placeholder = "Indica fecha de debut" maxlength ="15" name = debut required>*
	</p>
	<h3><p>Estadisticas</p></h3>
	<p>Equipo <input type = "text" placeholder = "Indica el nombre del equipo" maxlength ="20" name = nombre_equipo required>*
	   Posicion de Equipo <input type = "number" placeholder = "Indica la posicion del equipo" maxlength ="2" name = posicion required>*
	</p>
	<p>Division <input type = "text" placeholder = "Indica el tipo de division" maxlength ="10" name = division required>*
	   Tiros a gol <input type = "number" placeholder = "Indica los tiros a gol" maxlength ="4" name = tiros_gol required>*
	</p>
	<p>Goles <input type = "number" placeholder = "Indica los goles" maxlength ="4" name = goles required>*
	   Partidos <input type = "number" placeholder = "Indica los partidos jugados" maxlength ="4" name = partidos_j required>*
	</p>
	<p>Posicion <input type = "text" placeholder = "Indica la posicion" maxlength ="15" name = posicion_j required>*
	   T. Amarillas <input type = "number" placeholder = "Targetas amarillas" maxlength ="2" name = tar_rojas required>*
	</p>
	<p>T. Rojas <input type = "text" placeholder = "Targetas rojas" maxlength ="2" name = tar_amarillas required>*</p>	
	<p><input type = "submit" value= "Registrar" name= "registrar">
  </form>
  </div>
  <a href="index.php">Regresar al menu principal</a>
 </section>
 </body>
</html>