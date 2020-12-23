<?php

class Sections
{
private $id,$description,$availability;
    private $connection;

    public function __construct()
    {
        $this->id=0;
        $this->description='';
        $this->availability=1;
        $this->connection = database::connect();
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    public function setAvailability(int $availability): void
    {
        $this->availability = $availability;
    }
    public function getAllEnables(){
        return $this->connection->query('SELECT description FROM sections WHERE availability=1;');
    }







}