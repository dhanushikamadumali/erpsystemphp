<?php
if (isset($_REQUEST["status"])) { //////if have value request status
    include '../model/Item_Model.php'; //////include customer model
    $ItemObj = new item(); //////create object
    $status = $_REQUEST["status"];
    switch ($status) {
        case "add_item": //////for add customer 
            $Iname = $_POST["iname"]; //////get item name
            $Category = $_POST["category"]; //////get category
            $Subcategory = $_POST["subcategory"]; //////get sub category
            $Quantity = $_POST["qty"]; /////////get quantity
            $Price = $_POST["price"]; /////////get price

            try {
                ////server side validation
                if ($Iname == "") { ///////if item name empty
                    throw  new Exception("Item Cannot Be Empty!!!");
                }
                if ($Category == "") { ///////if category empty
                    throw  new Exception("Category Cannot Be Empty!!!");
                }
                if ($Subcategory == "") { ///////if sub category empty
                    throw  new Exception("SubCategory Cannot Be Empty!!!");
                }
                if ($Quantity == "") { //////if quantity empty
                    throw  new Exception("Quantity Cannot Be Empty!!!");
                }
                if ($Price == "") { ///////if price empty
                    throw new Exception(" Price  Cannot Be Empty!!!");
                }


                $ItemId = $ItemObj->AddItem($Category, $Subcategory, $Iname, $Quantity, $Price); /////pass value to item module

                $msg = "Successfully Inserted $Iname"; ////msg variable create
                $msg = base64_encode($msg); /////msg is encode
                ?>
                <!-- /////riderected -->
                <script>
                    window.location = "../view/item.php?msg=<?php echo $msg; ?>"
                </script>
            <?php
            } catch (Exception $ex) { ///////catch exeptionn
                $msg = $ex->getMessage(); ////////get message value
                $msg = base64_encode($msg);
            ?>
                <!-- ////riderected -->
                <script>
                    window.location = "../view/add_item.php?msg=<?php echo $msg; ?>"
                </script>
            <?php

            }
            break;

        case "update_item": ///update item

            try {
                $ItemId = $_POST["item_id"];
                $Iname = $_POST["iname"]; //////get item name
                $Category = $_POST["category"]; //////get category
                $Subcategory = $_POST["subcategory"]; //////get sub category
                $Quantity = $_POST["qty"]; /////////get quantity
                $Price = $_POST["price"]; /////////get price

                ////server side validation

                if ($Category == "") { ///////if category empty
                    throw  new Exception("Category Cannot Be Empty!!!");
                }
                if ($Subcategory == "") { ///////if sub category empty
                    throw  new Exception("SubCategory Cannot Be Empty!!!");
                }
                if ($Iname == "") { ///////if item name empty
                    throw  new Exception("Item Cannot Be Empty!!!");
                }
                if ($Quantity == "") { //////if quantity empty
                    throw  new Exception("Quantity Cannot Be Empty!!!");
                }
                if ($Price == "") { ///////if price empty
                    throw new Exception(" Price  Cannot Be Empty!!!");
                }

                $data[0] = 1;
                $data[1] = 'Successfully Update Item!!'; ///data success array

                $ItemId = $ItemObj->UpdateItem($ItemId, $Category, $Subcategory, $Iname, $Quantity, $Price); /////pass value to item module

            } catch (Exception $ex) { ////////catch exeptionn
                $data[0] = 0;
                $data[1] = $ex->getMessage();
            }
            echo json_encode($data);

            break;
    }
}
