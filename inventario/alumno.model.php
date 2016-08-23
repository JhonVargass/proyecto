<?php

class AlumnoModel
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

            $stm = $this->pdo->prepare("SELECT * FROM pedidos");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Alumno();

                $alm->__SET('id', $r->id);
                $alm->__SET('TipoDeMueble', $r->TipoDeMueble);
                $alm->__SET('NumeroDepuestos', $r->NumeroDepuestos);
                $alm->__SET('ColorDeMadera', $r->ColorDeMadera);
                $alm->__SET('TipoDeMadera', $r->TipoDeMadera);

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
                      ->prepare("SELECT * FROM pedidos WHERE id = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new Alumno();

            $alm->__SET('id', $r->id);
            $alm->__SET('TipoDeMueble', $r->TipoDeMueble);
            $alm->__SET('NumeroDepuestos', $r->NumeroDepuestos);
            $alm->__SET('ColorDeMadera', $r->ColorDeMadera);
            $alm->__SET('TipoDeMadera', $r->TipoDeMadera);

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
                      ->prepare("DELETE FROM pedidos WHERE id = ?");                      

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
            $sql = "UPDATE pedidos SET 
                        TipoDeMueble          = ?, 
                        NumeroDepuestos        = ?,
                        ColorDeMadera            = ?, 
                        TipoDeMadera = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('TipoDeMueble'), 
                    $data->__GET('NumeroDepuestos'), 
                    $data->__GET('ColorDeMadera'),
                    $data->__GET('TipoDeMadera'),
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
        $sql = "INSERT INTO pedidos (id, TipoDeMueble,NumeroDepuestos,ColorDeMadera,TipoDeMadera) 
                VALUES (?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id'), 
				$data->__GET('TipoDeMueble'), 
                $data->__GET('NumeroDepuestos'), 
                $data->__GET('ColorDeMadera'),
                $data->__GET('TipoDeMadera')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>

