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
            $alm->__SET('id',             	    $_REQUEST['id']);
            $alm->__SET('FechaEntrega',        $_REQUEST['FechaEntrega']);
            $alm->__SET('Tipo',        		$_REQUEST['Tipo']);
            $alm->__SET('Valor',            $_REQUEST['Valor']);
            $model->Actualizar($alm);
            header('Location: modificar.php');
            break;

        case 'registrar':
			$alm->__SET('id',              	    $_REQUEST['id']);
            $alm->__SET('FechaEntrega',        $_REQUEST['FechaEntrega']);
            $alm->__SET('Tipo',        		$_REQUEST['Tipo']);
            $alm->__SET('Valor',            $_REQUEST['Valor']);
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
	font-size: 18px;
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
                
                <form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
                    
                    <table >
                    	<tr>
                            <th >id</th>
                            <td><input type="text" name="id" value="<?php echo $alm->__GET('id'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >FechaEntrega</th>
                            <td><input type="text" name="FechaEntrega" value="<?php echo $alm->__GET('FechaEntrega'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Tipo</th>
                            <td><input type="text" name="Tipo" value="<?php echo $alm->__GET('Tipo'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Valor</th>
                            <td><input type="text" name="Valor" value="<?php echo $alm->__GET('Valor'); ?>"  /></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                        	<th>id</th>
                            <th>FechaEntrega</th>
                            <th>Tipo</th>
                            <th>Valor</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                        	<td><?php echo $r->__GET('id') ; ?></td>
                            <td><?php echo $r->__GET('FechaEntrega') ; ?></td>
                            <td><?php echo $r->__GET('Tipo') ; ?></td>
                            <td><?php echo $r->__GET('Valor') ; ?></td>                            <td>
                                <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <p>&nbsp;</p>     
              
            </div>
        </div>
        
        <form name="form1" method="post" action="index.html">
          <input type="submit" name="button" id="button" value="Pagina de Inicio">
        </form>
        <p>&nbsp;</p>

    </body>
</html>

