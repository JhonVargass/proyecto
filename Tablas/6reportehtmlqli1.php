<?php
 
$host="localhost";
$usuario="root";
$password="";
$db="usuarios";

$conexion = new mysqli($host,$usuario,$password,$db);
$sql = "select * from ventas";
$query=$conexion->query($sql);
 
// $conexion = mysql_connect("localhost","root","");
//mysql_select_db("usuario",$conexion);
 //$sql= mysql_query("select * from users");
//while($res=mysql_fetch_array($sql)){
	
echo'<tr>
		<td>'.$res['id'].'</td>
		<td>'.$res['FechaEntrega'].'</td>
		<td>'.$res['Tipo'].'</td>
		<td>'.$res['Valor'].'</td>
	</tr>
	';
	
	
	
			
	$tbHtml="";
	if($query->num_rows>0){
		
	        echo "<table border='5px'>
             <header>
                <tr>
                  <th>id</th>
                  <th>FechaEntrega</th>
                  <th>Tipo</th>
                  <th>Valor</th>
              
                  </tr>
            </header>";
		}

		
		while($res=$query->fetch_array())
		{
// Configuración imagen, traer ubicación de la tabla y luego colocar dentro
// del html para decirle donde esta la imagen
$z=$res['ubicacion'];
$x="<img src='$z' width='150' height='150' alt='Alargada' border='0'>";



		
         echo '<tr>
		<td>'.$res['id'].'</td>
		<td>'.$res['FechaEntrega'].$x.'</td>
		<td>'.$res['Tipo	'].'</td>
		<td>'.$res['Valor'].'</td>
	</tr>
	';
		}
		$tbHtml.= "</table>";
	}
	else
	{
	echo "No hay resultados";
	}
	//cambiar los datos por productos
	
?>
 
