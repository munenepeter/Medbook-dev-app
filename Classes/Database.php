<?php
class Database {
    public $data = null;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "medbook-app";
    private static $_instance = null;
    public $pdo;

    public function connect() {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new \PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $pdo->setAttribute(\PDO::ATTR_AUTOCOMMIT, FALSE);
            $this->pdo = $pdo;
            return $pdo;
        } catch (\PDOException $e) {
            //throw $error;
            die('No connection to db' . $e->getMessage());
        }
    }
    private function __construct() {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new \PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $pdo->setAttribute(\PDO::ATTR_AUTOCOMMIT, FALSE);
            $this->pdo = $pdo;
            return $pdo;
        } catch (\PDOException $e) {
            //throw $error;
            die('No connection to db' . $e->getMessage());
        }  
    }
    public static function getInstance(){
        if(!self::$_instance){
            self::$_instance = new Database();
        }
        return self::$_instance;
    }
    public function selectAll(){
        $sql = "SELECT * FROM `view_alldata` WHERE 1";
        $this->data = $this->connect()->query($sql)->fetchAll();
       
    }
    public function getData(){
        return $this->data;
    }
}
