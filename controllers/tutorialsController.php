<?php
require_once 'models/Tutorials.php';
require_once 'models/Courses.php';

class tutorialsController
{
    public function statistic()
    {
        $tutorias = new Tutorials();
        $asignaturas = $tutorias->getFrecuencyCourses();
        $periods = $tutorias->getFrecuencybyPeriod();
        $evaluations = $tutorias->getEvaluation();

        //datos grafico frecuencia por asignatura
        $courses = '';
        $valores = '';
        while ($tutoria = $asignaturas->fetch_object()) {
            $courses .= "'$tutoria->coursename'" . ',';
            $valores .= $tutoria->total . ',';
        }
        $courses = substr($courses, 0, -1);
        $valores = substr($valores, 0, -1);

        //datos grafico frecuencia por periodo

        $period = '';
        $totales = '';
        while ($periodo = $periods->fetch_object()) {
            $period .= "'$periodo->period'" . ',';
            $totales .= $periodo->total . ',';
        }
        $period = substr($period, 0, -1);
        $totales = substr($totales, 0, -1);

        //datos grafico evaluacion de estudiantes
        $evaluation = '';
        while ($value = $evaluations->fetch_object()) {
            $evaluation .= '{name:' . "'$value->evaluation'" . ',y:' . $value->total . '},';
        }
        $evaluation = substr($evaluation, 0, -1);


        $_SESSION['panel'] = 'statistiCoordinator';
        require_once 'views/Coordinator/homeCoordinator.php';
    }


    public function save()
    {
        try{
            if (isset($_POST['subject']) && isset($_POST['details'])) {
                $requestdate = date('Y-m-d g:ia');
                $new_tutoria = new Tutorials();
                $new_tutoria->setSchedule((int)$_POST["horario"]);
                $new_tutoria->setPetitioner((int)$_POST["petitioner"]);
                $new_tutoria->setSubject($_POST["subject"]);
                $new_tutoria->setDetails($_POST["details"]);
                $new_tutoria->setReservdate($_POST["reservdate"]);
                $new_tutoria->setModality((int)$_POST["modality"]);
                $new_tutoria->setRequestdate($requestdate);
                $new_tutoria->setFilename($_FILES['filename']['name']);
                $exist = $new_tutoria->exists();
                if ($exist && mysqli_num_rows($exist) > 0) {
                    $_SESSION['alert'] = array("title" => "Horario no disponible", "msj" => "Upps , El horario solicitado ya esta reservado, elige un horario diferente !", "type" => "error");
                } else {
                    if ($new_tutoria->save()) { //tratamiento de archivos
                        try {
                            if ($_FILES['filename']['name'] != null) {
                                $file = $_FILES['filename'];
                                $filename = $file['name'];
                                $mimetype = $file['type'];
                                if ($mimetype == "application/pdf" || $mimetype == "application/msword" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                                    if (!is_dir('uploads/documents')) {
                                        mkdir('uploads/documents', 0777, true);
                                    }
                                    if (!(move_uploaded_file($file['tmp_name'], 'uploads/documents/' . $filename))) {
                                        $new_tutoria->correctFileName();
                                    }

                                } else {
                                    $_SESSION['alert'] = array("title" => "Solicitud recibida", "msj" => "La solicitud se recibio satisfactoriamente , sin embargo ,el adjunto no fue admitido.", "type" => "warning");
                                }
                            }
                            if (!isset($_SESSION['alert'])) {
                                $_SESSION['alert'] = array("title" => "Solicitud recibida", "msj" => " La solicitud de tutoria fue recibida, en los proximos dias notificaremos de su aprobacion.", "type" => "success");
                            }
                        } catch (Exception $e) {
                            $_SESSION['alert'] = array("title" => "Solicitud recibida", "msj" => "La solicitud se recibio satisfactoriamente , sin embargo , experimentamos problemas al almacenar el archivo adjunto", "type" => "warning");
                        }
                    } else {
                        $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al procesar la solicitud, intentalo de nuevo !", "type" => "error");
                    }
                }
            }
        }catch (Exception $e){
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al procesar la solicitud, intentalo de nuevo !", "type" => "error");
        } finally {
            header('Location:'.base_url.'home/student');
        }


    }

