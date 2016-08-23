<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Reporte pdf</title>

<link rel="stylesheet" href="style.css" />

</head>

<body>
<div id="content">

<h2>REPORTES PDF</h2>

<hr />

<?php
	include_once("conexion.php");

	$con = new DB;
	$pacientes = $con->conectar();
	$strConsulta = "SELECT id, Nombre, Apellido, FechaNacimiento, Telefono from insertarclientes";
	$pacientes = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($pacientes);
	
	echo '<table cellpadding="0" cellspacing="0" width="100%">';
	echo '<thead><tr><td>id</td><td>Nombre</td><td>Apellido</td><td>FechaNacimiento</td><td>Telefono</td></tr></thead>';
	for ($i=0; $i<$numfilas; $i++)
	{
		$fila = mysql_fetch_array($pacientes);
		$numlista = $i + 1;
		echo '<tr>'.$numlista.'</td>';
		echo '<td>'.$fila['id'].'</td>';
        echo '<td>'.$fila['Nombre'].'</td>';
        echo '<td>'.$fila['Apellido'].'</td>';
		echo '<td>'.$fila['FechaNacimiento'].'</td>';
		echo '<td>'.$fila['Telefono'].'</td>';
		
		echo '<td><a href="reporte_historial.php?id='.$fila['id'].'">ver</a></td></tr>';
	}
	echo "</table>";
?>			

</div>
</body>
</html>