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
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Usuarios();
        
        if(isset($_REQUEST['id_personas'])){
            $alm = $this->model->Obtener($_REQUEST['id_personas']);
        }
        
        require_once 'view/header7.php';
        require_once 'view/usuarios/usuarios-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Usuarios();
        
        $alm->id = $_REQUEST['id'];
        $alm->user_name = $_REQUEST['user_name'];
        $alm->display_name = $_REQUEST['display_name'];
        $alm->password = $_REQUEST['password'];
        $alm->email = $_REQUEST['email'];
        $alm->usuarios_id_personas = $_REQUEST['usuarios_id_personas'];
        $alm->idrol = $_REQUEST['idrol'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: usuarios.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: usuarios.php');
    }
}