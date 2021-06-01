 <?php
class Personas
{
	private $pdo;

    public $id_personas;
    public $identificacion_per;
    public $nombre_per;
    public $apellido_per;
    public $direccion_per;
    public $telefono_per;
    public $email;
    public $Tipo;
	public $especialidades_id_especialidades;
	public $mascota_id_mascota;
	public $tipoid;

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

			$stm = $this->pdo->prepare("SELECT * FROM personas");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_personas)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM personas WHERE id_personas = ?");
			          

			$stm->execute(array($id_personas));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_personas)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM personas WHERE id_personas = ?");			          

			$stm->execute(array($id_personas));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE personas SET 
						identificacion_per          = ?, 
						nombre_per        = ?,
                        apellido_per        = ?,
						direccion_per            = ?,
						telefono_per = ?,
						email = ?,
						Tipo = ?,
						especialidades_id_especialidades = ?,
						mascota_id_mascota = ?,
						tipoid =?

				    WHERE id_personas = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->identificacion_per, 
                        $data->nombre_per,
                        $data->apellido_per,
                        $data->direccion_per,
                        $data->telefono_per,
                        $data->email,
                        $data->Tipo,
                        $data->especialidades_id_especialidades,
						$data->mascota_id_mascota,
						$data->tipoid,
                        $data->id_personas

					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Personas $data)
	{
		try 
		{
		$sql = "INSERT INTO personas (identificacion_per,nombre_per,apellido_per,direccion_per,telefono_per,email,Tipo,especialidades_id_especialidades, mascota_id_mascota,tipoid)

		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->identificacion_per,
                    $data->nombre_per, 
                    $data->apellido_per, 
                    $data->direccion_per,
                    $data->telefono_per,
                    $data->email,
                    $data->Tipo,
              	    $data->especialidades_id_especialidades,
					$data->mascota_id_mascota,
					$data->tipoid
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}