<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', TRUE);

class DB {

    public $dbc;
    public $dbHost;
    public $dbName;
    public $isConnected;
    protected $dbUser;
    protected $dbPass;

    function __construct () {
        $this->dbHost = '192.168.1.3';
        $this->dbName = 'speeddial';
        $this->dbUser = file_get_contents('/var/www/mysqluser');
		$this->dbPass = file_get_contents('/var/www/mysqlpass');
        $this->isConnected = false;

        $this->connectDb();
    }


    public function connectDb () {
        try {
            $this->dbc = new PDO('mysql:host=localhost;dbname='.$this->dbName, $this->dbUser, $this->dbPass);
            $this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->isConnected = true;
        } catch(PDOException $e) {
            $this->isConnected = false;
            echo 'ERROR: ' . $e->getMessage();
            die('Database Connection Error... Something went wrong... :\'(');
        }
    }

}





?>