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
            $alm->__SET('id',              $_REQUEST['id']);
            $alm->__SET('TipoDeMueble',          $_REQUEST['TipoDeMueble']);
            $alm->__SET('NumeroDepuestos',        $_REQUEST['NumeroDepuestos']);
            $alm->__SET('ColorDeMadera',            $_REQUEST['ColorDeMadera']);
            $alm->__SET('TipoDeMadera', $_REQUEST['TipoDeMadera']);

            $model->Actualizar($alm);
            header('Location: modificar.php');
            break;

        case 'registrar':
		$alm->__SET('id',          $_REQUEST['id']);
            $alm->__SET('TipoDeMueble',          $_REQUEST['TipoDeMueble']);
            $alm->__SET('NumeroDepuestos',        $_REQUEST['NumeroDepuestos']);
            $alm->__SET('ColorDeMadera',            $_REQUEST['ColorDeMadera']);
            $alm->__SET('TipoDeMadera', $_REQUEST['TipoDeMadera']);

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
	color: #FC0;
}
body {
	background-image: url(image.jpg);
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
                            <th >TipoDeMueble</th>
                            <td><input type="text" name="TipoDeMueble" value="<?php echo $alm->__GET('TipoDeMueble'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >NumeroDepuestos</th>
                            <td><input type="text" name="NumeroDepuestos" value="<?php echo $alm->__GET('NumeroDepuestos'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >ColorDeMadera</th>
                            <td><input type="text" name="ColorDeMadera" value="<?php echo $alm->__GET('ColorDeMadera'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >TipoDeMadera</th>
                            <td><input type="text" name="TipoDeMadera" value="<?php echo $alm->__GET('TipoDeMadera'); ?>"  /></td>
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
                            <th >id</th>
                            <th >TipoDeMueble</th>
                            <th >NumeroDepuestos</th>
                            <th >ColorDeMadera</th>
                            <th >Nacimiento</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                        <td><?php echo $r->__GET('id'); ?></td>
                            <td><?php echo $r->__GET('TipoDeMueble'); ?></td>
                            <td><?php echo $r->__GET('NumeroDepuestos'); ?></td>
                            <td><?php echo $r->__GET('ColorDeMadera') ; ?></td>
                            <td><?php echo $r->__GET('TipoDeMadera'); ?></td>
                            <td>
                                <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
            
        </div>
        <p>&nbsp;</p>
        <p>
    <form id="form1" name="form1" method="post" action="kadastca.html">
      <div align="right">
        <input type="submit" name="button" id="button" value="Inicio"/>
      </div>
          </form></th>
        </p>

    </body>
</html>




