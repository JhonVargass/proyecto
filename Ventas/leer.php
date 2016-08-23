<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new ven();
$model = new venModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('id',              		 $_REQUEST['id']);
            $alm->__SET('FechaEntrega',          $_REQUEST['FechaEntrega']);
            $alm->__SET('Tipo',       		     $_REQUEST['Tipo']);
            $alm->__SET('Valor', 				 $_REQUEST['Valor']);
			

            $model->Actualizar($alm);
            header('Location: index.html');
            break;

        case 'registrar':
			$alm->__SET('id',          	   $_REQUEST['id']);
            $alm->__SET('FechaEntrega',          $_REQUEST['ValorEntrega']);
            $alm->__SET('Tipo',        $_REQUEST['Tipo']);
            $alm->__SET('Valor', $_REQUEST['Valor']);
			
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
        body,td,th {
	color: #FFF;
}
        body {
	background-image: url(../clientes/image.jpg);
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
                            <th >FechaEntrega</th>
                            <th >Tipo</th>
                            <th >Valor</th>
                           
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                        	<td><?php echo $r->__GET('id'); ?></td>
                            <td><?php echo $r->__GET('FechaEntrega'); ?></td>
                            <td><?php echo $r->__GET('Tipo'); ?></td>
                           <td><?php echo $r->__GET('Valor'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>
        <p>&nbsp;</p>
    <form name="form1" method="post" action="index.html">
          <input type="submit" name="button" id="button" value="Volver">
    </form>
</body>
</html>



