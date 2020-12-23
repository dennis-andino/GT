<?php
require_once 'models/User.php';

class usersController
{
    private $userObject;

    public function index()
    {
        try{
            $userObject = new user();
            $userslist = $userObject->getAllusers($_SESSION['baseon']);
            if (!isset($_SESSION['careers']) && !isset($_SESSION['campus'])) {
                require_once 'models/Careers.php';
                require_once 'models/Campus.php';
                $objectCareer = new Careers();
                $objectCampus = new Campus();
                $_SESSION['roles'] = $userObject->getAllRoles($_SESSION['baseon'])->fetch_all(MYSQLI_ASSOC);
                $_SESSION['careers'] = $objectCareer->getAllCareers()->fetch_all(MYSQLI_ASSOC);
                $_SESSION['campus'] = $objectCampus->getAllCampus()->fetch_all(MYSQLI_ASSOC);;
            }
        }catch (Exception $e){
            $_SESSION['panel'] = 'errorInk';
        } finally {
            $_SESSION['panel'] = 'usersModuleInk';
            if ($_SESSION['baseon'] == 'Coordinator') {
                require_once 'views\Coordinator\homeCoordinator.php';
            } elseif ($_SESSION['baseon'] == 'Sys') {
                require_once 'views\Administrator\homeSys.php';
            } else {
                logout();
            }
        }
    }

    public function save()
    {
        try{
            if (isset($_POST)) {
                date_default_timezone_set('America/Tegucigalpa');
                $createon = date("Y-m-d");
                $new_user = new user();
                $new_user->setFullName($_POST['fullname']);
                $new_user->setAlias($new_user->getFullName());
                $new_user->setEmail($_POST['email']);
                $new_user->setPhone($_POST['phone']);
                $new_user->setBirthDate($_POST['birthdate']);
                $new_user->setCampus((int)$_POST['campus']);
                $new_user->setCareer((int)$_POST['career']);
                $new_user->setAccount($_POST['account']);
                $new_user->setAdmissionDate($_POST['admissiondate']);
                $new_user->setUsername($_POST['username']);
                $new_user->setPass($_POST['pass']);
                $new_user->setRole((int)$_POST['role']);
                $new_user->setCreateOn($createon);
                $new_user->setLastUpdate($createon);
                $save = $new_user->save();
                if ($save) {
                    $_SESSION['alert'] = array("title" => "Usuario registrado", "msj" => "El usuario se ha creado existosamente.", "type" => "success");
                } else {
                    $_SESSION['alert'] = array("title" => "Usuario ya existe", "msj" => "El usuario {$new_user->getUsername()} ya existe, intenta con otro usuario, si el problema persiste comunicate con el administrador del sistema.", "type" => "error");
                }
            }else{
                $_SESSION['alert'] = array("title" => "Informacion incompleta", "msj" => "Upps :( , Algo salio mal, la informacion recibida es incompleta.", "type" => "error");
            }
        }catch (Exception $e){
            $_SESSION['alert'] = array("title" => "Upps !", "msj" => "Algo salio mal, no pudimos agrear el nuevo usuario.", "type" => "error");
        } finally {
            header('Location:'.base_url.'users/index');
        }
    }

    public function userInfo()
    {
        try{
            if (isset($_POST['iduser']) && isset($_POST['role'])) {
                $_SESSION['panel'] = 'userprofile';
                $userObject = new user();
                $userObject->setId((int)$_POST['iduser']);
                $user = $userObject->userInfo()->fetch_object();
                if (isset($_POST['role']) && $_POST['role'] == 'Tutor') {
                    require_once 'models/Schedules.php';
                    require_once 'models/Tutorials.php';
                    $objectSchedules = new Schedules();
                    $tutorial_object = new Tutorials();
                    $objectSchedules->setTutor((int)$_POST['iduser']);
                    $tutorials = $tutorial_object->getAllTutResume((int)$_POST['iduser']);
                    $comments = $tutorial_object->getCommentByTutor((int)$_POST['iduser']);
                    $schedule = $objectSchedules->getSchedulesByTutor();
                }
            } else {
                $_SESSION['alert'] = array("title" => "Upps !", "msj" => "Algo salio mal, no pudimos obtener la informacion del usuario.", "type" => "error");
                self::index();
            }
        }catch (Exception $e){
            $_SESSION['panel'] = 'errorInk';
        } finally {
            require_once 'views/Coordinator/homeCoordinator.php';
        }
    }

