<?php

class user
{
    private $id, $username, $pass, $createOn, $lastUpdate, $fullName,$alias, $email, $phone, $campus, $career, $account, $birthDate, $admissionDate, $photo, $role, $clearpassword,$availability,$observations;
    private $connection;

    public function __construct()
    {
        $this->id = 0;
        $this->username = "";
        $this->pass = "";
        $this->createOn = "";
        $this->lastUpdate = "";
        $this->fullName = "";
        $this->email = "";
        $this->phone = "";
        $this->campus = 1;
        $this->birthDate = "";
        $this->admissionDate = "";
        $this->photo = "";
        $this->role = 0;
        $this->clearpassword = "";
        $this->career = 1;
        $this->account= "";
        $this->availability= 1;
        $this->alias="";
        $this->observations="";
        $this->connection = databaseController::connect();

    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $this->connection->real_escape_string($id);
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username): void
    {
        $this->username = $this->connection->real_escape_string(strtolower(trim($username)));
    }


    public function getPass()
    {
        return $this->pass;
    }


    public function setPass($password): void
    {
        $this->pass = password_hash($this->connection->real_escape_string(trim($password)), PASSWORD_BCRYPT, ['cost' => 4]);
    }


    public function getClearpassword(): string
    {
        return $this->clearpassword;
    }


    public function setClearpassword(string $clearpassword): void
    {
        $this->clearpassword = trim($clearpassword);
    }


    public function getCreateOn()
    {
        return $this->createOn;
    }


    public function setCreateOn($createOn): void
    {
        $this->createOn = $this->connection->real_escape_string($createOn);
    }


    public function getFullName()
    {
        return $this->fullName;
    }

