<?php 

class Controller {
    function index(){
        require ('config.php');
    }
}

class Model {
    private $dbConnection;

    public function __construct() {
        require ('configDb.php');    

        // Database configuration
        $hostname = $dbHost;
        $username = $dbUser;
        $password = $dbPass;
        $database = $dbName;

        // Create a new database connection
        $this->dbConnection = new mysqli($hostname, $username, $password, $database);

        // Check for connection errors
        if ($this->dbConnection->connect_error) {
            die("Connection failed: " . $this->dbConnection->connect_error);
        }
    }

    public function query($sql) {
        return $this->dbConnection->query($sql);
    }

    public function prepare($sql) {
        return $this->dbConnection->prepare($sql);
    }

    public function getLastInsertId() {
        return $this->dbConnection->insert_id;
    }

    public function close() {
        $this->dbConnection->close();
    }
}

?>