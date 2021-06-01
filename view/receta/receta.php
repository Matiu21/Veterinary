<?php
if(!empty($_SESSION["userId"])) {
    switch($_SESSION["Tipo"]){
        case 2:
            require_once 'receta-vet.php';
            break;

        case 3:
            require_once 'receta-admin.php';
            break;
        default:
    }
} else {
    require_once './view/login-form.php';
}
?>