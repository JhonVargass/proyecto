<?php

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
            $alm->__SET('id',              $_REQUEST['id']);
            $alm->__SET('TipoDeMueble',          $_REQUEST['TipoDeMueble']);
            $alm->__SET('NumeroDepuestos',        $_REQUEST['NumeroDepuestos']);
            $alm->__SET('ColorDeMadera',            $_REQUEST['ColorDeMadera']);
            $alm->__SET('TipoDeMadera', $_REQUEST['TipoDeMadera']);

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.html');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('id',          $_REQUEST['id']);
			
			$alm->__SET('TipoDeMueble',          $_REQUEST['TipoDeMueble']);
            $alm->__SET('NumeroDepuestos',        $_REQUEST['NumeroDepuestos']);
            $alm->__SET('ColorDeMadera',            $_REQUEST['ColorDeMadera']);
            $alm->__SET('TipoDeMadera', $_REQUEST['TipoDeMadera']);

            $model->Registrar($alm);
            echo "Guardo el Registro Exitosamente";

			//header('Location: index.html');
            //header('Location: index.html');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
			echo "Elimino el Registro Exitosamente";

           // header('Location: index.html');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id']);
            break;
    }
}

?>