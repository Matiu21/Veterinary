<?php
class Especialidades
{
	private $pdo;
    
    public $id_especialidades;
    public $tipo_especialidades;


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

			$stm = $this->pdo->prepare("SELECT * FROM especialidades");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $execute)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_especialidades)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM especialidades WHERE id_especialidades = ?");
			          

			$stm->execute(array($id_especialidades));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_especialidades)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM especialidades WHERE id_especialidades = ?");			          

			$stm->execute(array($id_especialidades));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE especialidades SET 
						tipo_especialidades          = ?
				    WHERE id_especialidades = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->tipo_especialidades,
                        $data->id_especialidades
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Especialidades $data)
	{
		try 
		{
		$sql = "INSERT INTO especialidades (tipo_especialidades) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->tipo_especialidades
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}