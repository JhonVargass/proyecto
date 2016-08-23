<?php

class iniModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
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

            $stm = $this->pdo->prepare("SELECT * FROM sesion");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new ini();

                $alm->__SET('id',    			$r->id);
                $alm->__SET('NombreUsuario', 	$r->NombreUsuario);
                $alm->__SET('Contrasena', 		$r->Contrasena);
				
				
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
                      ->prepare("SELECT * FROM sesion WHERE id = ?");
                    
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new ini();

            $alm->__SET('id',                 		 $r->id);
            $alm->__SET('NombreUsuario',             $r->NombreUsuario);
            $alm->__SET('Contrasena',           	$r->Contrasena);

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
                      ->prepare("DELETE FROM sesion WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(ini $data)
    {
        try 
        {
            $sql = "UPDATE sesion SET 
                        NombreUsuario          = ?, 
                        Contrasena        		  = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('NombreUsuario'), 
                    $data->__GET('Contrasena'),
				
                    $data->__GET('id')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(ini $data)
    {
        try 
        {
        $sql = "INSERT INTO sesion (id,NombreUsuario,Contrasena) 
                VALUES (?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id'), 
				$data->__GET('NombreUsuario'), 
                $data->__GET('Contrasena')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>

