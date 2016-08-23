<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new Alumno();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('id',                         $_REQUEST['id']);
            $alm->__SET('NOMBRECLIENTE',              $_REQUEST['NOMBRECLIENTE']);
            $alm->__SET('TELEFONO',                   $_REQUEST['TELEFONO']);
            $alm->__SET('DIRECCION',                  $_REQUEST['DIRECCION']);
            $alm->__SET('PRODUCTOACOMPRAR',           $_REQUEST['PRODUCTOACOMPRAR']);
            $alm->__SET('FORMATODEPAGO',              $_REQUEST['FORMATODEPAGO']);
			$alm->__SET('NOMBREVENDEDOR',             $_REQUEST['NOMBREVENDEDOR']);

            $model->Actualizar($alm);
            header('Location: index.html');
            break;

        case 'registrar':
		    $alm->__SET('id',                         $_REQUEST['id']);
            $alm->__SET('NOMBRECLIENTE',              $_REQUEST['NOMBRECLIENTE']);
            $alm->__SET('TELEFONO',                   $_REQUEST['TELEFONO']);
            $alm->__SET('DIRECCION',                  $_REQUEST['DIRECCION']);
            $alm->__SET('PRODUCTOACOMPRAR',           $_REQUEST['PRODUCTOACOMPRAR']);
            $alm->__SET('FORMATODEPAGO',              $_REQUEST['FORMATODEPAGO']);
			$alm->__SET('NOMBREVENDEDOR',             $_REQUEST['NOMBREVENDEDOR']);

            $model->Registrar($alm);
            header('Location: index.html');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
            header('Location: index.html');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <style type="text/css">
        body {
	background-image: url(60647.gif);
}
        </style>
    <meta charset="utf-8">
    </head>
    <body >

    <div class="pure-g">
            <div class="pure-u-1-12">
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th >id</th>
                            <th >NOMBRECLIENTE</th>
                            <th >TELEFONO</th>
                            <th >DIRECCION</th>
                            <th >PRODUCTOACOMPRAR</th>
                            <th >FORMATODEPAGO</th>
                            <th >NOMBREVENDEDOR</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('id') ; ?></td>
                            <td><?php echo $r->__GET('NOMBRECLIENTE') ; ?></td>
                            <td><?php echo $r->__GET('TELEFONO') ; ?></td>
                            <td><?php echo $r->__GET('DIRECCION') ; ?></td>
                            <td><?php echo $r->__GET('PRODUCTOACOMPRAR' ); ?></td>
                            <td><?php echo $r->__GET('FORMATODEPAGO') ; ?></td>
                            <td><?php echo $r->__GET('NOMBREVENDEDOR') ; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>
    <p>&nbsp;</p>
        <form name="form1" method="post" action="index.html">
          <input type="submit" name="button" id="button" value="Pagina De Inicio">
        </form>
        <p>&nbsp;</p>

    </body>
</html>



