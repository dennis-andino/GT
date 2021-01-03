<?php
define("DB_USER", 'root');
define("DB_PASSWORD", '');
define("DB_NAME", 'gtBD');
define("DB_HOST", 'localhost');
define("BACKUP_DIR", 'assets/backup_bd'); // Indica el directorio donde sera guardados los backups de la base de datos.
define("TABLES", '*'); // backup completo //define("TABLES", 'table1, table2, table3'); // backup parcial
define('IGNORE_TABLES',array('tbl_token_auth', 'token_auth')); // tables que seran ignoradas
define("CHARSET", 'utf8'); // para que acepte caracteres del alfabeto latino
define("GZIP_BACKUP_FILE", false); //  false para que el backup sea en archivo .sql plano de los contrario sera comprimido(not gzipped)
define("DISABLE_FOREIGN_KEY_CHECKS", false); // desactiva el chequeo de llaves foraneas
define("BATCH_SIZE", 1000); //limite de tuplas a respaldar.