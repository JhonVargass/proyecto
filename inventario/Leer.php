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
            header('Location: index.html');
            break;

        case 'registrar':
        $alm->__SET('id',              $_REQUEST['id']);
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
	color: #F90;
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
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                        <th >id</th>
                            <th >TipoDeMueble</th>
                            <th >NumeroDepuestos</th>
                            <th >ColorDeMadera</th>
                            <th >Nacimiento</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                        <td><?php echo $r->__GET('id'); ?></td>
                            <td><?php echo $r->__GET('TipoDeMueble'); ?></td>
                            <td><?php echo $r->__GET('NumeroDepuestos');?></td>
                            <td><?php echo $r->__GET('ColorDeMadera') ; ?></td>
                            <td><?php echo $r->__GET('TipoDeMadera');?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>



