<?php

class Database {
	//creds
	private $dbn = 'mysql:dbname=sengoku;host=localhost;';
	private $user = 'root';
	private $password = '';

	public $conn;

 
    // get the database connection
    public function getConn(){
        $this->conn = null;
        try{
 		  $this->conn = new PDO($this->dbn, $this->user, $this->password);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
          echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

class Logs {

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConn();

    }


    public function getDates()
    {
        $q = "SELECT LogCreated from activity_log";
        $sql = $this->conn->prepare($q);

        $sql->execute();
        return $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql = null;
    }

    public function countEntries()
    {
        $this->id = 1;
        $q = "SELECT COUNT(1) AS count, DATE(LogDate) as date FROM activity_log WHERE ActyID = ? GROUP BY DATE(LogDate)";
        $sql = $this->conn->prepare($q);
        $sql->bindParam(1, $this->id);

        $sql->execute();
        return $row = $sql->fetchALL(PDO::FETCH_ASSOC);
        $sql = null;
    }

}






?>
