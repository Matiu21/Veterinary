<?php
require_once 'model/personas.php';

class PersonasController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Personas();
    }
    
    public function Index(){
        require_once 'view/header4.php';
        require_once 'view/personas/personas.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Personas();
        
        if(isset($_REQUEST['id_personas'])){
            $alm = $this->model->Obtener($_REQUEST['id_personas']);
        }
        
        require_once 'view/header4.php';
        require_once 'view/personas/personas-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Personas();
        
        $alm->id_personas = $_REQUEST['id_personas'];
        $alm->identificacion_per = $_REQUEST['identificacion_per'];
        $alm->nombre_per = $_REQUEST['nombre_per'];
        $alm->apellido_per = $_REQUEST['apellido_per'];
        $alm->direccion_per = $_REQUEST['direccion_per'];
        $alm->telefono_per = $_REQUEST['telefono_per'];
        $alm->email = $_REQUEST['email'];
        $alm->Tipo = $_REQUEST['Tipo'];
        $alm->especialidades_id_especialidades = $_REQUEST['especialidades_id_especialidades'];
        $alm->mascota_id_mascota = $_REQUEST['mascota_id_mascota'];
        $alm->tipoid = $_REQUEST['tipoid'];

        $alm->id_personas > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: personas.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_personas']);
        header('Location: personas.php');
    }
}