<?php
require_once 'models/Binnacle.php';

class binnacleController
{

    public function statistics()
    {
        try {
            $objectBinnacle = new Binnacle();
            $events = $objectBinnacle->getCountTypeEvent();
            $eventByDate = $objectBinnacle->getCountEvetByMonth();
            $Types = '';
            $totalsByType = '';
            $totalsByMonth = '';
            if ($events && $eventByDate) {
                $_SESSION['panel'] = 'statistics';

                // --------Graficos por tipo de evento--------
                while ($event = $events->fetch_object()) {
                    $Types .= "'$event->typeevent'" . ',';
                    $totalsByType .= $event->total.',';
                }
                $Types = substr($Types, 0, -1);
                $totalsByType = substr($totalsByType, 0, -1);

                // ---------Eventos por mes------------------
                while ($event = $eventByDate->fetch_object()) {
                    $totalsByMonth .= $event->total. ',';
                }
                $totalsByMonth = substr($totalsByMonth, 0, -1);
                $Months = "'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'";

            } else {
                $_SESSION['panel'] = 'errorInk';
            }

        } catch (Exception $e) {
            $_SESSION['panel'] = 'errorInk';
        } finally {
            require_once 'views/Administrator/homeSys.php';
        }
    }

    public static function registryException($exception)
    {
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Sistema';
        $ip = isset($_SESSION['ip']) ? $_SESSION['ip'] : Utils::getIpClient();
        Binnacle::registerExceptions($exception, $username, $ip);
    }

    public function eventList()
    {
        if ($_SESSION['baseon'] == 'Sys') {
            $_SESSION['panel'] = 'mainSys';
            $BinnacleObject = new Binnacle();
            $eventList = $BinnacleObject->getAllEvents();
            require_once 'views/Administrator/homeSys.php';
        } else {
            homeController::logout();
        }
    }


}