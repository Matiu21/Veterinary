<?php
require_once 'model/database.php';

$controller = 'tipo_identificacion';
// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c6']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c6']);
    $accion = isset($_REQUEST['a6']) ? $_REQUEST['a6'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}


