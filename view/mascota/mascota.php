<?php
session_start();
if(!empty($_SESSION["userId"])) {
    switch($_SESSION["Tipo"]){
        case 1:
            require_once 'mascota-user.php';
            break;

        case 2:
            require_once 'mascota-vet.php';
            break;

        case 3:
            require_once 'mascota-admin.php';
            break;
        default:
    }
} else {
    require_once './view/login-form.php';
}
?>