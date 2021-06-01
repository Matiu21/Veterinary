<?php
class Historial
{
	private $pdo;
    
    public $idhistorial;
    public $fecha;
    public $tipo_visita;
    public $pago;
    public $causa_visita;
    public $id_mascota;
	public $idReceta;

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

			$stm = $this->pdo->prepare("SELECT * FROM historial INNER JOIN mascota ON mascota.id_mascota=historial.idhistorial INNER JOIN receta ON receta.idReceta=historial.idhistorial");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idhistorial)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM historial INNER JOIN mascota ON mascota.id_mascota=historial.idhistorial INNER JOIN receta ON receta.idReceta=historial.idhistorial where idhistorial = ?");
			          

			$stm->execute(array($idhistorial));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idhistorial)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM historial WHERE idhistorial = ?");			          

			$stm->execute(array($idhistorial));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE historial SET 
						fecha          = ?, 
						tipo_visita        = ?,
                        pago        = ?,
						causa_visita       = ?,
						id_mascota			=?,
						idReceta			=?
				    WHERE idhistorial = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->fecha, 
                        $data->tipo_visita,
                        $data->pago,
                        $data->causa_visita,
                        $data->id_mascota,
                        $data->idReceta,
                        $data->idhistorial
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(historial $data)
	{
		try 
		{
		$sql = "INSERT INTO historial (fecha,tipo_visita,pago,causa_visita,id_mascota, idReceta) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->fecha,
                    $data->tipo_visita, 
                    $data->pago, 
                    $data->causa_visita,
                    $data->id_mascota,
                    $data->idReceta
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}