<?php


require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new ini();
$model = new iniModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('id',              $_REQUEST['id']);
            $alm->__SET('NombreUsuario',          $_REQUEST['NombreUsuario']);
            $alm->__SET('Contrasena',        $_REQUEST['Contrasena']);
			

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.html');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('id',              $_REQUEST['id']);
			$alm->__SET('NombreUsuario',          $_REQUEST['NombreUsuario']);
            $alm->__SET('Contrasena',        $_REQUEST['Contrasena']);

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