<?php

class Sections
{
    private $id, $description, $availability;
    private $connection;

    public function __construct()
    {
        $this->id = 0;
        $this->description = '';
        $this->availability = 1;
        $this->connection = databaseController::connect();
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getDescription(): string
    {
        return $this->description;
    }


    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    public function getAvailability(): int
    {
        return $this->availability;
    }


    public function setAvailability(int $availability): void
    {
        $this->availability = $availability;
    }


    public function getAllEnables()
    {
        return $this->connection->query('SELECT id,description FROM sections WHERE availability=1;');
    }

    public function getAll()
    {
        return $this->connection->query('SELECT * FROM sections ORDER BY id DESC');
    }

    public function create()
    {
        return $this->connection->query("INSERT INTO SECTIONS(description) VALUES('{$this->getDescription()}');");
    }

    public function delete()
    {
        return $this->connection->query("DELETE FROM SECTIONS WHERE id={$this->getId()}");
    }

    public function activate()
    {
        return $this->connection->query("UPDATE SECTIONS SET availability={$this->getAvailability()} WHERE id={$this->getId()};");
    }


}