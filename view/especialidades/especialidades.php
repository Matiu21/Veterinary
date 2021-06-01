<?php
session_start();

if(!empty($_SESSION["userId"])) {
    switch($_SESSION["Tipo"]){
        case 2:
            require_once 'especialidades-vet.php';
            break;

        case 3:
            require_once 'especialidades-admin.php';
            break;
        default:
    }
} else {
    require_once './view/login-form.php';
}
?>