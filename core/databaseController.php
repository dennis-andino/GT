<?php
require_once 'database.conf.php';

class databaseController
{
    private $host = DB_HOST;
    private $username = DB_USER;
    private $passwd = DB_PASSWORD;
    private $dbName = DB_NAME;
    private $charset = CHARSET;
    private $conn;
    private $backupDir = BACKUP_DIR;
    private $backupFile ;
    private $gzipBackupFile = GZIP_BACKUP_FILE;
    private $disableForeignKeyChecks = DISABLE_FOREIGN_KEY_CHECKS;
    private $batchSize = BATCH_SIZE;// default 1000 rows
    private $output;


    public function __construct()
    {
        $this->conn = $this->initializeDatabase();
        $this->backupFile= $this->dbName.'-'.date("Ymd_His", time()).'.sql';
    }


    public static function connect()
    {
        $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $con->query("SET NAMES 'utf8'");
        return $con;
    }

    public function backUp()
    {
        try{
            if(isset($_POST['backup_description'])){
                set_time_limit(900); // 15 minutes
                if (php_sapi_name() != "cli") {
                    echo '<div style="font-family: monospace;">';
                }
                $backupDatabase = new databaseController();
                $result = $backupDatabase->backupTables(TABLES) ? 'OK' : 'KO';
                if($result){
                    $_SESSION['alert'] = array("title" => "Backup creado satisfactoriamente", "msj" => "Se ha creado el Backup satisfactoriamente.", "type" => "success");
                    self::connect()->query("INSERT INTO BACKUPS(description, autor, filename) VALUES ('{$_POST['backup_description']}','{$_SESSION['alias']}','{$backupDatabase->getBackupName()}');");
                }else{
                    $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Lamentamos lo sucedido, no pudimos crear el respaldo solicitado !", "type" => "error");
                }

                /*$backupDatabase->obfPrint('Backup result: ' . $result, 1);
                if (php_sapi_name() != "cli") {
                    echo '</div>';
                }*/
                }else{
                $_SESSION['alert'] = array("title" => "Datos insuficientes", "msj" => "Lamentamos lo sucedido, no pudimos crear el respaldo solicitado !", "type" => "error");
            }

        }catch (Exception $e){
            $_SESSION['alert'] = array("title" => "Upps :( ", "msj" => "Lamentamos lo sucedido, no pudimos crear el respaldo solicitado !", "type" => "error");
        } finally {
           // header('Location:'.base_url.'home/backupList');
            self::backupList();
            exit();
        }


    }


    public function backupList()
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


