<?php
Class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "medbook-app";

    public function connect(){
        $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute( PDO::ATTR_AUTOCOMMIT, FALSE );
        return $pdo;
    }
  /*    public function connected(){
		if ($this->connect()){
			return $this->connect();
		}else{
			try{
			return $this->connect() = new PDO('mysql:host='.$this->host.';dbName='.$this->dbNamedbname.';charset=utf8mb4',
							   $this->user, $this->password);
			}catch (PDOException $e){
				echo "Unable to connect to the PDO database: " . $e->getMessage(); 
			}
		}
	}  */
}