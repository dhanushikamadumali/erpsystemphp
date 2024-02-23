<?php
// db connection class
class DbConnection{
    // to connect database create variable
    public $conn;
    private $hostname = "localhost";
    private $dbusername = "root";
    private $dbpaassword = "";
    private $db = "erpsystem";

    function __construct() //php magic method
    {
        // create db connection
        $this->conn = new mysqli(
            $this -> hostname,
            $this -> dbusername,
            $this -> dbpaassword,
            $this -> db
        );
        // to check connection
        if (!$this -> conn -> connect_error){
              $GLOBALS["con"] = $this -> conn;
        }

        else{
            echo "Not success";
            $GLOBALS["con"] = $this -> conn;
        }

    }
}






