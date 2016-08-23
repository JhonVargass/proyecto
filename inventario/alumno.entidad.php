<?php

class Alumno
{
    private $id;
    private $TipoDeMueble;
    private $NumeroDepuestos;
    private $ColorDeMadera;
    private $TipoDeMadera;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
