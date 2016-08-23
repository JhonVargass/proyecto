<?php
 
$host="localhost";
$usuario="root";
$password="";
$db="usuarios";

$conexion = new mysqli($host,$usuario,$password,$db);
$sql = "select * from ventas";
$query=$conexion->query($sql);
 

			
	$tbHtml="";
	if($query->num_rows>0){
		
	        echo "<table border='5px'>
             <header>
                <tr>
                  <th>ID</th>
                  <th>FECHAENTREGA</th>
                  <th>TIPO</th>
                  <th>VALOR</th>
				  <th>UBICACION</th>
              
                  </tr>
            </header>";
		

		
		while($res=$query->fetch_array())
		{
// Configuración imagen, traer ubicación de la tabla y luego colocar dentro
// del html para decirle donde esta la imagen
$z=$res['ubicacion'];
$x="<img src='$z' width='150' height='150' alt='Alargada' border='0'>";



		
         echo '<tr>
		<td>'.$res['id'].'</td>
		<td>'.$res['FechaEntrega'].$x.'</td>
		<td>'.$res['Tipo'].'</td>
		<td>'.$res['Valor'].'</td>
		<td>'.$res['ubicacion'].'</td>
	</tr>';
		}
		$tbHtml.= "</table>";
	}
	else
	{
	echo "No hay resultados";
	}
	//cambiar los datos por productos
	
?>
 
