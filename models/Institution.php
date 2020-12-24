<?php
class Institution
{
    private $id,$name,$vision,$mision,$address,$telefone,$email,$logo;
    private $connection;

    public function __construct()
    {
        $this->id=1;
        $this->name='';
        $this->vision='';
        $this->mision='';
        $this->address='';
        $this->telefone='';
        $this->email='';
        $this->logo='';
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


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getVision(): string
    {
        return $this->vision;
    }


    public function setVision(string $vision): void
    {
        $this->vision = $vision;
    }


    public function getMision(): string
    {
        return $this->mision;
    }


    public function setMision(string $mision): void
    {
        $this->mision = $mision;
    }


    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }


    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function getLogo(): string
    {
        return $this->logo;
    }


    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }


    public function getInfo(){
        return $this->connection->query('SELECT * FROM INSTITUTION;');
    }

    public function updateInfo(){
        return $this->connection->query("UPDATE INSTITUTION SET name='{$this->name}',vision='{$this->vision}',mission='{$this->mision}',address='{$this->address}',telefone='{$this->telefone}',email='{$this->email}' WHERE id=1;");
    }

    public function updateLogo(){
        return $this->connection->query("UPDATE INSTITUTION SET logo='{$this->logo}' WHERE id={$this->id};");
    }



}