<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class district{
    // get district function
    public function getdistricts(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM district";
        $result = $con->query($sql);
        return $result;   
    }
    // get user function
    function getUserFunction($UserId){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM user_has_function WHERE user_user_id='$UserId'";
        $result = $con->query($sql);
        return $result;
    }
    
   
}
