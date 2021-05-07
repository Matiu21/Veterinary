<?php
class Receta
{
	private $pdo;
    
    public $idReceta;
    public $tipo_medicina;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
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

			$stm = $this->pdo->prepare("SELECT * FROM receta");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idReceta)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM receta WHERE idReceta = ?");
			          

			$stm->execute(array($idReceta));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idReceta)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM receta WHERE idReceta = ?");			          

			$stm->execute(array($idReceta));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE receta SET 
						tipo_medicina          = ?
				    WHERE idReceta = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->tipo_medicina, 
                        $data->idReceta
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Receta $data)
	{
		try 
		{
		$sql = "INSERT INTO receta (tipo_medicina) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->tipo_medicina
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}