<?php
session_start();
if(!empty($_SESSION["userId"])) {
    require_once './consultas.html';
} else {
    require_once './view/login-form.php';
}
?>