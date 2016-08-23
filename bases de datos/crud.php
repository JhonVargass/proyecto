<style type="text/css">
body {
	background-image: url(60646.gif);
}
</style>

<?php

// Pagina Princilap index.html
// Explicar sentencia por Sentencia.

// id
// NOMBRECLIENTE
// TELEFONO
// DIRECCION
// PRODUCTOACOMPRAR
// FORMATODEPAGO
// NOMBREVENDEDOR

require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new Alumno();
$model = new AlumnoModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
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
            //header('Location: index.html');
            header('Location: index.html');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('id',                         $_REQUEST['id']);
			$alm->__SET('NOMBRECLIENTE',              $_REQUEST['NOMBRECLIENTE']);
            $alm->__SET('TELEFONO',                   $_REQUEST['TELEFONO']);
            $alm->__SET('DIRECCION',                  $_REQUEST['DIRECCION']);
            $alm->__SET('PRODUCTOACOMPRAR',           $_REQUEST['PRODUCTOACOMPRAR']);
            $alm->__SET('FORMATODEPAGO',              $_REQUEST['FORMATODEPAGO']);
			$alm->__SET('NOMBREVENDEDOR',             $_REQUEST['NOMBREVENDEDOR']);


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