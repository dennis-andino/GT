<?php
require_once 'models/Schedules.php';

class scheduleController
{
    public function index()
    {
        try {
            if ($_SESSION['baseon'] == 'Coordinator') {
                require_once 'models/Campus.php';
                require_once 'models/Careers.php';
                $scheduleObject = new Schedules();
                $campusObject = new Campus();
                $CareerObject = new Careers();
                $campus = $campusObject->getAllCampus();
                $careers = $CareerObject->getAllCareers();
                $scheduleBytut = $scheduleObject->getSch_tut();
                $allSchedules = $scheduleObject->getAllSchedules();
                if ($campus && $careers && $scheduleBytut && $allSchedules) {
                    $_SESSION['schedules'] = $allSchedules->fetch_all(MYSQLI_ASSOC);
                    $_SESSION['panel'] = 'schedulesModule';
                } else {
                    $_SESSION['panel'] = 'errorInk';
                }
            } else {
                logout();
            }
        } catch (Exception $e) {
            $_SESSION['panel'] = 'errorInk';
        } finally {
            require_once 'views\Coordinator\homeCoordinator.php';
        }
    }

    public function tutors()
    {
        try {
            if ($_SESSION['baseon'] == 'Tutor') {
                $scheduleObject = new Schedules();
                $scheduleObject->setTutor((int)$_SESSION['id']);
                $scheduleBytut = $scheduleObject->getSchByTut();
                if (!isset($_SESSION['schedules']) || !isset($_SESSION['careers'])) {
                    require_once 'models/Careers.php';
                    $_SESSION['schedules'] = $scheduleObject->getAllSchedules()->fetch_all(MYSQLI_ASSOC);
                    $CareerObject = new Careers();
                    $_SESSION['careers'] = $CareerObject->getAllCareers()->fetch_all(MYSQLI_ASSOC);
                }
            } else {
                logout();
            }
            $_SESSION['panel'] = 'scheduleTutor';
        } catch (Exception $e) {
            $_SESSION['panel'] = 'errorInk';
        } finally {
            if (isset($_POST)) {
                unset($_POST);
            }
            require_once 'views\Tutor\homeTutor.php';
        }
    }

