<?php
require_once 'model/tipo_identificacion.php';

class tipo_identificacionController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Tipo_identificacion();
    }
    
    public function Index(){
        require_once 'view/header6.php';
        require_once 'view/tipo_identificacion/tipo_identificacion.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Tipo_identificacion();
        
        if(isset($_REQUEST['idtipo_identificacion'])){
            $alm = $this->model->Obtener($_REQUEST['idtipo_identificacion']);
        }
        
        require_once 'view/header6.php';
        require_once 'view/tipo_identificacion/tipo_identificacion-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Tipo_identificacion();
        
        $alm->idtipo_identificacion = $_REQUEST['idtipo_identificacion'];
        $alm->tipo_identificacion = $_REQUEST['tipo_identificacion'];


        $alm->idtipo_identificacion > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: tipo_identificacion.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idtipo_identificacion']);
        header('Location: tipo_identificacion.php');
    }
}