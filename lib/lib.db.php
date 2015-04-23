<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', TRUE);

class DB {

    public $dbc;
    public $dbHost;
    public $dbName;
    public $isConnected;
    private $dbUser;
    private $dbPass;

    function __construct () {
        $this->dbHost = '192.168.1.3';
        $this->dbName = 'speeddial';
        // Get db credentials from files, then remove line breaks from EOF
        $user = file_get_contents('/var/www/mysqluser');
        $pass = file_get_contents('/var/www/mysqlpass');
        $this->dbUser = substr($user, 0, (strlen($user) -1));
        $this->dbPass = substr($pass, 0, (strlen($pass) -1));
        $this->isConnected = false;
        $this->connectDb();
    }


    private function connectDb () {
        try {
            $this->dbc = new PDO('mysql:host=localhost;dbname='.$this->dbName, $this->dbUser, $this->dbPass);
            $this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->isConnected = true;
            // Once DB is connected, destroy vars containing the creds
            unset ($this->dbUser);
            unset ($this->dbPass);
            unset ($this->dbName);
            unset ($this->dbHost);
        } catch(PDOException $e) {
            $this->isConnected = false;
            echo 'ERROR: ' . $e->getMessage();
            die('Database Connection Error... Something went wrong... :\'(');
        }
    }

    /**
     * @param $db
     * @param $qString
     * @param $params
     * @return mixed
     */
    public function execQuery ($db, $qString, $params) {

        $sql = $db->dbc->prepare($qString);
        for ($x = 0; $x < count($params); $x++) {
            $sql->bindParam($params[$x]['param'], $params[$x]['value'], $params[$x]['type']);
        }
        $sql->execute();

        return $sql;
    }

}





?>