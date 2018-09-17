<?php

class connect_pdo {

    protected $dbh;

    public function __construct() {
            define('DBHOST', '127.0.0.1'); // database host address - localhost is usually fine
            define('DBNAME', 'todolist'); // database name - must already exist
            define('DBUSER', 'root'); // database username - must already exist
            define('DBPASS', 'qweasdzxc'); // database password for above username
        
    }

    public function dbh() {
        $this->dbh = new PDO("mysql:host=" . DBHOST . "", "" . DBUSER . "", "" . DBPASS . "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbname = "`" . str_replace("`", "``", DBNAME) . "`";
        $this->dbh->query("CREATE DATABASE IF NOT EXISTS $dbname");
        $this->dbh->query("SET NAMES 'utf8'");
        $this->dbh->query("use $dbname");

        return $this->dbh;
    }

}
?>