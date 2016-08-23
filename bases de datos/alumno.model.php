<style type="text/css">
body {
	background-image: url(60646.gif);
}
body,td,th {
	color: #000;
}
</style>
<?php

class AlumnoModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=datos', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM muebles");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Alumno();

                $alm->__SET('id',                        $r->id);
                $alm->__SET('NOMBRECLIENTE',             $r->NOMBRECLIENTE);
                $alm->__SET('TELEFONO',                  $r->TELEFONO);
                $alm->__SET('DIRECCION',                 $r->DIRECCION);
                $alm->__SET('PRODUCTOACOMPRAR',          $r->PRODUCTOACOMPRAR);
				$alm->__SET('FORMATODEPAGO',             $r->FORMATODEPAGO);
            
		
				$alm->__SET('NOMBREVENDEDOR',            $r->NOMBREVENDEDOR);

                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM muebles WHERE id = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new Alumno();

                $alm->__SET('id',                            $r->id);
                $alm->__SET('NOMBRECLIENTE',                 $r->NOMBRECLIENTE);
                $alm->__SET('TELEFONO',                      $r->TELEFONO);
                $alm->__SET('DIRECCION',                     $r->DIRECCION);
                $alm->__SET('PRODUCTOACOMPRAR',              $r->PRODUCTOACOMPRAR);
				$alm->__SET('FORMATODEPAGO',                 $r->FORMATODEPAGO);
				$alm->__SET('NOMBREVENDEDOR',                $r->NOMBREVENDEDOR);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM muebles WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Alumno $data)
    {
        try 
        {
            $sql = "UPDATE muebles SET 
			            NOMBRECLIENTE              = ?, 
                        TELEFONO                   = ?, 
                        DIRECCION                  = ?,
                        PRODUCTOACOMPRAR           = ?, 
                        FORMATODEPAGO              = ?,
						NOMBREVENDEDOR             = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
				    $data->__GET('NOMBRECLIENTE'),
                    $data->__GET('TELEFONO'), 
                    $data->__GET('DIRECCION'), 
                    $data->__GET('PRODUCTOACOMPRAR'),
                    $data->__GET('FORMATODEPAGO'),
					$data->__GET('NOMBREVENDEDOR'),
                    $data->__GET('id')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Alumno $data)
    {
        try 
        {
        $sql = "INSERT INTO muebles (id, NOMBRECLIENTE, TELEFONO, DIRECCION, PRODUCTOACOMPRAR, FORMATODEPAGO, NOMBREVENDEDOR) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                    $data->__GET('id'), 
				    $data->__GET('NOMBRECLIENTE'),
                    $data->__GET('TELEFONO'), 
                    $data->__GET('DIRECCION'), 
                    $data->__GET('PRODUCTOACOMPRAR'),
                    $data->__GET('FORMATODEPAGO'),
					$data->__GET('NOMBREVENDEDOR')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>

