<?php

class Tutorials
{
    private $id, $schedule, $petitioner, $subject, $filename, $reservdate, $requestdate, $details, $status, $period_, $score, $approvedby, $approval, $starttime, $finishtime, $stucomment, $tutcomment,$modality,$space,$connection;

    public function __construct()
    {
        $this->id = 0;
        $this->schedule = 0;
        $this->petitioner = 0;
        $this->subject = "";
        $this->details = "";
        $this->reservdate = "";
        $this->requestdate = "";
        $this->filename = "0";
        $this->status = 1;
        $this->period_ = 1;
        $this->score = 0;
        $this->approvedby = "";
        $this->approval = "";
        $this->starttime = "";
        $this->finishtime = "";
        $this->stucomment = "";
        $this->tutcomment = "";
        $this->modality=0;
        $this->space="No definido";
        $this->connection = database::connect();

    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getModality(): int
    {
        return $this->modality;
    }

    public function setModality(int $modality): void
    {
        $this->modality = $modality;
    }


    public function setSpace(string $space): void
    {
        $this->space = trim($space);
    }


    public function getSchedule(): int
    {
        return $this->schedule;
    }


    public function setSchedule(int $schedule): void
    {
        $this->schedule = $schedule;
    }


    public function getPetitioner(): int
    {
        return $this->petitioner;
    }


    public function setPetitioner(int $petitioner): void
    {
        $this->petitioner = $petitioner;
    }


    public function getSubject(): string
    {
        return $this->subject;
    }


    public function setSubject(string $subject): void
    {
        $this->subject = trim($subject);
    }


    public function getDetails(): string
    {
        return $this->details;
    }


    public function setDetails(string $details): void
    {
        $this->details = trim($details);
    }


    public function getStatus(): int
    {
        return $this->status;
    }


    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getScore(): int
    {
        return $this->score;
    }


    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    public function getApprovedby(): string
    {
        return $this->approvedby;
    }

    public function setApprovedby(string $approvedby): void
    {
        $this->approvedby = $approvedby;
    }


    public function getFilename(): string
    {
        return $this->filename;
    }


    public function setFilename(string $filename): void
    {
        if(!empty($filename)){
            $this->filename = trim($filename);
        }
    }


    public function getStucomment(): string
    {
        return $this->stucomment;
    }

    public function setStucomment(string $stucomment): void
    {
        $this->stucomment = trim($stucomment);
    }

    public function getReservdate(): string
    {
        return $this->reservdate;
    }

    public function setReservdate(string $reservdate): void
    {
        $this->reservdate = trim($reservdate);
    }

    public function getRequestdate(): string
    {
        return $this->requestdate;
    }

    public function setRequestdate(string $requestdate): void
    {
        $this->requestdate = trim($requestdate);
    }


    public function save()
    {
        $result = false;
        $query = "CALL CREATE_TUTORIA({$this->getSchedule()},{$this->getPetitioner()},'{$this->getSubject()}','{$this->getDetails()}','{$this->getReservdate()}','{$this->getRequestdate()}','{$this->getFilename()}',{$this->getModality()});";
        $con = $this->connection->query($query);
        $resultado = $con->fetch_assoc();
        if ($con && $resultado['error'] == 0) { //error=0 si no hay errores 1 si los hay
            $result = true;
        }
        return $result;
    }
    public function correctFileName(){
        return $this->connection->query("UPDATE TUTORIALS SET filename='0' WHERE id={$this->getId()};");
    }

    public function getNextSTutorials($career, $idStudent)
    {
        return $this->connection->query("SELECT * FROM VW_NEXTUTORIALS WHERE  (career={$career} OR  career=2 OR  career=1) AND (status=-1 OR status=1) AND petitioner != {$idStudent}");
    }

    public function joinToTut()
    {
        return $this->connection->query("INSERT INTO MEMBERS_ASSISTANCE(tutorial, student) VALUES ({$this->getId()},{$this->getPetitioner()});");
    }

    public function getMembers()
    {
        return $this->connection->query("SELECT ME.id,ME.assistance,L.alias,L.phone FROM MEMBERS_ASSISTANCE AS ME
                                         INNER JOIN LOGINS L on ME.student = L.id WHERE ME.tutorial={$this->getId()};");
    }

    public function deleteAmember($onemember)
    {
        return $this->connection->query("DELETE FROM MEMBERS_ASSISTANCE WHERE tutorial={$this->getId()} AND student={$onemember};");
    }

    public function getInfoTutorial() //obtiene la informacion de una tutoria
    {
        return $this->connection->query("SELECT id,schedule,studentname,tutorname,coursename,subject,details,reservdate,requestdate,filename,status,score,starttime,finishtime,tutcomment,stucomment,modality,space FROM GETTUTORIALINFO WHERE id={$this->getId()};");
    }

    /* -1 pendiente , 0 en proceso, 1 aprobado/programada ,2 finalizado,3 Cancelada  */
    public function approve()
    {
        return $this->connection->query("CALL aproval_tutoria({$this->getId()},{$this->getStatus()},{$this->getApprovedby()},'{$this->space}');");
    }


    public function deletetut($ip,$username)
    {
        return $this->connection->query("CALL delete_tutoria({$this->getId()},'{$username}','{$ip}');");
    }

    public function reconfigure()
    {
       return $this->connection->query("CALL update_tutoria({$this->getId()},{$this->getSchedule()},'{$this->getReservdate()}','{$this->space}');");
    }

    public function getHistorialStu()//Regresa el historial del solicitudes de un estudiante
    {
        return $this->connection->query("select id,coursename,subject,reservdate,concat(starttime,'-',finishtime) as schedule,tutor,space,modalidad,score,status from VW_NEXTUTORIALS where petitioner={$this->getPetitioner()} order by id desc limit 10;");
    }

    public function getHistoricGuest(){//Regresa el historial del uniones como invitado de un estudiante
        return $this->connection->query("SELECT coursename,subject,reservdate,schedule,tutor,space,modalidad FROM GET_GUEST_ASSISTANCE WHERE student={$this->getPetitioner()} AND petitioner!={$this->getPetitioner()} ORDER BY id DESC LIMIT 10 ;");
    }

    public function getTutByTutor($tutorid){
        return $this->connection->query("SELECT id,student,reservdate,schedule,coursename,subject,status FROM VW_TUTBYTUTORS WHERE tutorid={$tutorid} AND (status = 0 OR status = 1 OR status= 2)  order by id DESC;");
    }
    public function getAllTutorials()
    {
        return $this->connection->query("SELECT id,reservdate,schedule,coursename,status,tutor FROM VW_ALLTUTORIALS order by id desc;");
    }
    public function getAllTutResume($tutor)
    {
        return $this->connection->query("SELECT id,schedule,coursename,status FROM VW_TUTBYTUTORS WHERE tutorid={$tutor} order by status asc ;");
    }

    public  function checkAssistence(){
        return $this->connection->query("CALL register_assistence({$this->getId()});");
    }
    public function startTutorial(){
        date_default_timezone_set('America/Tegucigalpa');
        $startime=date('d-m-Y g:ia');
        return $this->connection->query("UPDATE TUTORIALS SET starttime='{$startime}',status=0 WHERE id={$this->getId()};");
    }

    public function stopTutorial(){
        date_default_timezone_set('America/Tegucigalpa');
        $finishtime=date('d-m-Y g:ia');
        return $this->connection->query("UPDATE TUTORIALS SET finishtime='{$finishtime}',status=2 WHERE id={$this->getId()};");
    }

    public function getCommentByTutor($tutorid){
        return $this->connection->query("select stucomment,score from tutorials WHERE tutor={$tutorid};");
    }

    public function getFrecuencyCourses(){
        return $this->connection->query("SELECT C.coursename,count(*) as total FROM TUTORIALS AS T INNER JOIN COURSES AS C ON T.asignatura=C.id GROUP BY C.coursename;");
    }

    public function getFrecuencybyPeriod(){
        return $this->connection->query("select P.description as period, count(*) AS total from tutorials AS T INNER JOIN PERIODS AS P on T.period_ = P.id GROUP BY period_ LIMIT 4;");
    }

    public function getEvaluation(){
        return $this->connection->query("SELECT evaluation,total from GET_EVALUATION;");
    }

    public function exists(){
        return $this->connection->query("SELECT id from tutorials where reservdate='{$this->reservdate}' AND tutor=(select tutor from sch_tut where id={$this->schedule}) AND initialtime=(select S.starttime FROM SCH_TUT AS SC INNER JOIN SCHEDULES S ON SC.schedule=S.id WHERE SC.id={$this->schedule} );");
    }

    public function getScoreStatistic($tutorid){
        return $this->connection->query("SELECT evaluation,total FROM GET_EVALUATION WHERE tutor={$tutorid};");
    }

    public function setEvaluation(){
        return $this->connection->query("UPDATE TUTORIALS SET score={$this->getScore()}, stucomment='{$this->getStucomment()}' WHERE id={$this->getId()};");
    }
}