    public function myAccountInfo()
    {
        if (isset($_SESSION['id'])) {
            try {
                $userObject = new user();
                $userObject->setId((int)$_SESSION['id']);
                $user = $userObject->userInfo()->fetch_object();
                $_SESSION['panel'] = 'accountInk';
            } catch (Exception $e) {
                $_SESSION['panel'] = 'errorInk';
            } finally {
                if ($_SESSION['baseon'] == 'Tutor') {
                    require_once 'views/Tutor/homeTutor.php';
                } else if ($_SESSION['baseon'] == 'Coordinator') {
                    require_once 'views/Coordinator/homeCoordinator.php';
                } else if ($_SESSION['baseon'] == 'Student') {
                    require_once 'views/Student/homeStudent.php';
                } else if ($_SESSION['baseon'] == 'Sys') {
                    require_once 'views/Administrator/homeSys.php';
                } else {
                    homeController::logout();
                }
            }
        }
    }

    public function getEditUser()
    {
        if (isset($_POST['editId'])) {
            $userObject = new user();
            $userObject->setId((int)$_POST['editId']);
            $userinfo = $userObject->userInfoedit()->fetch_assoc();
            require_once 'views/Coordinator/modaledit.php';
        }
    }

    public function updateUserInfo()
    {
        try {
            if (isset($_POST['iduser'])) {
                $userObject = new user();
                $userObject->setId($_POST['iduser']);
                $userObject->setFullName($_POST['fullname']);
                $userObject->setRole($_POST['role']);
                $userObject->setEmail($_POST['email']);
                $userObject->setPhone($_POST['phone']);
                $userObject->setBirthDate($_POST['birthdate']);
                $userObject->setAccount($_POST['account']);
                $userObject->setCareer($_POST['career']);
                $userObject->setCampus($_POST['campus']);
                $userObject->setObservations($_POST['observations']);
                if ($userObject->updateUser()) {
//se actualizo la informacion
                    $_SESSION['alert'] = array("title" => "Informacion actualizada", "msj" => " Se ha actualizado tu informacion satisfactoriamente .", "type" => "success");
                } else {
//no se pudo actualizar
                    $_SESSION['alert'] = array("title" => "Upps !", "msj" => "Algo salio mal, no pudimos actualizar  la informacion.", "type" => "error");
                }
            }
        } catch (Exception $e) {
            $_SESSION['panel'] = 'errorInk';
        } finally {
           self::myAccountInfo();
        }
    }

    public function enableUser()
    {
        try{
            if (isset($_POST['iduser']) && isset($_POST['availability'])) {
                $userObject = new user();
                $userObject->setId((int)$_POST['iduser']);
                if ($_POST['availability'] == 1) {
                    $userObject->setAvailability(0);
                    $_SESSION['alert'] = array("title" => "Usuario deshabilitado", "msj" => "Se ha deshabilitado el usuario seleccionado satisfactoriamente.", "type" => "warning");
                } else {
                    $userObject->setAvailability(1);
                    $_SESSION['alert'] = array("title" => "Usuario habilitado", "msj" => "El usuario se ha habilitado satisfactoriamente.", "type" => "success");
                }
                if (!$userObject->changueState()) {
                    $_SESSION['alert'] = array("title" => "Upps !", "msj" => "Algo salio mal, no pudimos cambiar el estado del usuario.", "type" => "error");
                }
            }else{
                $_SESSION['alert'] = array("title" => "Upps !", "msj" => "Algo salio mal, no pudimos actualizar  la informacion , parece que la informacion proporcionada es imcompleta, verifica e intentalo nuevamente.", "type" => "error");
            }
        }catch (Exception $e){
            $_SESSION['alert'] = array("title" => "Upps !", "msj" => "Algo salio mal, no pudimos realizar la operacion solicitada.", "type" => "error");
        } finally {
            header('Location: '.base_url.'users/index');
        }
    }

    public function getTutorByCampus()
    {
        if (isset($_POST['idcampus'])) {
            $personObject = new User();
            $tutors = $personObject->getTutorByCampus((int)$_POST['idcampus']);
            $html = '';
            while ($tutor = $tutors->fetch_assoc()) {
                $html .= "<option value='" . $tutor['id'] . "'>" . $tutor['alias'] . "</option>";
            }
            echo $html;
        }
    }

