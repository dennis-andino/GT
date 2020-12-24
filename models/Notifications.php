<?php

class Notifications
{
    private $id, $fromid, $destinationid, $subject, $content, $status, $date;
    private $connection;

    public function __construct()
    {
        $this->id = 1;
        $this->fromid = 1;
        $this->destinationid = 1;
        $this->subject = '';
        $this->content = '';
        $this->status = 0;
        $this->date = '';
        $this->connection = databaseController::connect();
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getFromid()
    {
        return $this->fromid;
    }


    public function setFromid($fromid): void
    {
        $this->fromid = $fromid;
    }


    public function getDestinationid()
    {
        return $this->destinationid;
    }


    public function setDestinationid($destinationid): void
    {
        $this->destinationid = $destinationid;
    }


    public function getSubject()
    {
        return $this->subject;
    }


    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }


    public function getContent()
    {
        return $this->content;
    }


    public function setContent($content): void
    {
        $this->content = $content;
    }


    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus($status): void
    {
        $this->status = $status;
    }


    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getNotReadByUser()
    {
        return $this->connection->query("CALL WATCH_NOTIFICATIONS({$this->getDestinationid()});");
    }
    public function getResumeNotReadByUser()
    {
        return $this->connection->query("SELECT subject,date FROM notifications WHERE destinationid={$this->destinationid} AND status=0 ORDER BY id DESC;");
    }


}