    protected function initializeDatabase()
    {
        try {
            $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
            if (mysqli_connect_errno()) {
                throw new Exception('ERROR connecting database: ' . mysqli_connect_error());
                die();
            }
            if (!mysqli_set_charset($conn, $this->charset)) {
                mysqli_query($conn, 'SET NAMES ' . $this->charset);
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            die();
        }

        return $conn;
    }

    public function getBackupName(){
        return $this->backupFile;
    }

    /**
     * Backup the whole database or just some tables
     * Use '*' for whole database or 'table1 table2 table3...'
     */
    public function backupTables($tables = '*')
    {
        try {
            /**
             * Tables to export
             */
            if ($tables == '*') {
                $tables = array();
                $result = mysqli_query($this->conn, "show full tables where Table_type='BASE TABLE';");
                while ($row = mysqli_fetch_row($result)) {
                    $tables[] = $row[0];
                }
            } else {
                $tables = is_array($tables) ? $tables : explode(',', str_replace(' ', '', $tables));
            }

            $sql = 'CREATE DATABASE IF NOT EXISTS `' . $this->dbName . '`' . ";\n\n";
            $sql .= 'USE `' . $this->dbName . "`;\n\n";

            /**
             * Disable foreign key checks
             */
            if ($this->disableForeignKeyChecks === true) {
                $sql .= "SET foreign_key_checks = 0;\n\n";
            }

            /**
             * Iterate tables
             */
            foreach ($tables as $table) {
                if (in_array($table, IGNORE_TABLES))
                    continue;
                $this->obfPrint("Backing up `" . $table . "` table..." . str_repeat('.', 50 - strlen($table)), 0, 0);

                /**
                 * CREATE TABLE
                 */
                $sql .= 'DROP TABLE IF EXISTS `' . $table . '`;';
                $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `' . $table . '`'));
                $sql .= "\n\n" . $row[1] . ";\n\n";

                /**
                 * INSERT INTO
                 */

                $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM ' . $table . ';'));
                $numRows = $row[0];

                // Split table in batches in order to not exhaust system memory
                $numBatches = intval($numRows / $this->batchSize) + 1; // Number of while-loop calls to perform

                for ($b = 1; $b <= $numBatches; $b++) {

                    $query = 'SELECT * FROM ' . $table . ' LIMIT ' . ($b * $this->batchSize - $this->batchSize) . ',' . $this->batchSize;
                    $result = mysqli_query($this->conn, $query);
                    $realBatchSize = mysqli_num_rows($result); // Last batch size can be different from $this->batchSize
                    $numFields = mysqli_num_fields($result);

                    if ($realBatchSize !== 0) {
                        $sql .= 'INSERT INTO ' . $table . ' VALUES ';

                        for ($i = 0; $i < $numFields; $i++) {
                            $rowCount = 1;
                            while ($row = mysqli_fetch_row($result)) {
                                $sql .= '(';
                                for ($j = 0; $j < $numFields; $j++) {
                                    if (isset($row[$j])) {
                                        $row[$j] = addslashes($row[$j]);
                                        $row[$j] = str_replace("\n", "\\n", $row[$j]);
                                        $row[$j] = str_replace("\r", "\\r", $row[$j]);
                                        $row[$j] = str_replace("\f", "\\f", $row[$j]);
                                        $row[$j] = str_replace("\t", "\\t", $row[$j]);
                                        $row[$j] = str_replace("\v", "\\v", $row[$j]);
                                        $row[$j] = str_replace("\a", "\\a", $row[$j]);
                                        $row[$j] = str_replace("\b", "\\b", $row[$j]);
                                        if ($row[$j] == 'true' or $row[$j] == 'false' or preg_match('/^-?[0-9]+$/', $row[$j]) or $row[$j] == 'NULL' or $row[$j] == 'null') {
                                            $sql .= $row[$j];
                                        } else {
                                            $sql .= '"' . $row[$j] . '"';
                                        }
                                    } else {
                                        $sql .= 'NULL';
                                    }

                                    if ($j < ($numFields - 1)) {
                                        $sql .= ',';
                                    }
                                }

                                if ($rowCount == $realBatchSize) {
                                    $rowCount = 0;
                                    $sql .= ");\n"; //close the insert statement
                                } else {
                                    $sql .= "),\n"; //close the row
                                }

                                $rowCount++;
                            }
                        }

                        $this->saveFile($sql);
                        $sql = '';
                    }
                }

                $sql .= "\n\n";

                $this->obfPrint('OK');
            }

            /**
             * Re-enable foreign key checks
             */
            if ($this->disableForeignKeyChecks === true) {
                $sql .= "SET foreign_key_checks = 1;\n";
            }

            $this->saveFile($sql);

            if ($this->gzipBackupFile) {
                $this->gzipBackupFile();
            } else {
                $this->obfPrint('Backup file succesfully saved to ' . $this->backupDir . '/' . $this->backupFile, 1, 1);
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            return false;
        }

        return true;
    }

    /**
     * Save SQL to file
     * @param string $sql
     */
    protected function saveFile(&$sql)
    {
        if (!$sql) return false;
        try {

            if (!file_exists($this->backupDir)) {
                mkdir($this->backupDir, 0777, true);
            }

            file_put_contents($this->backupDir . '/' . $this->backupFile, $sql, FILE_APPEND | LOCK_EX);

        } catch (Exception $e) {
            print_r($e->getMessage());
            return false;
        }

        return true;
    }

    /*
     * Gzip backup file
     *
     * @param integer $level GZIP compression level (default: 9)
     * @return string New filename (with .gz appended) if success, or false if operation fails
     */
    protected function gzipBackupFile($level = 9)
    {
        if (!$this->gzipBackupFile) {
            return true;
        }

        $source = $this->backupDir . '/' . $this->backupFile;
        $dest = $source . '.gz';

        $this->obfPrint('Gzipping backup file to ' . $dest . '... ', 1, 0);

        $mode = 'wb' . $level;
        if ($fpOut = gzopen($dest, $mode)) {
            if ($fpIn = fopen($source, 'rb')) {
                while (!feof($fpIn)) {
                    gzwrite($fpOut, fread($fpIn, 1024 * 256));
                }
                fclose($fpIn);
            } else {
                return false;
            }
            gzclose($fpOut);
            if (!unlink($source)) {
                return false;
            }
        } else {
            return false;
        }

        $this->obfPrint('OK');
        return $dest;
    }

    /**
     * Prints message forcing output buffer flush
     */
    public function obfPrint($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1)
    {
        if (!$msg) {
            return false;
        }

        if ($msg != 'OK' and $msg != 'KO') {
            $msg = date("Y-m-d H:i:s") . ' - ' . $msg;
        }
        $output = '';

        if (php_sapi_name() != "cli") {
            $lineBreak = "<br />";
        } else {
            $lineBreak = "\n";
        }

        if ($lineBreaksBefore > 0) {
            for ($i = 1; $i <= $lineBreaksBefore; $i++) {
                $output .= $lineBreak;
            }
        }

        $output .= $msg;

        if ($lineBreaksAfter > 0) {
            for ($i = 1; $i <= $lineBreaksAfter; $i++) {
                $output .= $lineBreak;
            }
        }


        // Save output for later use
        //$this->output .= str_replace('<br />', '\n', $output);
        //echo $output;

        if (php_sapi_name() != "cli") {
            if (ob_get_level() > 0) {
                ob_flush();
            }
        }

        $this->output .= " ";

        flush();

    }

    /**
     * Returns full execution output
     *
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Returns name of backup file
     *
     */
    public function getBackupFile()
    {
        if ($this->gzipBackupFile) {
            return $this->backupDir . '/' . $this->backupFile . '.gz';
        } else
            return $this->backupDir . '/' . $this->backupFile;
    }

    /**
     * Returns backup directory path
     *
     */
    public function getBackupDir()
    {
        return $this->backupDir;
    }

    /**
     * Returns array of changed tables since duration
     *
     */
    public function getChangedTables($since = '1 day')
    {
        $query = "SELECT TABLE_NAME,update_time FROM information_schema.tables WHERE table_schema='" . $this->dbName . "'";

        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (empty($resultset))
            return false;
        $tables = [];
        for ($i = 0; $i < count($resultset); $i++) {
            if (in_array($resultset[$i]['TABLE_NAME'], IGNORE_TABLES)) // ignore this table
                continue;
            if (strtotime('-' . $since) < strtotime($resultset[$i]['update_time']))
                $tables[] = $resultset[$i]['TABLE_NAME'];
        }
        return ($tables) ? $tables : false;
    }
}



