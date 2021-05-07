<?php
class Mascota
{
	private $pdo;

    public $id_mascota;
    public $nombra_mascota;
    public $peso_mascota;
    public $tamaño_mascota;
    public $raza_mascota;
    public $fecha_nacimiento_mascota;

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

			$stm = $this->pdo->prepare("SELECT * FROM mascota");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_mascota)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM mascota WHERE id_mascota = ?");
			          

			$stm->execute(array($id_mascota));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_mascota)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM mascota WHERE id_mascota = ?");			          

			$stm->execute(array($id_mascota));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE mascota SET 
						nombra_mascota          = ?, 
						peso_mascota        = ?,
                        tamaño_mascota        = ?,
						raza_mascota            = ?,
						fecha_nacimiento_mascota = ?
				    WHERE id_mascota = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombra_mascota, 
                        $data->peso_mascota,
                        $data->tamaño_mascota,
                        $data->raza_mascota,
                        $data->fecha_nacimiento_mascota,
                        $data->id_mascota
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Mascota $data)
	{
		try 
		{
		$sql = "INSERT INTO mascota (nombra_mascota,peso_mascota,tamaño_mascota,raza_mascota,fecha_nacimiento_mascota) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombra_mascota,
                    $data->peso_mascota, 
                    $data->tamaño_mascota, 
                    $data->raza_mascota,
                    $data->fecha_nacimiento_mascota
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}