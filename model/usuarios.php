<?php
class Usuarios
{
	private $pdo;

    public $idusuarios;
    public $nombre_usuario;
    public $password;

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

			$stm = $this->pdo->prepare("SELECT * FROM usuarios");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idusuarios)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuarios WHERE idusuarios = ?");
			          

			$stm->execute(array($idusuarios));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idusuarios)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM usuarios WHERE idusuarios = ?");			          

			$stm->execute(array($idusuarios));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE usuarios SET 
						nombre_usuario          = ?, 
						password        = ?
				    WHERE idusuarios = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre_usuario, 
                        $data->password,
                        $data->idusuarios
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Usuarios $data)
	{
		try 
		{
		$sql = "INSERT INTO usuarios (nombre_usuario,password) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre_usuario,
                    $data->password
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}