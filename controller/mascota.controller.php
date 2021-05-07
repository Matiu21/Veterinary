<?php
require_once 'model/mascota.php';

class MascotaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Mascota();
    }
    
    public function Index(){
        require_once 'view/header3.php';
        require_once 'view/mascota/mascota.php';
        require_once 'view/footer3.php';
    }
    
    public function Crud(){
        $alm = new Mascota();
        
        if(isset($_REQUEST['id_mascota'])){
            $alm = $this->model->Obtener($_REQUEST['id_mascota']);
        }
        
        require_once 'view/header3.php';
        require_once 'view/mascota/mascota-editar.php';
        require_once 'view/footer3.php';
    }
    
    public function Guardar(){
        $alm = new Mascota();
        
        $alm->id_mascota = $_REQUEST['id_mascota'];
        $alm->nombra_mascota = $_REQUEST['nombra_mascota'];
        $alm->peso_mascota = $_REQUEST['peso_mascota'];
        $alm->tamaño_mascota = $_REQUEST['tamaño_mascota'];
        $alm->raza_mascota = $_REQUEST['raza_mascota'];
        $alm->fecha_nacimiento_mascota = $_REQUEST['fecha_nacimiento_mascota'];

        $alm->id_mascota > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: mascota.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_mascota']);
        header('Location: mascota.php');
    }
}