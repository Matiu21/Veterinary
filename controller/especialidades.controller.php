<?php
require_once 'model/especialidades.php';

class EspecialidadesController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Especialidades();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/especialidades/especialidades.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Especialidades();
        
        if(isset($_REQUEST['id_especialidades'])){
            $alm = $this->model->Obtener($_REQUEST['id_especialidades']);
        }
        
        require_once 'view/header.php';
        require_once 'view/especialidades/especialidades-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Especialidades();
        
        $alm->id_especialidades = $_REQUEST['id_especialidades'];
        $alm->tipo_especialidades = $_REQUEST['tipo_especialidades'];

        $alm->id_especialidades > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: especialidades.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_especialidades']);
        header('Location: especialidades.php');
    }
}