
<?php
$a="Chrysanthemum.jpg";
echo "<img src='uploads/$a' width='150' height='150' alt='Alargada' border='0'>";

$i=1;
$a=0;
$b=0;

$tbHtml = "<table border='1px'>
             <header>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>     
                  </tr>
            </header>";

			echo $tbHtml;
			
while($i<10)
{

$i=$i+1;
$a=$a+2;
$b=$b+3;

// cuando se agregue código a la variable cambiar la comilla doble por comilla sencilla
// dentro del código


echo '<tr>
		<td>'.$i.'</td>
		<td>'.$a.'</td>
		<td>'.$b.'</td>
	</tr>
	';
	
}

?>