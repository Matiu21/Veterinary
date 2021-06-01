<?php
require_once 'model/historial.php';

class HistorialController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Historial();
    }
    
    public function Index(){
        require_once 'view/header2.php';
        require_once 'view/historial/historial.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Historial();
        
        if(isset($_REQUEST['idhistorial'])){
            $alm = $this->model->Obtener($_REQUEST['idhistorial']);
        }
        
        require_once 'view/header2.php';
        require_once 'view/historial/historial-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Historial();
        
        $alm->idhistorial = $_REQUEST['idhistorial'];
        $alm->fecha = $_REQUEST['fecha'];
        $alm->tipo_visita = $_REQUEST['tipo_visita'];
        $alm->pago = $_REQUEST['pago'];
        $alm->causa_visita = $_REQUEST['causa_visita'];
        $alm->id_mascota = $_REQUEST['id_mascota'];
        $alm->idReceta = $_REQUEST['idReceta'];

        $alm->idhistorial > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: historial.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idhistorial']);
        header('Location: historial.php');
    }
}