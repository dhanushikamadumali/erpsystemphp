<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class customer
{
    // add customer
    function AddCustomer($title, $cus_fname, $cus_mname, $cus_lname, $cno, $district)
    {
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO customer
       (    title, 
            first_name,
            middle_name,
            last_name,
            contact_no,
            district
            )
                VALUES( 
                        '$title',
                        '$cus_fname',
                        '$cus_mname',
                        '$cus_lname',
                        '$cno', 
                        '$district'
                            )";
        $result = $con->query($sql) or die($con->error);
        $CusId = $con->insert_id;
        return $CusId;
    }

    // get all customer
    function getAllCustomer()
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT customer.*,district.id as d_id,district.district as dname FROM customer JOIN district ON customer.district=district.id";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // view customer
    public function ViewCustomer($CusId)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM customer WHERE id='$CusId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // update customer
    function UpdateCustomer($CustomerId, $title, $cus_fname, $cus_mname, $cus_lname, $cno, $district,)
    {
        $con = $GLOBALS["con"];

        $sql = "UPDATE customer SET 
                    title = '$title', 
                    first_name =  '$cus_fname',
                    middle_name= '$cus_mname',
                    last_name = '$cus_lname',
                    contact_no = '$cno',
                    district ='$district'
                WHERE id='$CustomerId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
}
