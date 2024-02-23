<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class item
{
    // get All Item category
    public function Allitemcategory()
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM item_category";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // get All Item Sub Category
    public function Allitemsubcategory()
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM item_subcategory";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // add Item
    function AddItem($Category, $Subcategory,$Iname,$Quantity,$Price)
    {
        $con = $GLOBALS['con'];
       
        $sql1 = "SHOW TABLE STATUS LIKE 'item'";
        $result1 = $con->query($sql1)or die($con->error);
        $row = $result1->fetch_assoc();
        $next_id = $row['Auto_increment'];
        $next_id =(string) $next_id;
        $id_length = strlen($next_id);
        $id_with_prefix = str_repeat('0',(3-$id_length)).$next_id;
        $new_itemcode = 'IT_5000'.$id_with_prefix;

        $sql = "INSERT INTO Item
       (    item_code, 
            item_category,
            item_subcategory,
            item_name,
            quantity,
            unit_price
            )
                VALUES( '$new_itemcode',
                        '$Category',
                        '$Subcategory',
                        '$Iname',
                        '$Quantity', 
                        '$Price'
                            )";
        $result = $con->query($sql) or die($con->error);
        $CusId = $con->insert_id;
        return $CusId;
    }

    // get all Item
    function getAllItem()
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT item.*,item_category.id as ic_id,item_subcategory.id as ics_id,item_category.category as icname,item_subcategory.sub_category as iscname FROM item JOIN item_category ON item.item_category=item_category.id JOIN item_subcategory ON item.item_subcategory=item_subcategory.id";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // view Item
    public function ViewItem($ItemId)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM item WHERE id='$ItemId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // update item
    function UpdateItem($ItemId,$Category,$Subcategory,$Iname,$Quantity,$Price)
    {
        $con = $GLOBALS["con"];
  
        $sql = "UPDATE item SET 
                        item_category = '$Category',
                        item_subcategory = '$Subcategory',
                        item_name = '$Iname',
                        quantity = '$Quantity',
                        unit_price = '$Price'
                WHERE id='$ItemId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
}