    public function resetPass()
    {
        if (isset($_POST['usernres']) && isset($_POST['emailres'])) {
            try {
                $newpass = Utils::generatePass(8);
                $user = new User();
                $user->setClearpassword($newpass);
                $user->setPass($newpass);
                $user->setUsername(trim($_POST['usernres']));
                $user->setEmail(trim($_POST['emailres']));
                $queryResult = $user->getEmailByUsername();
                if ($queryResult && mysqli_num_rows($queryResult) == 1) {
                    $result = $queryResult->fetch_object();
                    $destination = $result->email;
                    $user->setId($result->id);
                    if ($destination == $user->getEmail()) {
                        if ($user->updatePassword()) {
                            $subject = 'plataforma de tutorias';
                            $content = 'Hola '. $_POST['usernres']." , hemos hecho el cambio solicitado, su nueva clave es:<br> <li>".$newpass." </li>";
                            //$content = 'Se ha reseado su clave, la nueva clave es : ' . $newpass;
                            if (Utils::SendEmail($subject, $content, $destination)) {
                                $_SESSION['loginstate'] = array('tipo' => 'sucess', 'msj' => 'Su clave fue restablecida correctamente. </br> Enviamos la nueva clave a su correo');
                            } else {
                                $_SESSION['loginstate'] = array('tipo' => 'error', 'msj' => 'Upps, no pudimos contactarnos con su correo electronico.</br> Contacte al coordinador de su departamento para el restablecimiento manual.');
                            }
                        } else {
                            $_SESSION['loginstate'] = array('tipo' => 'error', 'msj' => 'Upps, no pudimos restablecer su clave, intentelo nuevamente.</br> o contacte al coordinador del asuntos estudiantiles.');
                        }
                    } else {
                        $_SESSION['loginstate'] = array('tipo' => 'error', 'msj' => 'El correo ingresado no coincide con el correo registrado.</br> Ingrese el correo registrado en la plataforma.');
                    }
                } else {
                    $_SESSION['loginstate'] = array('tipo' => 'error', 'msj' => 'Upps, El usuario ingresado no fue encontrado.</br> Verifique su usuario e intentelo nuevamente.');
                }
            } catch (Exception $e) {
                binnacleController::registryException($e);
                $_SESSION['loginstate'] = array('tipo' => 'error', 'msj' => 'Upps, ha ocurrido el error: ' . $e . '</br> intentelo nuevamente. Si el error persiste contacte al coordinador del area e indique el error.');
            }

        } else {
            $_SESSION['loginstate'] = array('tipo' => 'error', 'msj' => 'Upps, El usuario ingresado no fue encontrado.</br> Verifique su usuario e intentelo nuevamente.');
        }
        header("Location:" . base_url);
    }

    public function updateInfo()
    {
        try {
            if (isset($_POST['birthday']) && isset($_POST['biografy'])) {
                $user = new User();
                $user->setId((int)$_SESSION['id']);
                $user->setBirthDate($_POST['birthday']);
                $user->setEmail($_POST['email']);
                $user->setPhone($_POST['phone']);
                $user->setObservations($_POST['biografy']);
                if ($user->updateInfo()) {
                    $_SESSION['alert'] = array("title" => "Informacion actualizada", "msj" => "Se ha actualizado la informacion existosamente !", "type" => "success");
                } else {
                    $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Upss, no pudimos actualizar su informacion :( , estamos trabajando para resolverlo. !", "type" => "error");
                }
            } else {
                $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Parece ser, que la informacion recibida esta incompleta, intentalo nuevamente. !", "type" => "warning");
            }
        }catch (Exception $e){
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al procesar la informacion, intentalo de nuevo !", "type" => "error");
        } finally {
            self::myAccountInfo();
        }
    }

    public function updatePass()
    {
        try {
            if (isset($_POST['pass'])) {
                $user = new User();
                $user->setId((int)$_SESSION['id']);
                $user->setPass($_POST['pass']);
                if ($user->updatePass()) {
                    $_SESSION['alert'] = array("title" => "Clave modificada", "msj" => " La clave se actualizo satisfactoriamente !", "type" => "success");
                } else {
                    $_SESSION['alert'] = array("title" => "Upps :(", "msj" => " Algo salio mal ! , no fue posible cambiar su clave, intentelo nuevamente.", "type" => "error");
                }
            }
        }catch (Exception $e){
            $_SESSION['alert'] = array("title" => "Upps :(", "msj" => " Algo salio mal ! , no fue posible cambiar su clave, intentelo nuevamente.", "type" => "error");
        } finally {
            $this->myAccountInfo();
        }

    }

    public function updatePhoto()
    {
        try {
            if (isset($_FILES['photo'])) {
                $user = new user();
                $file = $_FILES['photo'];
                $filename = $file['name'];
                $mimetype = $file['type'];
                if ($mimetype == 'image/png' || $mimetype == 'image/jpg' || $mimetype == 'image/jpeg') {
                    $user->setId((int)$_SESSION['id']);
                    $user->setPhoto($filename);
                    if (!is_dir('uploads/photos/')) {
                        mkdir('uploads/photos/', 0777, true);
                    }
                    if ($user->updatePhoto()) {
                        move_uploaded_file($file['tmp_name'], 'uploads/photos/' . $filename);
                        $_SESSION['alert'] = array("title" => "Imagen de perfil actualizada", "msj" => " Su imagen de perfil ha sido actualizada satisfactoriamente !", "type" => "success");
                    } else {
                        $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al procesar los datos, intentalo de nuevo !", "type" => "error");
                    }
                } else {
                    $_SESSION['alert'] = array("title" => "Formato de imagen no permitido", "msj" => "El formato de la imagen cargada no es admitido intenta con una imagen en formato png o jpg !", "type" => "error");
                }

            }
        }catch (Exception $e){
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al procesar la informacion, intentalo de nuevo !", "type" => "error");
        } finally {
            self::myAccountInfo();
        }


    }

}