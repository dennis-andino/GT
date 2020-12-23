<?php
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