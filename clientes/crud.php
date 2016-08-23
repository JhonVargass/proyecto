<style type="text/css">
body,td,th {
	font-size: xx-large;
}
body {
	background-image: url(colores-primavera-decoraci%C3%B3n-homepersonalshopper-3.jpg);
}
</style>
<?php



require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new client();
$model = new clientModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
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
            //header('Location: index.html');
            header('Location: index.html');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('id',                         $_REQUEST['id']);
			$alm->__SET('NombreCliente',              $_REQUEST['NombreCliente']);
            $alm->__SET('Apellido',                   $_REQUEST['Apellido']);
            $alm->__SET('Correo',                  $_REQUEST['Correo']);
            $alm->__SET('Telefono',           $_REQUEST['Telefono']);
            $alm->__SET('Direccion',              $_REQUEST['Direccion']);
			$alm->__SET('Nombrevendedor',             $_REQUEST['Nombrevendedor']);


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