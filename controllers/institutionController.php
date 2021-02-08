<?php
/*
 * Desarrollado por : DennisM.Andino
 * Contactame a mi correo : dennis_andino@outlook.com
 * mi canal de Youtube: CodigoCompartido
 * proyecto disponible en : https://github.com/dennis-andino/GT
*/
require_once 'models/Institution.php';

class institutionController
{
    public function index()
    {
        Utils::sessionOff(); //verifica si existe una sesion valida.
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
        try{
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
                    $_SESSION['alert'] = array("title" => "Informacion actualizada", "msj" => " Se ha actualizado su informacion satisfactoriamente .", "type" => "success");
                }else{
                    $_SESSION['alert'] = array("title" => "Upps !", "msj" => "Algo salio mal, no pudimos actualizar  la informacion.", "type" => "error");
                }
            }
        }catch (Exception $e){
            $_SESSION['alert'] = array("title" => "Upps !", "msj" => "Algo salio mal, no pudimos actualizar  la informacion.", "type" => "error");
        } finally {
            header('Location:'.base_url.'institution/index');
        }

    }

    public function changeLogo()
    {
        try {
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
                        if (move_uploaded_file($file['tmp_name'], 'assets/img/' . $filename)){
                            $_SESSION['logo']=$filename;
                            $_SESSION['alert'] = array("title" => "Logo actualizado", "msj" => " Se ha actualizado su informacion satisfactoriamente .", "type" => "success");
                        }else{
                            $inst->setLogo($_SESSION['logo']);
                            $inst->updateLogo();
                        }
                        } else {
                        $_SESSION['alert'] = array("title" => "Upps !", "msj" => "Algo salio mal, no pudimos actualizar  la informacion.", "type" => "error");
                    }
                } else {
                    $_SESSION['changeLogo'] = false;
                    $_SESSION['alert'] = array("title" => "Formato de imagen incorrecto", "msj" => "Algo salio mal, no pudimos actualizar  la informacion.", "type" => "error");
                }

            }
        }catch (Exception $e){
            $_SESSION['alert'] = array("title" => "Upps !", "msj" => "Algo salio mal, no pudimos actualizar  la informacion.", "type" => "error");
        } finally {
            header('Location:'.base_url.'institution/index');
        }


    }


}