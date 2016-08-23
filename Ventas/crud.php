<style type="text/css">
body {
	background-image: url(60646.gif);
<style type="text/css">
body {
	background-image: url(60646.gif);
}
</style>

<?php

require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new ven();
$model = new venModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('id',                         $_REQUEST['id']);
            $alm->__SET('FechaEntrega',              $_REQUEST['FechaEntrega']);
            $alm->__SET('Tipo',                   $_REQUEST['Tipo']);
            $alm->__SET('Valor',                  $_REQUEST['Valor']);


            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.html');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('id',                         $_REQUEST['id']);
			$alm->__SET('FechaEntrega',              $_REQUEST['FechaEntrega']);
            $alm->__SET('Tipo',                   $_REQUEST['Tipo']);
            $alm->__SET('Valor',                  $_REQUEST['Valor']);


            $model->Registrar($alm);
            echo "Guardo el Registro Exitosamente";

			//header('Location: index.html');
            //header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
			echo "Elimino el Registro Exitosamente";

           // header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id']);
            break;
    }
}

?>