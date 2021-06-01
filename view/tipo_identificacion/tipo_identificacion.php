<?php
if(!empty($_SESSION["userId"])) {
    switch($_SESSION["Tipo"]){
        case 3:
            require_once 'tipo_identificacion-admin.php';
            break;
        default:
    }
} else {
    require_once './view/login-form.php';
}
?>