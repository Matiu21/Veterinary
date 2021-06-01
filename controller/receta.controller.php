<?php
require_once 'model/receta.php';

class RecetaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Receta();
    }
    
    public function Index(){
        require_once 'view/header5.php';
        require_once 'view/receta/receta.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Receta();
        
        if(isset($_REQUEST['idReceta'])){
            $alm = $this->model->Obtener($_REQUEST['idReceta']);
        }
        
        require_once 'view/header5.php';
        require_once 'view/receta/receta-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Receta();
        
        $alm->idReceta = $_REQUEST['idReceta'];
        $alm->tipo_medicina = $_REQUEST['tipo_medicina'];

        $alm->idReceta > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: receta.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idReceta']);
        header('Location: receta.php');
    }
}