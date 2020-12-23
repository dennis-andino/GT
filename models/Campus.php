<?php

class Campus
{
    private $id, $connection;

    public function __construct()
    {
        $this->id = 0;
        $this->connection = database::connect();
    }

    public function getAllCampus()
    {
        return $this->connection->query("SELECT * FROM campus;");
    }

}