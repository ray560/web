<?php
class dbconf {
    //parameters
    private $host ='localhost';
    private $name ='brt';
    private $username ='root';
    private $password = '     ;';
    private $conn;

    //connect database
    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host=' .$this->host . ';dbname=' .$this->name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}