<style type="text/css">
body {
	background-image: url(image.jpg);
}
body,td,th {
	font-size: xx-large;
	color: #0F0;
}
</style>
<?php

class client
{
    private $id;
    private $NombreCliente;
    private $Apellido;
    private $Correo;
    private $Telefono;
    private $Direccion;
	private $Nombrevendedor;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
