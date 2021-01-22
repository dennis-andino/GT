<?php
require_once 'models/User.php';


class homeController
{
    public static function index()
    {
        require_once 'views\login.php';
    }

    public function login()
    {
        if (isset($_POST['username']) && isset($_POST['pass'])) {
            $userlogin = new user();
            $userlogin->setUsername($_POST['username']);
            $userlogin->setClearpassword($_POST['pass']);
            $infouser = $userlogin->validateUser();
            if ($infouser) {
                $_SESSION['id'] = $infouser->id;
                $_SESSION['username'] = $infouser->username;
                $_SESSION['pass'] = $infouser->pass;
                $_SESSION['alias'] = $infouser->alias;
                $_SESSION['email'] = $infouser->email;
                $_SESSION['career'] = $infouser->career;
                $_SESSION['birthDate'] = $infouser->birthDate;
                $_SESSION['photo'] = $infouser->photo;
                $_SESSION['baseon'] = $infouser->baseon;
                $_SESSION['announcement'] = $infouser->announcement;
                $_SESSION['ownsched'] = $infouser->ownsched;
                $_SESSION['createtutoring'] = $infouser->createtutoring;
                $_SESSION['denytutoring'] = $infouser->denytutoring;
                $_SESSION['jointutoring'] = $infouser->jointutoring;
                $_SESSION['institution'] = $infouser->institution;
                $_SESSION['logo'] = $infouser->logo;
                $_SESSION['ip'] = Utils::getIpClient();
                require_once 'models/Notifications.php';
                $notification= new Notifications();
                $notification->setDestinationid((int)$_SESSION['id']);
               $consulta =$notification->getResumeNotReadByUser();
                if($consulta){
                    $_SESSION['notifications']=$consulta->fetch_all(MYSQLI_ASSOC);
                }
                if ($_SESSION['baseon'] == 'Student') {
                    header("Location:" . base_url . "home/student");
                } elseif ($_SESSION['baseon'] == 'Coordinator') {
                    header("Location:" . base_url . "home/coordinator");
                } elseif ($_SESSION['baseon'] == 'Tutor') {
                    header("Location:" . base_url . "home/tutor");
                } elseif ($_SESSION['baseon'] == 'Sys') {
                    header("Location:" . base_url . "home/sys");
                }else{
                   Self::logout();
                }
            } else {
                $_SESSION['loginstate']=array('tipo'=>'error','msj'=>'Usuario o contraseña Incorrecta! </br>Intentelo nuevamente !');
                header("Location:" . base_url . "home/index");//en caso de que el usuario/clave no sea validadas.
            }

        }
    }

    public static function student()
    {
        Utils::sessionOff(); // verifica si existe una sesion valida.
        try {
            require_once 'models/Tutorials.php';
            $nextutoials = new Tutorials();
            $nextutoials->setPetitioner($_SESSION['id']);
            $nexttutable = $nextutoials->getNextSTutorials((int)$_SESSION['career'], (int)$_SESSION['id']);
            if(!isset($_SESSION['asignatures'])){
                require_once 'models/Courses.php';
                $courses = new Courses();
                $courses->setCareer((int)$_SESSION['career']);
                $asignatures = $courses->getCoursesByCareer();
                $_SESSION['asignatures'] = $asignatures->fetch_all(MYSQLI_ASSOC);
            }
            if ($_SESSION['baseon'] == 'Student') {
                $_SESSION['panel'] = 'mainStudent';
                require_once 'views/Student/homeStudent.php';
            } else {
                Self::logout();
            }
        }catch (Exception $e){
            $_SESSION['panel'] = 'errorInk';
        } finally {
            require_once 'views/Student/homeStudent.php';
        }

    }


    public static function coordinator()
    {
        Utils::sessionOff(); // verifica si existe una sesion valida.
        try{
            if ($_SESSION['baseon'] == 'Coordinator') {
                require_once 'models/Tutorials.php';
                $tutorial_object = new Tutorials();
                $tutorials = $tutorial_object->getAllTutorials();
            } else {
                Self::logout();
            }
        }catch (Exception $e){
            $_SESSION['panel'] = 'errorInk';
        } finally {
            $_SESSION['panel'] = 'mainCoordinator';
            require_once 'views/Coordinator/homeCoordinator.php';
        }
    }

    public static function tutor()
    {
        Utils::sessionOff(); // verifica si existe una sesion valida.
        try {
            if ($_SESSION['baseon'] == 'Tutor') {
                require_once 'models/Tutorials.php';
                $tutorial_object = new Tutorials();
                $tutorials = $tutorial_object->getTutByTutor((int)$_SESSION['id']);
                $_SESSION['panel']='mainTutor';
            } else {
                Self::logout();
            }
        }catch (Exception $e){
            $_SESSION['panel']='errorInk';
            //$_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al procesar la informacion, intentalo de nuevo !", "type" => "error");
        } finally {
            if(isset($_POST)){
                unset($_POST);
            }
            require_once 'views/Tutor/homeTutor.php';
        }
    }


    public static function sys()
    {
        Utils::sessionOff(); // verifica si existe una sesion valida.
        databaseController::backupList();
    }

    public function save()
    {
        if (isset($_POST)) {
            date_default_timezone_set('America/Tegucigalpa');
            $createon = date("Y-m-d");
            $new_user = new user();
            $new_user->setFullName($_POST['fullname']);
            $new_user->setAlias($_POST['fullname']);
            $new_user->setEmail($_POST['email']);
            $new_user->setPhone($_POST['phone']);
            $new_user->setBirthDate($_POST['birthdate']);
            $new_user->setCampus((int)$_POST['campus']);
            $new_user->setCareer((int)$_POST['career']);
            $new_user->setAccount($_POST['account']);
            $new_user->setAdmissionDate($_POST['admissiondate']);
            $new_user->setUsername(strtolower($_POST['username']));
            $new_user->setPass($_POST['pass']);
            $new_user->setRole((int)$_POST['role']);
            $new_user->setCreateOn($createon);
            $new_user->setLastUpdate($createon);
            $save = $new_user->save();

            if ($save) {
                $_SESSION['register'] = true;
                header("Location:" . base_url . "home/index");
            } else {
                $_SESSION['register'] = false;
                header("Location:" . base_url . "home/register");

            }

        }

    }

    public static function logout()
    {
        if (isset($_SESSION)) {
            unset($_SESSION['id']);
            $_SESSION = array();
            session_unset();
            session_destroy();
            Utils::sessionOff();
        }
    }



}