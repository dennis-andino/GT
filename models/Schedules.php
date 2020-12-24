<?php

class Schedules
{
    private $id, $tutor, $schedule, $course, $availability, $starttime, $finishtime,$career, $campus;
    private $connection;

    public function __construct()
    {
        $this->id = 0;
        $this->tutor = "";
        $this->schedule = 0;
        $this->course = "";
        $this->availability = 1;
        $this->starttime="";
        $this->finishtime="";
        $this->career=0;
        $this->campus=0;
        $this->connection= databaseController::connect();
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSchedule(): int
    {
        return $this->schedule;
    }


    public function setSchedule(int $schedule): void
    {
        $this->schedule = $schedule;
    }


    public function getCourse(): string
    {
        return $this->course;
    }

    public function setCourse(string $course): void
    {
        $this->course = $course;
    }


    public function getCareer(): int
    {
        return $this->career;
    }


    public function setCareer(int $career): void
    {
        $this->career = $career;
    }

    public function getCampus(): int
    {
        return $this->campus;
    }

    public function setCampus(int $campus): void
    {
        $this->campus = $campus;
    }




    public function getStarttime()
    {
        return $this->starttime;
    }


    public function setStarttime($starttime): void
    {
        $this->starttime = $starttime;
    }


    public function getFinishtime()
    {
        return $this->finishtime;
    }


    public function setFinishtime($finishtime): void
    {
        $this->finishtime = $finishtime;
    }


    public function getAvailability(): int
    {
        return $this->availability;
    }


    public function setAvailability(int $availability): void
    {
        $this->availability = $availability;
    }


    public function getTutor(): string
    {
        return $this->tutor;
    }

    public function setTutor(string $tutor): void
    {
        $this->tutor = $tutor;
    }

    public function getAllSchedules(){
        return $this->connection->query("SELECT * FROM schedules");
    }

    public function getSch_tut(){
        return $this->connection->query("select id, concat(starttime,'-',finishtime) as schedule, coursename,tutor,availability from VW_SCHEDULES;");
    }

    public function getSchByTut(){
        return $this->connection->query("select id, concat(starttime,'-',finishtime) as schedule, coursename,tutor,availability from VW_SCHEDULES WHERE tutorid={$this->tutor};");
    }


    public function getSchedByCourse($idCourse)
    {
        return $this->connection->query("SELECT id,tutor,starttime,finishtime  FROM vw_schedules WHERE course={$idCourse};");
    }

    public function getSchedulesByTutor(){;
        return $this->connection->query("SELECT * FROM GET_SCH_BYTUTORS WHERE tutor={$this->getTutor()};");
    }
    public function activateSchedule(){
        return $this->connection->query("UPDATE schedules SET availability={$this->getAvailability()} WHERE id={$this->getId()};");
    }
    public function insertSchedule(){
        return $this->connection->query("INSERT INTO schedules (starttime, finishtime) VALUES ('{$this->getStarttime()}','{$this->getFinishtime()}');");
    }

    public function edit(){
        return $this->connection->query("UPDATE schedules SET starttime='{$this->getStarttime()}',finishtime='{$this->finishtime}' WHERE id={$this->getId()};");
    }

    public function saveSche_tut(){
        return $this->connection->query("INSERT INTO SCH_TUT(tutor, schedule, course) VALUES ({$this->getTutor()}, {$this->getSchedule()}, {$this->getCourse()});");
    }

    public function deleteSchedByTut(){
        return $this->connection->query("delete from SCH_TUT where id={$this->getId()};");
    }
    public function activateScheduleByTut(){
        return $this->connection->query("update sch_tut set availability={$this->getAvailability()} where id={$this->getId()};");
    }



}