<?php

class venModel
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

            $stm = $this->pdo->prepare("SELECT * FROM ventas");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new ven();

                $alm->__SET('id',    			$r->id);
                $alm->__SET('FechaEntrega', 			$r->FechaEntrega);
                $alm->__SET('Tipo', 		$r->Tipo);
                $alm->__SET('Valor', 	$r->Valor);
				
				
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
                      ->prepare("SELECT * FROM ventas WHERE id = ?");
                    
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new ven();

            $alm->__SET('id',                 		 $r->id);
            $alm->__SET('FechaEntrega',              $r->FechaEntrega);
            $alm->__SET('Tipo',           			 $r->Tipo);
            $alm->__SET('Valor',     				 $r->Valor);
			

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
                      ->prepare("DELETE FROM ventas WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(ven $data)
    {
        try 
        {
            $sql = "UPDATE ventas SET 
                        FechaEntrega          = ?, 
                        Tipo        		  = ?,
                        Valor				  = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('FechaEntrega'), 
                    $data->__GET('Tipo'), 
                    $data->__GET('Valor'),
					
				
                    $data->__GET('id')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(ven $data)
    {
        try 
        {
        $sql = "INSERT INTO ventas (id,FechaEntrega,Tipo,Valor) 
                VALUES (?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id'), 
				$data->__GET('FechaEntrega'), 
                $data->__GET('Tipo'), 
                $data->__GET('Valor')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>

