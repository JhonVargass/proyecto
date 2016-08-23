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
            $alm->__SET('id',             	    $_REQUEST['id']);
            $alm->__SET('NOMBRECLIENTE',        $_REQUEST['NOMBRECLIENTE']);
            $alm->__SET('TELEFONO',        		$_REQUEST['TELEFONO']);
            $alm->__SET('DIRECCION',            $_REQUEST['DIRECCION']);
            $alm->__SET('PRODUCTOACOMPRAR', 	$_REQUEST['PRODUCTOACOMPRAR']);
			$alm->__SET('FORMATODEPAGO',        $_REQUEST['FORMATODEPAGO']);
			$alm->__SET('NOMBREVENDEDOR',       $_REQUEST['NOMBREVENDEDOR']);

            $model->Actualizar($alm);
            header('Location: modificar.php');
            break;

        case 'registrar':
			$alm->__SET('id',              	    $_REQUEST['id']);
            $alm->__SET('NOMBRECLIENTE',        $_REQUEST['NOMBRECLIENTE']);
            $alm->__SET('TELEFONO',        		$_REQUEST['TELEFONO']);
            $alm->__SET('DIRECCION',            $_REQUEST['DIRECCION']);
            $alm->__SET('PRODUCTOACOMPRAR', 	$_REQUEST['PRODUCTOACOMPRAR']);
			$alm->__SET('FORMATODEPAGO',        $_REQUEST['FORMATODEPAGO']);
			$alm->__SET('NOMBREVENDEDOR',       $_REQUEST['NOMBREVENDEDOR']);

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
	color: #90F;
	font-size: 18px;
}
body {
	background-image: url(60647.gif);
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
                            <th >NOMBRECLIENTE</th>
                            <td><input type="text" name="NOMBRECLIENTE" value="<?php echo $alm->__GET('NOMBRECLIENTE'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >TELEFONO</th>
                            <td><input type="text" name="TELEFONO" value="<?php echo $alm->__GET('TELEFONO'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >DIRECCION</th>
                            <td><input type="text" name="DIRECCION" value="<?php echo $alm->__GET('DIRECCION'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >PRODUCTOACOMPRAR</th>
                            <td><input type="text" name="PRODUCTOACOMPRAR" value="<?php echo $alm->__GET('PRODUCTOACOMPRAR'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >FORMATODEPAGO</th>
                            <td><input type="text" name="FORMATODEPAGO" value="<?php echo $alm->__GET('FORMATODEPAGO'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >NOMBREVENDEDOR</th>
                            <td><input type="text" name="NOMBREVENDEDOR" value="<?php echo $alm->__GET('NOMBREVENDEDOR'); ?>"  /></td>
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
                            <th>NOMBRECLIENTE</th>
                            <th>TELEFONO</th>
                            <th>DIRECCION</th>
                            <th>PRODUCTOACOMPRAR</th>
                            <th>FORMATODEPAGO</th>
                            <th>NOMBREVENDEDOR</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                        	<td><?php echo $r->__GET('id') ; ?></td>
                            <td><?php echo $r->__GET('NOMBRECLIENTE') ; ?></td>
                            <td><?php echo $r->__GET('TELEFONO') ; ?></td>
                            <td><?php echo $r->__GET('DIRECCION') ; ?></td>
                            <td><?php echo $r->__GET('PRODUCTOACOMPRAR') ; ?></td>
                            <td><?php echo $r->__GET('FORMATODEPAGO') ; ?></td>
                            <td><?php echo $r->__GET('NOMBREVENDEDOR') ; ?></td>
                            <td>
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





