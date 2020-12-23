<?php


class Careers
{

    private $id,$name, $connection;
    public function __construct()
    {
        $this->id = 0;
        $this->name = '';
        $this->connection = database::connect();
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function setName(string $name): void
    {
        $this->name =  ucfirst(trim($name));
    }


    public function getAllCareers()
    {
        return $this->connection->query("SELECT * FROM CAREERS;");
    }

    public function update()
    {
        return $this->connection->query("UPDATE CAREERS SET description='{$this->name}' WHERE id={$this->id};");
    }

    public function create($username,$ip){
        return $this->connection->query("CALL CREATE_CAREER('{$this->name}','{$username}','{$ip}');");
    }



}