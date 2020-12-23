<?php
require_once 'models/Institution.php';

class institutionController
{
    public function index()
    {
        try {
            $instituteObject = new Institution();
            $information = $instituteObject->getInfo()->fetch_object();
        } catch (Exception $e) {
            $_SESSION['panel'] = 'errorInk';
        } finally {
            if (isset($_SESSION['baseon'])) {
                if ($_SESSION['baseon'] == 'Sys') {
                    $_SESSION['panel'] = 'institution';
                    require_once 'views/Administrator/homeSys.php';
                } elseif ($_SESSION['baseon'] == 'Coordinator') {
                    $_SESSION['panel'] = 'institutionInk';
                    require_once 'views/Coordinator/homeCoordinator.php';
                } elseif ($_SESSION['baseon'] == 'Tutor') {
                    $_SESSION['panel'] = 'institutionInk';
                    require_once 'views/Tutor/homeTutor.php';
                } elseif ($_SESSION['baseon'] == 'Student') {
                    $_SESSION['panel'] = 'institutionInk';
                    require_once 'views/Student/homeStudent.php';
                }
            } else {
                homeController::logout();
            }
        }
    }

    public function edit()
    {
        if (isset($_POST['name']) && isset($_POST['telephone'])) {
            $instituteObject = new Institution();
            $instituteObject->setId(1);
            $instituteObject->setName($_POST['name']);
            $instituteObject->setVision($_POST['vision']);
            $instituteObject->setMision($_POST['mision']);
            $instituteObject->setAddress($_POST['address']);
            $instituteObject->setTelefone($_POST['telephone']);
            $instituteObject->setEmail($_POST['email']);
            if ($instituteObject->updateInfo()) {
                $this->index();
            }
        }
    }

    public function changeLogo()
    {
        if (isset($_FILES['logo'])) {
            $file = $_FILES['logo'];
            $filename = $file['name'];
            $mimetype = $file['type'];
            if ($mimetype == 'image/png' || $mimetype == 'image/jpg' || $mimetype == 'image/jpeg') {
                $inst = new Institution();
                $inst->setId(1);
                $inst->setLogo($filename);
                if (!is_dir('assets/img')) {
                    mkdir('assets/img', 0777, true);
                }
                if ($inst->updateLogo()) {

                    move_uploaded_file($file['tmp_name'], 'assets/img/' . $filename);
                    $_SESSION['changeLogo'] = true;
                } else {
                    $_SESSION['changeLogo'] = 'Error al cargar imagen';
                    echo 'Error al cargar imagen';
                }
            } else {
                $_SESSION['changeLogo'] = false;
                echo 'Error al cargar imagen2';
            }

        }
        $this->index();
    }


}