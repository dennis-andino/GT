<?php
/*
 * Desarrollado por : DennisM.Andino
 * Contactame a mi correo : dennis_andino@outlook.com
 * mi canal de Youtube: CodigoCompartido
 * proyecto disponible en : https://github.com/dennis-andino/GT
*/
require_once 'models/Campus.php';
class campusController
{
    public function __construct()
    {
    }

    public function getAllCampus(){
        $campusObject=new Campus();
        $campus=$campusObject->getAllCampus();

    }



}