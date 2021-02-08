<?php
/*
 * Desarrollado por : DennisM.Andino
 * Contactame a mi correo : dennis_andino@outlook.com
 * mi canal de Youtube: CodigoCompartido
 * proyecto disponible en : https://github.com/dennis-andino/GT
*/
require_once 'models/Courses.php';

class coursesController
{

    public function index()
    {
        Utils::sessionOff(); // verifica si existe una sesion valida.
        try{
            $coursesObj = new Courses();
            $listCareers = $coursesObj->getTotalcoursesByCareer();
            if($listCareers){
                $_SESSION['panel'] = 'careersCoordinator';
            }else{
                $_SESSION['panel'] = 'errorInk';
            }
        }catch (Exception $e){
            $_SESSION['panel'] = 'errorInk';
        } finally {
            require_once 'views/Coordinator/homeCoordinator.php';
        }
    }


    public function getCoursesByCareer()
    {
        try {
                if (isset($_POST['idcareer']) && isset($_POST['careername'])) {
                        $coursesObj = new Courses();
                        $coursesObj->setCareer((int)$_POST['idcareer']);
                        $asignatures = $coursesObj->getAsignaturesByCareer()->fetch_all(MYSQLI_ASSOC);
                        if ($asignatures) {
                            $_SESSION['asignatures']=$asignatures;
                            $_SESSION['careername'] = $_POST['careername'];
                            $_SESSION['idcareer'] = $_POST['idcareer'];
                        }else{
                            $_SESSION['alert'] = array("title" => "Upps :(", "msj" => "Experimentamos problemas al obtener los datos, intentalo nuevamente..!", "type" => "error");
                        }
                } else {
                    $_SESSION['alert'] = array("title" => "Upps :(", "msj" => "Experimentamos problemas al obtener los datos, intentalo nuevamente..!", "type" => "error");
                }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :(", "msj" => "Experimentamos problemas al intentar obtener los datos de la carrera seleccionada.!", "type" => "error");
        } finally {
            header('Location:' . base_url . 'courses/index');
        }
    }

    public function updateCourse()
    {
        try {
            if (isset($_POST['namecourse']) && isset($_POST['idcourse'])) {
                $course = new Courses();
                $course->setId((int)$_POST['idcourse']);
                $course->setCoursename($_POST['namecourse']);
                if ($course->update()) {
                    //nombre de asignatura actualizado
                    $courses = $_SESSION['listcourses'];
                    $courses[array_search($_POST['idcourse'], array_column($_SESSION['listcourses'], 'id'))] = array("id" => $_POST['idcourse'], "coursename" => $_POST['namecourse']);
                    $_SESSION['listcourses'] = $courses;
                    $_SESSION['alert'] = array("title" => "Datos actualizados", "msj" => "El nombre del curso fue modificado satisfactoriamente. !", "type" => "success");
                } else {
                    //no se actualizo el nombre de la asignatura
                    $_SESSION['alert'] = array("title" => "Algo anda mal !", "msj" => "No pudimos actualizar el nombre del curso, estamos trabajando para arreglarlo. !", "type" => "error");
                }
            } else {
                //no se recibieron los datos
                $_SESSION['alert'] = array("title" => "Algo anda mal !", "msj" => "No pudimos actualizar los datos , parece que la informacion fue incompleta, estamos trabajando para arreglarlo. !", "type" => "warning");
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Algo anda mal !", "msj" => "No pudimos actualizar el nombre del curso, estamos trabajando para arreglarlo. !", "type" => "error");
        } finally {
            $_POST['careername']=$_SESSION['careername'];
            $_POST['idcareer']=$_SESSION['idcareer'] ;
            //header('Location:' . base_url . 'courses/index');
          // header('Location:' . base_url . 'courses/getCoursesByCareer');
            self::getCoursesByCareer();

        }
    }

    public function updateCareer()
    {
        try {
            if (isset($_POST['careerid']) && isset($_POST['car_name'])) {
                require_once 'models/Careers.php';
                $career = new Careers();
                $career->setId((int)$_POST['careerid']);
                $career->setName($_POST['car_name']);
                if ($career->update()) {
                    $_SESSION['careername']=$_POST['car_name'];
                    $_SESSION['alert'] = array("title" => "Nombre de carrera actualizado", "msj" => "Se actualizo satisfactoriamente el nombre de carrera !", "type" => "success");
                } else {
                    $_SESSION['alert'] = array("title" => "Upps :(", "msj" => "Experimentamos problemas al intentar actualizar el nombre, intentalo de nuevo.!", "type" => "warning");
                }
            } else {
                $_SESSION['alert'] = array("title" => "Informacion incompleta", "msj" => "Experimentamos problemas al obtener la informacion, parece ser que esta incompleta, verifica e intentalo nuevamente. !", "type" => "warning");
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Algo anda mal !", "msj" => "No pudimos actuializar el nombre, estamos trabajando para arreglarlo. !", "type" => "warning");
        } finally {
            header('Location:' . base_url . 'courses/index');
        }


    }


    public function create()
    {
        try {
            if (isset($_POST['career']) && isset($_POST['newcoursename'])) {
                $course = new Courses();
                $course->setCareer((int)$_POST['career']);
                $course->setCoursename($_POST['newcoursename']);
                if ($course->create()) {
                    //se creo el curso exitosamente
                    $asignatures = $course->getAsignaturesByCareer()->fetch_all(MYSQLI_ASSOC);
                    if ($asignatures) {
                        $_SESSION['listcourses'] = $asignatures;
                    }
                    $_SESSION['alert'] = array("title" => "Curso creado", "msj" => "Se ha creado satisfactoriamente el nuevo curso !", "type" => "success");
                } else {
                    //no se creo el curso
                    $_SESSION['alert'] = array("title" => "Upss :( ", "msj" => "tuvimos problemas al intentar crear el nuevo curso !", "type" => "error");
                }
            } else {
                //no llegaron los datos
                $_SESSION['alert'] = array("title" => "Informacion incompleta", "msj" => "tuvimos problemas al intentar crear el nuevo curso, la informacion recibida fue imcompleta , intentalo nuevamente!", "type" => "warning");
            }
        } catch (Exception $e) {
            //problemas en tiempo de ejecucion
            $_SESSION['alert'] = array("title" => "Algo anda mal :( ", "msj" => "tuvimos problemas al intentar crear el nuevo curso, estamos trabajando para arreglarlo!", "type" => "error");
        } finally {
            //header('Location:' . base_url . 'courses/index');
            $_POST['careername']=$_SESSION['careername'];
            $_POST['idcareer']=$_SESSION['idcareer'] ;
          self::getCoursesByCareer();

        }
    }

    public function createCareer()
    {
        try {
            if (isset($_POST['newcareername'])) {
                require_once 'models/Careers.php';
                $career = new Careers();
                $career->setName($_POST['newcareername']);
                if ($career->create($_SESSION['username'], $_SESSION['ip'])->num_rows != 0) {
                    $_SESSION['alert'] = array("title" => "Carrera creada", "msj" => "Se agrago la carrera satisfactoriamente!", "type" => "success");
                } else {
                    $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al agregar la informacion, intentalo de nuevo !", "type" => "error");
                }
            } else {
                $_SESSION['alert'] = array("title" => "Informacion incompleta", "msj" => "Experimentamos problemas al obtener la informacion, parece ser que esta incompleta, verifica e intentalo nuevamente. !", "type" => "warning");
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al agregar la informacion, intentalo de nuevo !", "type" => "error");
        } finally {
            header('Location:' . base_url . 'courses/index');
        }

    }

     public function getCourseByCareer()
    {
        if (isset($_POST['idcareer'])){
            $courseObject = new Courses();
            $courseObject->setCareer((int)$_POST['idcareer']);
            $courses=null;
            $data = '';
            if($_SESSION['baseon']=='Tutor'){
                $courses = $courseObject->getCoursesByCareerforTutors();
            }else{
                $courses = $courseObject->getCoursesByCareer();
            }
            while ($course = $courses->fetch_assoc())
            {
                $data .= "<option value='" . $course['id'] . "'>" . $course['coursename']. "</option>";
            }
            echo $data;
        }

   }


}

