<?php
class Tipo_identificacion
{
	private $pdo;

    public $idtipo_identificacion;
    public $tipo_identificacion;

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

			$stm = $this->pdo->prepare("SELECT * FROM tipo_identificacion");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idtipo_identificacion)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tipo_identificacion WHERE idtipo_identificacion = ?");
			          

			$stm->execute(array($idtipo_identificacion));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idtipo_identificacion)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM tipo_identificacion WHERE idtipo_identificacion = ?");			          

			$stm->execute(array($idtipo_identificacion));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE tipo_identificacion SET 
						tipo_identificacion          = ?
				    WHERE idtipo_identificacion = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->tipo_identificacion,
                        $data->idtipo_identificacion
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Tipo_identificacion $data)
	{
		try 
		{
		$sql = "INSERT INTO tipo_identificacion (tipo_identificacion) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->tipo_identificacion
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}