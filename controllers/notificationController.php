<?php
/*
 * Desarrollado por : DennisM.Andino
 * Contactame a mi correo : dennis_andino@outlook.com
 * mi canal de Youtube: CodigoCompartido
 * proyecto disponible en : https://github.com/dennis-andino/GT
*/
require_once 'models/Notifications.php';

class notificationController
{
    public function seeNotifications(){
        Utils::sessionOff(); // verifica si existe una sesion valida.
        try {

            $notifications=new Notifications();
            $notifications->setDestinationid((int)$_SESSION['id']);
            $notifications=$notifications->getNotReadByUser();
            $_SESSION['panel']='notificationsInk';
        }catch (Exception $e){
            $_SESSION['panel']='errorInk';
        } finally {
            if(isset($_SESSION['baseon'])){
                if($_SESSION['baseon']=='Student'){
                    require_once 'views/Student/homeStudent.php';
                }elseif ($_SESSION['baseon']=='Tutor'){
                    require_once 'views/Tutor/homeTutor.php';
                }else{
                    homeController::logout();
                }
            }
        }
    }


}