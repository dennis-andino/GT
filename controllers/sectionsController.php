<?php
/*
 * Desarrollado por : DennisM.Andino
 * Contactame a mi correo : dennis_andino@outlook.com
 * mi canal de Youtube: CodigoCompartido
 * proyecto disponible en : https://github.com/dennis-andino/GT
*/
require_once 'models/Sections.php';

class sectionsController
{

 public function index(){

         Utils::sessionOff(); // verifica si existe una sesion valida.
         try {
             $sectionsObj = new Sections();
             $listSections = $sectionsObj->getAll();
             if ($listSections) {
                 $_SESSION['panel'] = 'sectionsModule';
             } else {
                 $_SESSION['panel'] = 'errorInk';
             }
         } catch (Exception $e) {
             $_SESSION['panel'] = 'errorInk';
         } finally {
             require_once 'views/Coordinator/homeCoordinator.php';
         }
     }

     public function create(){
         try {
             if (isset($_POST['sectionname'])) {
                 $section = new Sections();
                 $section->setDescription($_POST['sectionname']);
                 if ($section->create()) {
                     $_SESSION['alert'] = array("title" => "Seccion creada", "msj" => "Seccion creada satisfactoriamente. !", "type" => "success");
                 } else {
                     //no se creo la seccion
                     $_SESSION['alert'] = array("title" => "Upss :( ", "msj" => "tuvimos problemas al intentar crear la seccion !", "type" => "error");
                 }
             } else {
                 //no llegaron los datos
                 $_SESSION['alert'] = array("title" => "Informacion incompleta", "msj" => "tuvimos problemas al intentar crear la seccion, la informacion recibida fue imcompleta , intentalo nuevamente!", "type" => "warning");
             }
         } catch (Exception $e) {
             //problemas en tiempo de ejecucion
             $_SESSION['alert'] = array("title" => "Algo anda mal :( ", "msj" => "tuvimos problemas al intentar crear la seccion, estamos trabajando para arreglarlo!", "type" => "error");
         } finally {
             header('Location:' . base_url . 'sections/index');
         }
     }

     public function delete(){
         try {
             if (isset($_POST['idsecdelete'])) {
                 $section = new Sections();
                 $section->setId($_POST['idsecdelete']);
                 if ($section->delete()) {
                     $_SESSION['alert'] = array("title" => "Seccion eliminada", "msj" => "Seccion eliminada satisfactoriamente. !", "type" => "success");
                 } else {
                     //no se elimino la seccion
                     $_SESSION['alert'] = array("title" => "Upss :( ", "msj" => "tuvimos problemas al intentar eliminar la seccion !", "type" => "error");
                 }
             } else {
                 //no llegaron los datos
                 $_SESSION['alert'] = array("title" => "Informacion incompleta", "msj" => "tuvimos problemas al intentar eliminar la seccion, la informacion recibida fue imcompleta , intentalo nuevamente!", "type" => "warning");
             }
         } catch (Exception $e) {
             //problemas en tiempo de ejecucion
             $_SESSION['alert'] = array("title" => "Algo anda mal :( ", "msj" => "tuvimos problemas al intentar crear la seccion, estamos trabajando para arreglarlo!", "type" => "error");
         } finally {
             header('Location:' . base_url . 'sections/index');
         }
     }

     public function activate(){
         try {
             if (isset($_POST['idsection'])) {
                 $section = new Sections();
                 $section->setId((int)$_POST['idsection']);
                 $section->setAvailability((int)$_POST['action']);
                 if ($section->activate()) { // activo la seccion con exito
                     if ($_POST['action'] == '0') {
                         $_SESSION['alert'] = array("title" => "Seccion deshabilitada", "msj" => "La seccion seleccionada se ha deshabilitado!", "type" => "warning");
                     } else {
                         $_SESSION['alert'] = array("title" => "Seccion habilitado", "msj" => "La seccion seleccionada se ha habilitado satisfactoriamente!", "type" => "success");
                     }
                 }
             } else { //informacion llego incompleta
                 $_SESSION['alert'] = array("title" => "Informacion incompleta", "msj" => "Experimentamos problemas al intentar cambiar el estado, la informacion recibida es incorrecta, intentalo nuevamente!", "type" => "warning");
             }
         } catch (Exception $e) { //error en tiempo ejecucion
             $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Experimentamos problemas al intentar cambiar el estado, estamos trabajando para arreglarlo.", "type" => "error");
         } finally {
             header('Location:' . base_url . 'sections/index');
         }
     }

 }