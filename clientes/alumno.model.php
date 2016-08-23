<style type="text/css">
body,td,th {
	font-size: xx-large;
}
body {
	background-image: url(image.jpg);
}
</style>

<?php

class clientModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '');
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

            $stm = $this->pdo->prepare("SELECT * FROM clientes");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new client();

                $alm->__SET('id',                        $r->id);
                $alm->__SET('NombreCliente',             $r->NombreCliente);
                $alm->__SET('Apellido',                  $r->Apellido);
                $alm->__SET('Correo',                 $r->Correo);
                $alm->__SET('Telefono',          $r->Telefono);
				$alm->__SET('Direccion',             $r->Direccion);
               
				$alm->__SET('Nombrevendedor',            $r->Nombrevendedor);

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
                      ->prepare("SELECT * FROM clientes WHERE id = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new client();

                $alm->__SET('id',                            $r->id);
                $alm->__SET('NombreCliente',                 $r->NombreCliente);
                $alm->__SET('Apellido',                      $r->Apellido);
                $alm->__SET('Correo',                     $r->Correo);
                $alm->__SET('Telefono',              $r->Telefono);
				$alm->__SET('Direccion',                 $r->Direccion);
				$alm->__SET('Nombrevendedor',                $r->Nombrevendedor);

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
                      ->prepare("DELETE FROM clientes WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(client $data)
    {
        try 
        {
            $sql = "UPDATE clientes SET 
			            NombreCliente              = ?, 
                        Apellido                   = ?, 
                        Correo                  = ?,
                        Telefono           = ?, 
                        Direccion              = ?,
						Nombrevendedor             = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
				    $data->__GET('NombreCliente'),
                    $data->__GET('Apellido'), 
                    $data->__GET('Correo'), 
                    $data->__GET('Telefono'),
                    $data->__GET('Direccion'),
					$data->__GET('Nombrevendedor'),
                    $data->__GET('id')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(client $data)
    {
        try 
        {
        $sql = "INSERT INTO clientes (id, NombreCliente, Apellido, Correo, Telefono, Direccion, Nombrevendedor) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                    $data->__GET('id'), 
				    $data->__GET('NombreCliente'),
                    $data->__GET('Apellido'), 
                    $data->__GET('Correo'), 
                    $data->__GET('Telefono'),
                    $data->__GET('Direccion'),
					$data->__GET('Nombrevendedor')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>

