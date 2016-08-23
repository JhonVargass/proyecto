<?php

class ini
{
    private $id;
    private $NombreUsuario;
    private $Contrasena;
 

	

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
