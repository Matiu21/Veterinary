<?php
session_start();

if(!empty($_SESSION["userId"])) {
    switch($_SESSION["Tipo"]){
        case 1:
        require_once 'consultas-user.html';
        break;

        case 2:
        require_once 'consultas-vet.html';
        break;

        case 3:
        require_once 'consultas-admin.html';

        default:
        echo "hola";

    }
} else {
    require_once './view/login-form.php';
}
?>