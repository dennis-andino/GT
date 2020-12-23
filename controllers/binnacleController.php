<?php
require_once 'models/Binnacle.php';
class binnacleController
{

    public function statistics(){
        $_SESSION['panel']='statistics';
        $objectBinnacle=new Binnacle();
        $events=$objectBinnacle->getCountTypeEvent()->fetch_all(MYSQLI_ASSOC);
        $eventByDate=$objectBinnacle->getCountEvetByMonth()->fetch_all(MYSQLI_ASSOC);
        $totalsByType = '';
        $totalsByMonth= '';
        foreach ($events as $event) {
            $totalsByType .= $event['total'] . ',';
        }
        foreach ($eventByDate as $month) {
            $totalsByMonth .= $month['total'] . ',';
        }
        require_once 'views/Administrator/homeSys.php';
    }

    public static function registryException($exception){
        $username=isset($_SESSION['username'])?$_SESSION['username']:'Sistema';
        $ip=isset($_SESSION['ip'])?$_SESSION['ip']:Utils::getIpClient();
        Binnacle::registerExceptions($exception,$username,$ip);
    }



}