    public function setFullName($fullName): void
    {
        $this->fullName = $this->connection->real_escape_string(ucfirst(trim($fullName)));
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email): void
    {
        $this->email = $this->connection->real_escape_string(trim($email));
    }


    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phoneNumber): void
    {
        $this->phone = $this->connection->real_escape_string($phoneNumber);
    }

    public function getCampus()
    {
        return $this->campus;
    }


    public function setCampus($campus): void
    {
        $this->campus = $this->connection->real_escape_string($campus);
    }


    public function getBirthDate()
    {
        return $this->birthDate;
    }


    public function setBirthDate($birthDate): void
    {
        $this->birthDate = $this->connection->real_escape_string($birthDate);
    }


    public function getAdmissionDate()
    {
        return $this->admissionDate;
    }

    public function setAdmissionDate($admissionDate): void
    {
        $this->admissionDate = $this->connection->real_escape_string($admissionDate);
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): void
    {
        $this->photo = $this->connection->real_escape_string($photo);
    }


    public function getLastUpdate(): string
    {
        return $this->lastUpdate;
    }


    public function setLastUpdate(string $lastUpdate): void
    {
        $this->lastUpdate = $this->connection->real_escape_string($lastUpdate);
    }

    public function getRole(): int
    {
        return $this->role;
    }

    public function setRole(int $role): void
    {
        $this->role = $this->connection->real_escape_string($role);
    }

    public function getCareer(): int
    {
        return $this->career;
    }


    public function setCareer(int $career): void
    {
        $this->career = $career;
    }


    public function getAccount(): string
    {
        return $this->account;
    }


    public function setAccount(string $account): void
    {
        $this->account = $account;
    }


    public function getAvailability(): int
    {
        return $this->availability;
    }


    public function setAvailability(int $availability): void
    {
        $this->availability = $availability;
    }


    public function getAlias(): string
    {
        return $this->alias;
    }


    public function setAlias(string $namefull): void
    {
        $array_nombre = explode(" ", $namefull);
       $this->alias=$array_nombre[0].' '.$array_nombre[2];
    }


    public function getObservations(): string
    {
        return $this->observations;
    }


    public function setObservations(string $observations): void
    {
        $this->observations = $observations;
    }






    public function save()
    {
        $result = false;
        $ipaddr=Utils::getIpClient();
        $query = "CALL REGISTER_USERS('{$this->getUsername()}','{$this->getPass()}',{$this->getRole()},'{$this->getCreateOn()}','{$this->getLastUpdate()}','{$this->getFullName()}',
        '{$this->getAlias()}','{$this->getEmail()}','{$this->getPhone()}',{$this->getCampus()},{$this->getCareer()},'{$this->getAccount()}','{$this->getBirthDate()}','{$this->getAdmissionDate()}','{$ipaddr}');";
        $con = $this->connection->query($query);

        $resultado = $con->fetch_assoc();
        if ($con && $resultado['id_user'] != 0) {
            $result = true;
        }
        return $result;
    }

    public function validateUser()
    {
        $result=false;
       $ip=Utils::getIpClient();
        $login = $this->connection->query("CALL LOGIN('{$this->getUsername()}','{$ip}');");
        if ($login && $login->num_rows ==1) {
            $datauser = $login->fetch_object();
            $verify_pass = password_verify($this->getClearpassword(), $datauser->pass);
            if ($verify_pass) {
                $result=$datauser;
            }
        }
        return $result;
    }

    public function getEmailByUsername(){
        return $this->connection->query("select id,email from logins where username='{$this->getUsername()}' LIMIT 1;");
    }

    public function updatePassword(){
        return $this->connection->query("UPDATE logins SET pass='{$this->getPass()}' WHERE id={$this->getId()};");
    }

    public function getAllusers($baseon = null)
    {
        $query = '';
        if ($baseon == 'Sys') {
            $query = "SELECT L.id,L.alias,R.privilege,L.email,L.phone,L.availability,R.baseon from LOGINS AS L inner join ROLES AS R on L.userRole = R.id WHERE  R.baseon ='Coordinator' OR R.baseon='Sys' ORDER BY id DESC;";
        } elseif ($baseon == 'Coordinator') {
            $query = "SELECT L.id,L.alias,R.privilege,L.email,L.phone,L.availability,R.baseon from LOGINS AS L inner join ROLES AS R on L.userRole = R.id WHERE  R.baseon ='student' OR R.baseon='Tutor' ORDER BY id DESC;";
        } else {
            return false;
        }
        return $this->connection->query($query);
    }

    public function getAllRoles($role){
        $query='';
        if($role=='Coordinator'){
            $query="select id,privilege from roles where baseon != 'Sys' order by privilege desc;";
        }elseif ($role=='Sys'){
            $query="select id,privilege from roles where baseon = 'Sys' or baseon='Coordinator' order by privilege desc;";
        }else{
            return false;
        }
        return $this->connection->query($query);
    }

    public function userInfo(){
        return $this->connection->query("select * from GET_USER_INFO where id={$this->getId()};");
    }

    public function userInfoedit(){
        return $this->connection->query("select * from UserInfoEdit where id ={$this->getId()}");
    }

    public function updateUser(){
        return $this->connection->query("UPDATE logins SET fullname='{$this->getFullName()}',userRole={$this->getRole()},email='{$this->getEmail()}',phone='{$this->getPhone()}',birthDate='{$this->getBirthDate()}',account='{$this->getAccount()}',career={$this->getCareer()},campus={$this->getCampus()},observations='{$this->getObservations()}' where id={$this->getId()};");
    }

    public function changueState(){
        return $this->connection->query("UPDATE logins SET availability={$this->getAvailability()} where id={$this->getId()};");
    }

    public function getTutorByCampus($campus){
        return $this->connection->query("select id,alias from logins where campus={$campus} and userRole=2;");
    }

    public function updateInfo(){
        return $this->connection->query("UPDATE LOGINS SET email='{$this->getEmail()}',birthDate='{$this->getBirthDate()}',phone='{$this->getPhone()}',observations='{$this->getObservations()}' WHERE id={$this->getId()};");
    }
    public function updatePhoto(){
        return $this->connection->query("UPDATE LOGINS SET photo='{$this->getPhoto()}' WHERE id={$this->getId()};");
    }
    public function updatePass(){
        return $this->connection->query("UPDATE LOGINS SET pass='{$this->getPass()}' WHERE id={$this->getId()};");
    }



}