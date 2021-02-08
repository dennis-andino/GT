<?php
/*
 * Desarrollado por : DennisM.Andino
 * Contactame a mi correo : dennis_andino@outlook.com
 * mi canal de Youtube: CodigoCompartido
 * proyecto disponible en : https://github.com/dennis-andino/GT
*/

session_start();
require_once 'core/autoload.php';
require_once 'core/parameters.php';
require_once 'core/databaseController.php';
require_once 'helpers/Utils.php';

if (isset($_GET['controller'])) {
    $name_controller = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $name_controller = controller_default;
    $action = action_default;
} else {
    exit();
}

if (class_exists($name_controller)) {
    $controller = new $name_controller();
    if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action'];
        $controller->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controller->$action_default();
    }else{
        homeController::logout();
    }
} else {
    homeController::logout();
}