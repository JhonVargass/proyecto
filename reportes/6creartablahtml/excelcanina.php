<?php
//Incluimos la conexion a la base de datos
include "conex.php";
//realizamos la consulta para traer los datos
$consulta="select idusuario,nombre,apellido,direccion,telefono,email,usuario from usuarios";

$bus = mysql_query($consulta);
//creacion de la tabla en html
$tbHtml = "<table>
             <header>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Direccion</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Usuario</th>
                  </tr>
            </header>";
 //Utilizamos el while para recorrer nuestros datos
 while ($fila = mysql_fetch_array($bus)) 
   {
  //Almacenamos 
  $tbHtml .= '<tr>'.'<td>'.$fila['idusuario'].'</td>'.'<td>'.$fila['nombre'].'</td>'.'<td>'.$fila['apellido'].'</td>'
  .'<td>'.$fila['direccion'].'</td>'.'<td>'.$fila['telefono'].'</td>'.'<td>'.$fila['email'].'</td>'
  .'<td>'.$fila['usuario'].'</td>'.'</tr>';
  
}
  
$tbHtml.= "</html>";
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=caninareport.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $tbHtml;

?>