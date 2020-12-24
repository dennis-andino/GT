<?php


class Binnacle
{
private $connection;

    public function __construct()
    {
        $this->connection = databaseController::connect();
    }

    public function getAllEvents(){
        return $this->connection->query('SELECT * FROM BINNACLE ORDER BY id DESC;');
    }

    public function getCountTypeEvent(){
        return $this->connection->query("select typeevent,count(*) as total from binnacle group by typeevent;");
    }

    public function getCountDate(){
        return $this->connection->query("select date_event,count(*) as total from binnacle group by date_event;");
    }
    public function getCountHour(){
        return $this->connection->query("select LEFT(hour_event, 2) as hour_event,count(*) as total from binnacle group by hour_event;");
    }
    public function getCountEvetByMonth(){
        return $this->connection->query("SELECT SUBSTRING(date_event,6,2) AS month , count(*) as total FROM binnacle group by month;");
    }
    public static function registerExceptions($description,$username,$ip='127.0.0.1'):void{
        databaseController::connect()->query("INSERT INTO BINNACLE(typeevent, description,username, ip_address) VALUES ('Excepcion','{$description}','{$username}','{$ip}');");
    }







}