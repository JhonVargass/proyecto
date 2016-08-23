<?php
session_start();

$usuario=$_POST["usuario"];
$_SESSION["usuario"]=$usuario;


if(!isset($_SESSION["usuario"]) )
{


$_SESSION["usuario"]="Invitado";
echo "El usuario actual es:";
echo $_SESSION ["usuario"];
}
else
{
$usuario=$_SESSION["usuario"];
echo "El usuario actual es:";
echo $_SESSION["usuario"];
}

if($_SESSION["usuario"]=="")
{
	echo "Invitado";
}

?>


<html>
<body>
 <p>&nbsp</p>
 <p> <a href="sesion.html">
 	<input name="cerrar" type="submit"  value="cerrar sesion" />
</a></p>
</body>
</html>