    public function create()
    {
        try {
            if (isset($_POST['starttime']) && isset($_POST['finishtime'])) {
                $scheduleObject = new Schedules();
                $scheduleObject->setStarttime($_POST['starttime']);
                $scheduleObject->setFinishtime($_POST['finishtime']);
                if ($scheduleObject->insertSchedule()) { //se agrego el horario
                    $_SESSION['alert'] = array("title" => "Horario creado", "msj" => "Se creo el horario satisfactoriamente !", "type" => "success");
                } else { // no se agrego el horario
                    $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Algo anda mal , no pudimos crear el horario !", "type" => "error");
                }
            } else {
                $_SESSION['alert'] = array("title" => "Informacion incompleta", "msj" => "No pudimos crear el horario , parece que la informacion recibida esta incompleta, intentalo nuevamente!", "type" => "warning");
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Algo anda mal , no pudimos crear el horario !", "type" => "error");
        } finally {
            header('Location:' . base_url . 'schedule/index');
        }
    }

    public function createScheBytut()
    {
        try {
            if (isset($_POST['horas']) && isset($_POST['tutors'])) {
                $Schedule = new Schedules();
                $Schedule->setSchedule((int)($_POST['horas']));
                $Schedule->setCourse((int)($_POST['courses']));
                $Schedule->setTutor((int)($_POST['tutors']));
                if ($Schedule->saveSche_tut()) {
                    $_SESSION['alert'] = array("title" => "Horario creado", "msj" => "Se creo el horario satisfactoriamente !", "type" => "success");
                } else {
                    $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar crear el horario, intentalo de nuevo !", "type" => "error");
                }
            } else {
                $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar crear el horario, Verifica la informacion e intentalo nuevamente!", "type" => "error");
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar crear el horario, Verifica la informacion e intentalo nuevamente!", "type" => "error");
        } finally {
            if ($_SESSION['baseon'] == 'Coordinator') {
                self::index();
            } else if ($_SESSION['baseon'] == 'Tutor') {
                header("Location: " . base_url . 'schedule/tutors');
            } else {
                homeController::logout();
            }
        }

    }

    public function deleteScheByTut()
    {
        try {
            if (isset($_POST['idschedelete'])) {
                $Schedule = new Schedules();
                $Schedule->setId((int)$_POST['idschedelete']);
                if ($Schedule->deleteSchedByTut()) {
                    $_SESSION['alert'] = array("title" => "Horario Eliminado con exito", "msj" => "Se ha eliminado el horario satisfactoriamente !", "type" => "success");
                }
            } else {
                $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar eliminar el horario, Verifica la informacion e intentalo nuevamente!", "type" => "error");
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar eliminar el horario, intentalo nuevamente!", "type" => "error");
        } finally {
            if ($_SESSION['baseon'] == 'Coordinator') {
                self::index();
            } elseif ($_SESSION['baseon'] == 'Tutor') {
                header("Location: " . base_url . 'schedule/tutors');
            } else {
                homeController::logout();
            }
        }

    }

    public function edit()
    {
        try{
            if (isset($_POST['schidedit'])) {
                $scheduleObject = new Schedules();
                $scheduleObject->setId((int)$_POST['schidedit']);
                $scheduleObject->setStarttime($_POST['sttime']);
                $scheduleObject->setFinishtime($_POST['fntime']);
                if($scheduleObject->edit()){
                    $_SESSION['alert'] = array("title" => "Horario Actualizado", "msj" => "El horario ha sido actualizado satisfactoriamente!", "type" => "success");
                }else{
                    $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar modificar el horario, intentalo nuevamente!", "type" => "error");
                }
            }else{
                $_SESSION['alert'] = array("title" => "Informacion incompleta", "msj" => "Experimentamos problemas al intentar modificar el horario, intentalo nuevamente!", "type" => "error");
            }
        }catch (Exception $e){
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar modificar el horario, estamos trabajando en ello !", "type" => "error");
        } finally {
            header('Location:' . base_url . 'schedule/index');
        }

    }


    public function getSchedule()
    {

        if (isset($_POST) && $_POST['id_course']) {
            $schedule = new Schedules();
            $sche_group = $schedule->getSchedByCourse((int)$_POST['id_course']);
            $html = '';
            while ($rowsch = $sche_group->fetch_assoc()) {
                $html .= "<option value='" . $rowsch['id'] . "'>" . $rowsch['starttime'] . '-' . $rowsch['finishtime'] . ' ( ' . $rowsch['tutor'] . ' )' . "</option>";
            }
            echo $html;
        }
    }

    public function activateSched()
    {
        try {
            if (isset($_POST['idsched']) && isset($_POST['action'])) {
                $schedule = new Schedules();
                $schedule->setId((int)$_POST['idsched']);
                $schedule->setAvailability((int)$_POST['action']);
                if ($schedule->activateSchedule()) { // activo el horario con exito
                    if ($_POST['action'] == '0') {
                        $_SESSION['alert'] = array("title" => "Horario deshabilitado", "msj" => "El horario seleccionado se ha deshabilitado!", "type" => "warning");
                    } else {
                        $_SESSION['alert'] = array("title" => "Horario habilitado", "msj" => "El horario seleccionado se ha habilitado satisfactoriamente!", "type" => "success");
                    }
                }
            } else { //informacion llego incompleta
                $_SESSION['alert'] = array("title" => "Informacion incompleta", "msj" => "Experimentamos problemas al intentar cambiar el estado del horario, la informacion recibida es incorrecta, intentalo nuevamente!", "type" => "warning");
            }
        } catch (Exception $e) { //error en tiempo ejecucion
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar cambiar el estado del horario, estamos trabajando para arreglarlo.", "type" => "error");
        } finally {
            header('Location:' . base_url . 'schedule/index');
        }
    }

    public function actSchedByTut()
    {
        try {
            if (isset($_POST['idschedoff']) && isset($_POST['action'])) {
                $schedule = new Schedules();
                $schedule->setId((int)$_POST['idschedoff']);
                $schedule->setAvailability((int)$_POST['action']);
                if ($schedule->activateScheduleByTut()) {
                    $_SESSION['alert'] = array("title" => "cambio de estado exitoso", "msj" => "El cambio de estado del horario fue satisfactorio!", "type" => "success");
                } else {
                    $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar cambiar el estado del horario, intentalo nuevamente!", "type" => "error");
                }
            } else {
                $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar cambiar el estado del horario, Verifica la informacion e intentalo nuevamente!", "type" => "error");
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar cambiar el estado del horario, Verifica la informacion e intentalo nuevamente!", "type" => "error");
        } finally {
            if ($_SESSION['baseon'] == 'Coordinator') {
                $this->index();
            } elseif ($_SESSION['baseon'] == 'Tutor') {
                header("Location: " . base_url . 'schedule/tutors');
            } else {
                homeController::logout();
            }
        }
    }
}