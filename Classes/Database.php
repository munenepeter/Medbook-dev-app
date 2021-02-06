<?php
Class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "medbook-app";

    public function connect(){
        try {
        $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute( PDO::ATTR_AUTOCOMMIT, FALSE );
        return $pdo;
        } catch (PDOException $e) {
            //throw $error;
            die('No connection to db' . $e->getMessage());
        }
        
    }

}
