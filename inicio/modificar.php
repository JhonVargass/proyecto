<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new ini();
$model = new iniModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('id',             	    $_REQUEST['id']);
            $alm->__SET('NombreUsuario',        $_REQUEST['NombreUsuario']);
            $alm->__SET('Contrasena',        		$_REQUEST['Contrasena']);
            $model->Actualizar($alm);
            header('Location: modificar.php');
            break;

        case 'registrar':
			$alm->__SET('id',              	    $_REQUEST['id']);
            $alm->__SET('NombreUsuario',        $_REQUEST['NombreUsuario']);
            $alm->__SET('Contrasena',        		$_REQUEST['Contrasena']);
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
                            <th >NombreUsuario</th>
                            <td><input type="text" name="NombreUsuario" value="<?php echo $alm->__GET('NombreUsuario'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Contrasena</th>
                            <td><input type="text" name="Contrasena" value="<?php echo $alm->__GET('Contrasena'); ?>"  /></td>
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
                            <th>NombreUsuario</th>
                            <th>Contrasena</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                        	<td><?php echo $r->__GET('id') ; ?></td>
                            <td><?php echo $r->__GET('NombreUsuario') ; ?></td>
                            <td><?php echo $r->__GET('Contrasena') ; ?></td>
                                <a href="">Editar</a>
                            </td>
                            <td>
                                <a href="">Eliminar</a>
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

