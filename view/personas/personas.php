<?php
session_start();
if(!empty($_SESSION["userId"])) {
    switch($_SESSION["Tipo"]){
        case 3:
            require_once 'personas-admin.php';
            break;
        default:
    }
} else {
    require_once './view/login-form.php';
}
?>