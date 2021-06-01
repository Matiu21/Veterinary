<?php
if(!empty($_SESSION["userId"])) {
    switch($_SESSION["Tipo"]){
        case 1:
            require_once 'historial-user.php';
            break;

        case 2:
            require_once 'historial-vet.php';
            break;

        case 3:
            require_once 'historial-admin.php';
            break;
        default:
    }
} else {
    require_once './view/login-form.php';
}
?>