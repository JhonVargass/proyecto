<style type="text/css">
body {
	background-image: url(60646.gif);
}
</style>
<?php

class Alumno
{
    private $id;
    private $NOMBRECLIENTE;
    private $TELEFONO;
    private $DIRECCION;
    private $PRODUCTOACOMPRAR;
    private $FORMATODEPAGO;
	private $NOMBREVENDEDOR;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
