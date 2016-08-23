<?php

class ven
{
    private $id;
    private $FechaEntrega;
    private $Tipo;
    private $Valor;

	

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
