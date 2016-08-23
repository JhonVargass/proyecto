<?php

$fp = fopen('contactos.txt','r');
if (!$fp) {echo 'ERROR: No ha sido posible abrir el archivo. Revisa su nombre y sus permisos.'; exit;}

$loop = 0; // contador de líneas
while (!feof($fp)) { // loop hasta que se llegue al final del archivo
$loop++;
$line = fgets($fp); // guardamos toda la línea en $line como un string
// dividimos $line en sus celdas, separadas por el caracter |
// e incorporamos la línea a la matriz $field
$field[$loop] = explode ('|', $line);
// generamos la salida HTML
echo '
 <div>
  <div>Nombre: '.$field[$loop][0].'</div>
  <div>Email: '.$field[$loop][1].'</div>
  <div>Website: '.$field[$loop][2].'</div>
  <div>Teléfono: '.$field[$loop][3].'</div>
 </div>
';
$fp++; // necesitamos llevar el puntero del archivo a la siguiente línea
}

fclose($fp);

?>