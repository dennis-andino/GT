<?php
require_once 'core/database.conf.php';

class databaseController
{

    public static function connect()
    {
        $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $con->query("SET NAMES 'utf8'");
        return $con;
    }

    public function backUp()
    {
        require_once 'models/dataBaseBackup.php';
        try {
            if (isset($_POST['backup_description'])) {
                set_time_limit(900); // 15 minutes
                $backupDatabase = new dataBaseBackup();
                $result = $backupDatabase->backupTables(TABLES) ? 'OK' : 'KO';
                if ($result) {
                    $_SESSION['alert'] = array("title" => "Backup creado satisfactoriamente", "msj" => "Se ha creado el Backup satisfactoriamente.", "type" => "success");
                    self::connect()->query("INSERT INTO BACKUPS(description, autor, filename) VALUES ('{$_POST['backup_description']}','{$_SESSION['alias']}','{$backupDatabase->getBackupName()}');");
                } else {
                    $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Lamentamos lo sucedido, no pudimos crear el respaldo solicitado !", "type" => "error");
                }
            } else {
                $_SESSION['alert'] = array("title" => "Datos insuficientes", "msj" => "Lamentamos lo sucedido, no pudimos crear el respaldo solicitado !", "type" => "error");
            }

        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Lamentamos lo sucedido, no pudimos crear el respaldo solicitado !", "type" => "error");
        } finally {
            // header('Location:'.base_url.'home/backupList');
            self::backupList();
            exit();
        }


    }


    public static function backupList()
    {
        try {
            $backupList = null;
            if ($_SESSION['baseon'] == 'Sys') {
                $_SESSION['panel'] = 'backupSys';
                $backupList = self::connect()->query('SELECT * FROM BACKUPS ORDER BY id DESC LIMIT 5');
            } else {
                homeController::logout();
            }
        } catch (Exception $e) {

        } finally {
            require_once 'views/Administrator/homeSys.php';
            exit();
        }
    }

    public function backupRestore()
    {
        require_once 'models/dataBaseRestore.php';
        try {
            if (isset($_POST['filename'])) {
                $restoreDatabase = new dataBaseRestore();
                $result = $restoreDatabase->restoreDb($_POST['filename']);
                $restoreDatabase->obfPrint("Resultados : " . $result, 1);

                if ($result) {
                    $_SESSION['panel'] = 'backup';
                    $_SESSION['alert'] = array("title" => "Restauracion exitosa", "msj" => "Yuppi !! el backup fue restaurado satisfactoriamente. !", "type" => "success");
                }else{
                    $_SESSION['panel'] = 'errorInk';
                    $_SESSION['alert'] = array("title" => "Backup dañado", "msj" => "Lamentamos lo sucedido, no pudimos restaurar la informacion. parece que el archivo no existe o esta dañado !", "type" => "error");
                }
            } else {
                $_SESSION['alert'] = array("title" => "Datos insuficientes", "msj" => "Lamentamos lo sucedido, no pudimos crear el respaldo solicitado dado que la informacion proporcionada esta incompleta.!", "type" => "error");
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = array("title" => "Backup dañado", "msj" => "Lamentamos lo sucedido, no pudimos restaurar la informacion. parece que el archivo esta dañado !", "type" => "error");
        } finally {
            require_once 'views/Administrator/homeSys.php';
            exit();
        }
    }


}



