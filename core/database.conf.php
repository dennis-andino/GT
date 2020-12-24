<?php
define("DB_USER", 'root');
define("DB_PASSWORD", '');
define("DB_NAME", 'gtBD');
define("DB_HOST", 'localhost');
define("BACKUP_DIR", 'assets/backup_bd'); // Comment this line to use same script's directory ('.')
define("TABLES", '*'); // Full backup //define("TABLES", 'table1, table2, table3'); // Partial backup
define('IGNORE_TABLES',array('tbl_token_auth', 'token_auth')); // Tables to ignore
define("CHARSET", 'utf8');
define("GZIP_BACKUP_FILE", false); // Set to false if you want plain SQL backup files (not gzipped)
define("DISABLE_FOREIGN_KEY_CHECKS", false); // Set to true if you are having foreign key constraint fails
define("BATCH_SIZE", 1000); // Batch size when selecting rows from database in order to not exhaust system memory or number of rows per INSERT statement in backup file