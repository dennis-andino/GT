<?php


class Courses
{
    private $id, $coursename, $career;
    private $connection;

    public function __construct()
    {
        $this->id = 0;
        $this->coursename = "";
        $this->career = 0;
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


    public function getCoursename(): string
    {
        return $this->coursename;
    }


    public function setCoursename(string $coursename): void
    {
        $this->coursename = $coursename;
    }


    public function getCareer(): int
    {
        return $this->career;
    }

    public function setCareer(int $career): void
    {
        $this->career = $career;
    }

    public function getCoursesByCareer()
    {
        return $this->connection->query("SELECT id,coursename FROM courses WHERE career='{$this->getCareer()}'or career=2 or career=1;");
    }

    public function getCoursesByCareerforTutors()
    {
        return $this->connection->query("SELECT id,coursename FROM courses WHERE career='{$this->getCareer()}';");
    }

    public function getAllCourses()
    {
        return $this->connection->query("SELECT id,coursename FROM courses;");

    }

    public function getCoursesByTutorial($idtutorial){
        return $this->connection->query("select id,coursename from courses where career=(select career from logins where id=(select petitioner from tutorials where id ={$idtutorial}));");
    }

    public function getTotalcoursesByCareer(){
        return $this->connection->query("SELECT C.id,C.description as career,COUNT(*) AS total FROM COURSES INNER JOIN CAREERS C on COURSES.career = C.id GROUP BY career;");
    }

    public function getAsignaturesByCareer()
    {
        return $this->connection->query("SELECT id,coursename FROM courses WHERE career={$this->getCareer()};");
    }

    public function update(){
        return $this->connection->query("UPDATE COURSES SET coursename='{$this->getCoursename()}' WHERE id={$this->getId()};");
    }

    public function create(){
        return $this->connection->query("INSERT INTO courses (coursename, career) VALUES ('{$this->getCoursename()}',{$this->getCareer()});");
    }



}