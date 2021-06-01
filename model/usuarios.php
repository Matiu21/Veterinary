 <?php
class Personas
{
	private $pdo;

    public $id;
    public $user_name;
    public $display_name;
    public $password;
    public $email;
    public $usuarios_id_personas;
    public $idrol;


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

			$stm = $this->pdo->prepare("SELECT * FROM registered_users");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
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
			          ->prepare("SELECT * FROM registered_users WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
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
			            ->prepare("DELETE FROM registered_users WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE registered_users SET 

						user_name          = ?, 
						display_name        = ?,
                        password        = ?,
						email            = ?,
						usuarios_id_personas = ?,
						idrol = ?

				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->user_name, 
                        $data->display_name,
                        $data->password,
                        $data->email,
                        $data->usuarios_id_personas,
                        $data->idrol,
                        $data->id

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
		$sql = "INSERT INTO registered_users (user_name,display_name,password,email,usuarios_id_personas,idrol)

		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->user_name,
                    $data->display_name, 
                    $data->password, 
                    $data->email,
                    $data->usuarios_id_personas,
                    $data->idrol

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}