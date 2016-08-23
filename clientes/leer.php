<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new client();
$model = new clientModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('id',                         $_REQUEST['id']);
            $alm->__SET('NombreCliente',              $_REQUEST['NombreCliente']);
            $alm->__SET('Apellido',                   $_REQUEST['Apellido']);
            $alm->__SET('Correo',                  $_REQUEST['Correo']);
            $alm->__SET('Telefono',           $_REQUEST['Telefono']);
            $alm->__SET('Direccion',              $_REQUEST['Direccion']);
			$alm->__SET('Nombrevendedor',             $_REQUEST['Nombrevendedor']);

            $model->Actualizar($alm);
            header('Location: index.html');
            break;

        case 'registrar':
		    $alm->__SET('id',                         $_REQUEST['id']);
            $alm->__SET('NombreCliente',              $_REQUEST['NombreCliente']);
            $alm->__SET('Apellido',                   $_REQUEST['Apellido']);
            $alm->__SET('Correo',                  $_REQUEST['Correo']);
            $alm->__SET('Telefono',           $_REQUEST['Telefono']);
            $alm->__SET('Direccion',              $_REQUEST['Direccion']);
			$alm->__SET('Nombrevendedor',             $_REQUEST['Nombrevendedor']);

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
	background-image: url(image.jpg);
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
                            <th >NombreCliente</th>
                            <th >Apellido</th>
                            <th >Correo</th>
                            <th >Telefono</th>
                            <th >Direccion</th>
                            <th >Nombrevendedor</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('id') ; ?></td>
                            <td><?php echo $r->__GET('NombreCliente') ; ?></td>
                            <td><?php echo $r->__GET('Apellido') ; ?></td>
                            <td><?php echo $r->__GET('Correo') ; ?></td>
                            <td><?php echo $r->__GET('Telefono' ); ?></td>
                            <td><?php echo $r->__GET('Direccion') ; ?></td>
                            <td><?php echo $r->__GET('Nombrevendedor') ; ?></td>
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

