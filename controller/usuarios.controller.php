<?php
require_once 'model/usuarios.php';

class UsuariosController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Usuarios();
    }
    
    public function Index(){
        require_once 'view/header7.php';
        require_once 'view/usuarios/usuarios.php';
        require_once 'view/footer7.php';
    }
    
    public function Crud(){
        $alm = new Usuarios();
        
        if(isset($_REQUEST['idusuarios'])){
            $alm = $this->model->Obtener($_REQUEST['idusuarios']);
        }
        
        require_once 'view/header7.php';
        require_once 'view/usuarios/usuarios-editar.php';
        require_once 'view/footer7.php';
    }
    
    public function Guardar(){
        $alm = new Usuarios();
        
        $alm->idusuarios = $_REQUEST['idusuarios'];
        $alm->nombre_usuario = $_REQUEST['nombre_usuario'];
        $alm->password = $_REQUEST['password'];

        $alm->idusuarios > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: usuarios.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idusuarios']);
        header('Location: usuarios.php');
    }
}