    public function getinfo()
    {
        try {
            if (isset($_POST['idtutorial'])) {
                $objetotutoria = new Tutorials();
                $objetotutoria->setId((int)$_POST['idtutorial']);
                $tutoria = $objetotutoria->getInfoTutorial();
                $members = $objetotutoria->getMembers();
                if ($tutoria && $members) {
                    $_SESSION['form'] = true;
                    $_SESSION['members'] = $members->fetch_all(MYSQLI_ASSOC);
                    $_SESSION['tutoria'] = $tutoria->fetch_assoc();
                } else {
                    $_SESSION['form'] = false;
                    $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al obtener la informacion, intentalo de nuevo !", "type" => "error");
                }
                if ($_SESSION['baseon'] == 'Tutor') {
                    header('Location:'.base_url.'home/tutor');
                } elseif ($_SESSION['baseon'] == 'Coordinator') {
                    if (($_SESSION['tutoria']['status'] == -1 || $_SESSION['tutoria']['status'] == 1) && !isset($_SESSION['asignatures'])) {
                        require_once 'models/Courses.php';
                        $courses_object = new Courses();
                        $_SESSION['asignatures'] = $courses_object->getCoursesByTutorial((int)$_SESSION['tutoria']->id)->fetch_all(MYSQLI_ASSOC);
                        if ($_SESSION['tutoria']['modality'] == 0) {
                            require_once 'models/Sections.php';
                            $sectionObject = new Sections();
                            $_SESSION['sections'] = $sectionObject->getAllEnables()->fetch_all(MYSQLI_ASSOC);
                        }
                    }
                    header('Location:'.base_url.'home/coordinator');
                } else {
                    $this->logout();
                }

            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al procesar la solicitud, intentalo de nuevo !", "type" => "error");
        }

    }


    public function join()
    {
        if (isset($_POST['tutorialid']) && isset($_POST['petitioner'])) {
            $new_member = new Tutorials();
            $new_member->setId($_POST['tutorialid']);
            $new_member->setPetitioner($_POST['petitioner']);
            if ($new_member->joinToTut()) {
                $_SESSION['alert'] = array("title" => "Unido correctamente", "msj" => "Se ha unido satisfactoriamente como invitado.", "type" => "success");
            } else {
                $_SESSION['alert'] = array("title" => "Upps !!", "msj" => " Tuvimos problemas al integrarlo, porfavor contacte al coordinador del departamento de tutorias.", "type" => "error");
            }
        }
        homeController::student();
    }

    public function historicStudent()
    {
        try {
            $objtutorials = new Tutorials();
            $objtutorials->setPetitioner((int)$_SESSION['id']);
            $history = $objtutorials->getHistorialStu();
            $historicguest = $objtutorials->getHistoricGuest();
            $_SESSION['panel'] = 'historialStudent';
        } catch (Exception $e) {
            $_SESSION['panel'] = 'errorInk';
        } finally {
            require_once 'views\Student\homeStudent.php';
        }
    }


    public function approve()
    {
        try {
            if (isset($_POST['idtutorial']) && isset($_POST['coordinator']) && isset($_POST['action'])) {
                $tutoria = new Tutorials();
                $tutoria->setId((int)$_POST['idtutorial']);
                $tutoria->setApprovedby((int)$_POST['coordinator']);
                $tutoria->setSpace($_POST['section']); //seccion, aula virtual o cancelacion
                if ($_POST['action'] == 1) {
                    $tutoria->setStatus(1);//aprobacion
                } else {
                    $tutoria->setStatus(3);//cancelacion
                }
                $answerserver = $tutoria->approve()->fetch_object();
                if ($answerserver->result == '0') {// la aprobacion tuvo exito
                    if ($_POST['action'] == 1) {
                        $_SESSION['alert'] = array("title" => "Solicitud aprobada", "msj" => "Se ha aprobado la solicitud satisfactoriamente.", "type" => "success");
                    } else {
                        $_SESSION['alert'] = array("title" => "Solicitud Cancelada", "msj" => "La solicitud se ha cancelado.", "type" => "warning");
                    }
                } else {
                    $_SESSION['alert'] = array("title" => "Upps :(", "msj" => "tuvimos problemas al intentar cambiar el estado de la solicitud, intentalo nuevamente .", "type" => "error");
                }
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :(", "msj" => "tuvimos problemas al intentar cambiar el estado de la solicitud, intentalo nuevamente .", "type" => "error");
        } finally {
            self::getinfo();
        }
    }

    public function reconfigure()
    {
        try {
            if (isset($_POST['idtutorial'])) {
                $tutoria = new Tutorials();
                $tutoria->setId((int)$_POST['idtutorial']);
                $tutoria->setSchedule((int)$_POST['horario']);
                $tutoria->setReservdate($_POST['reserva']);
                $tutoria->setSpace($_POST['sect_edit']);
                $answerserver = $tutoria->reconfigure();
                $answerserver = $answerserver->fetch_object();
                if ($answerserver && $answerserver->result == 0) {
                    $_SESSION['alert'] = array("title" => "Solicitud actualizada", "msj" => "Se actualizo satisfactoriamente la solicitud.", "type" => "success");
                } else {
                    $_SESSION['alert'] = array("title" => "Upps :(", "msj" => "tuvimos problemas al intentar actualizar el estado de la solicitud, intentalo nuevamente .", "type" => "error");
                }
            } else {
                $_SESSION['alert'] = array("title" => "Upps :(", "msj" => "tuvimos problemas al procesar la solicitud, verifica la informacion prpoprcionada e intentalo nuevamente .", "type" => "error");
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :(", "msj" => "Parece que ocurrio un error al intentar modificar la informacion.", "type" => "error");
        } finally {
            self::getinfo();
        }
    }

    public function delete()
    {
        try {
            if (isset($_POST['idtutdelete'])) {
                $tutoria = new Tutorials();
                $tutoria->setId((int)$_POST['idtutdelete']);
                $answer = $tutoria->deletetut($_SESSION['ip'], $_SESSION['username'])->fetch_object();
                if ($answer->result == 0) {
                    $_SESSION['alert'] = array("title" => "Solicitud Eliminada", "msj" => "Se ha eliminado la solicitud satisfactoriamente.", "type" => "success");
                } else {
                    $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "No pudimos eliminar la solicitud , intentalo nuevamente o contacta al administrador del sistema.", "type" => "error");
                }
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "No pudimos eliminar la solicitud , la informacion no fue modificada.", "type" => "error");
        } finally {
            header("Location: " . base_url . 'home/Coordinator');
        }


    }

    public function SaveAssistance()
    {
        try {
            if (isset($_POST['asistentes']) && isset($_POST['idtutorial'])) {
                $asistentes = $_POST['asistentes'];
                $tutoria = new Tutorials();
                foreach ($asistentes as $asistenteid) {
                    $tutoria->setId((int)$asistenteid);
                    ($tutoria->checkAssistence());
                }
                $_SESSION['alert'] = array("title" => "Asistencia Registrada", "msj" => "La lista de asistencia se registro satisfactoriamente ! suerte con su tutoria !", "type" => "success");
            } else {
                $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar iniciar la tutoria, parece que la informacion recibida esta incompleta !", "type" => "error");
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar registrar la asistencia, intentalo de nuevo o reporta al coordiandor !", "type" => "error");
        } finally {
            self::getinfo();
        }
    }

    public function start()
    {
        try {
            if (isset($_POST['idtutorial'])) {
                $tutoria = new Tutorials();
                $tutoria->setId((int)$_POST['idtutorial']);
                if ($tutoria->startTutorial()) {
                    $_SESSION['tutoria']->status = 0;
                    $_SESSION['alert'] = array("title" => "Tutoria iniciada", "msj" => " Buena suerte con su tutoria !", "type" => "success");
                }
            } else {
                $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Parece ser que la informacion recibida esta incompleta, intentelo nuevamente.", "type" => "error");
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar iniciar la tutoria, intentalo de nuevo !", "type" => "error");
        } finally {
            homeController::tutor();
        }


    }

    public function stop()
    {
        if (isset($_POST['idtutorial'])) {
            $tutoria = new Tutorials();
            $tutoria->setId((int)$_POST['idtutorial']);
            if ($tutoria->stopTutorial()) {
                $_SESSION['tutoria']->status = 2;
                $_SESSION['alert'] = array("title" => "Tutoria finalizada", "msj" => "La tutoria se ha finalizado satisfactoriamente.", "type" => "warning");
            }
        }
        homeController::tutor();
    }

    public function tutorEvaluations()
    {
        try {
            $tutorial_object = new Tutorials();
            $comments = $tutorial_object->getCommentByTutor((int)$_SESSION['id']);
            $evaluations = $tutorial_object->getScoreStatistic((int)$_SESSION['id']);
            $evaluation = '';
            while ($value = $evaluations->fetch_object()) {
                $evaluation .= '{name:' . "'$value->evaluation'" . ',y:' . $value->total . '},';
            }
            $evaluation = substr($evaluation, 0, -1);
            $_SESSION['panel'] = 'evaluationsTutor';
        } catch (Exception $e) {
            $_SESSION['panel'] = 'errorInk';
        } finally {
            require_once 'views/Tutor/homeTutor.php';
        }
    }

    public function setScore()
    {
        try {
            if (isset($_POST['idtut']) && isset($_POST['stucomment'])) {
                $tutorial_object = new Tutorials();
                $tutorial_object->setId((int)$_POST['idtut']);
                $tutorial_object->setStucomment($_POST['stucomment']);
                $tutorial_object->setScore((int)$_POST['score']);
                if ($tutorial_object->setEvaluation()) {
                    $_SESSION['alert'] = array("title" => "Calificación recibida", "msj" => "Gracias por enviarnos su evaluacion, lo tomaremos en cuenta para mejroar continuamente.", "type" => "success");
                } else {
                    $_SESSION['alert'] = array("title" => "Upps !!", "msj" => " Experimentamos problemas al procesar la informacion, estamos trabajando para resolverlo.", "type" => "error");
                }
            } else {
                $_SESSION['alert'] = array("title" => "Informacion incompleta", "msj" => " Upps, parece que la informacion proveida esta incompleta, intentalo de nuevo.", "type" => "warning");
            }
        } catch (Exception $e) {
            $_SESSION['panel'] = 'errorInk';
        } finally {
            self::historicStudent();
        }


    }


}