<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class Report{
  
    // get invoice  report
    function getInvoiceReport($fromdate,$todate){
        $con =$GLOBALS['con'];
        $sql ="SELECT invoice.*,customer.id as cid,customer.first_name as fname,customer.district as cdi,district.id as did,district.district as dname FROM invoice JOIN customer ON invoice.customer=customer.id JOIN district ON customer.district=district.id WHERE invoice.date>='$fromdate' AND invoice.date<='$todate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
     // get invoice item report
     function getInvoiceItemReport($fromdate,$todate){
        $con =$GLOBALS['con'];
        $sql ="SELECT invoice_master.*,invoice.id as inid,invoice.invoice_no as ino,invoice.date as idate ,customer.id as cid,customer.first_name as fname,customer.district as cdi,item.id as iid,item.item_code as icode,item.item_name as iname,item.unit_price as iprice,item_category.id as icid,item_category.category as icname FROM invoice_master JOIN invoice ON invoice.invoice_no=invoice_master.invoice_no JOIN customer ON customer.id=invoice.customer JOIN item ON item.id=invoice_master.item_id JOIN item_category ON item_category.id=item.item_category WHERE invoice.date>='$fromdate' AND invoice.date<='$todate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
     // get item report
    function getItemReport(){
        $con =$GLOBALS['con'];      
        $sql ="SELECT item.*,item_category.id as iid,item_category.category as icname,item_subcategory.id as iscid ,item_subcategory.sub_category as iscname FROM item JOIN item_category ON item_category.id=item.item_category JOIN item_subcategory ON item_subcategory.id=item_subcategory";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
   
}


?>