<?php


class database
{
public static function connect(){
    $con = new mysqli('localhost','root','','gtBD');
    $con->query("SET NAMES 'utf8'");
    return $con;
}
}