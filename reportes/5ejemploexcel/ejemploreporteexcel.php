<?php

$paises = array(0=>'México','Venezuela','Colombia','Belice','Guatemala',
                 'Perú','Brasil','Panamá');

$tbHtml = "<table>
             <header>
                <tr>
                  <th>ID</th>
                  <th>País</th>
                </tr>
            </header>";
 
//foreach($paises as $indice=>$valor)
  $tbHtml .= "<tr><td>$indice</td><td>$valor</td></tr>";
$tbHtml .= "</html>";
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=paises.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $tbHtml;

?>