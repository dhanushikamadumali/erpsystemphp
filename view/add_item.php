<?php
include '../model/Item_Model.php'; ///include Item model

$ItemObj = new item(); //create Item object
$ItemResult = $ItemObj->getAllItem(); ///get all Item
$ItemCategoryResult = $ItemObj->Allitemcategory(); ///get all Item
$ItemSubCategoryResult = $ItemObj->Allitemsubcategory(); ///get all Item

?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Item</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet" type="text/css"  href="../css/styles1.css">    
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
</head>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!---------///////////header\\\\\\\\\------------>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Breadcrumb" style="height:49px;">
                    <ol class="breadcrumb">
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">ADD ITEM</h4>
                    <li class="breadcrumb-item"><a href="Item.php" style="color: #000;font-size:20px;text-decoration:none;">ITEM MANAGE</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if(isset($_GET["msg"])){
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <?php
                                $msg = $_REQUEST["msg"];
                                $msg = base64_decode($msg);
                                echo $msg;
                                ?>    
                            </div>
                        </div>
                        <?php
                        }
                        ?>    
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div id="ItemAlert"></div>
                </div> 
                </div>
         <!-------//////////add Item  //////////------> 
            <form id="AddItem" method="post" action="../controller/ItemController.php?status=add_item" enctype="multipart/form-data" >
                <div class="row">
                <div class="col-md-6"><lable class="control-label">Item Name :</lable><input type="text" name="iname" id="iname" class="form-control"></div>
                <div class="col-md-6">
                     <!------////////select category\\\\\\\\\\\------->
                     <label class="control-label">Category :</label>
                        <select name="category" id="category" class="form-control">
                            <option value="" >--</option>
                           
                            <?php
                                while ($RoleRow =$ItemCategoryResult->fetch_assoc()){  
                            ?>
                            <option value="<?php echo $RoleRow["id"]; ?>">
                                <?php echo $RoleRow["category"];?>
                            </option>
                            <?php
                            }
                            ?>       
                        </select>
                    <!------////////////select category end\\\\\\\\\------->
                </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-md-6">
                 <!------////////select category\\\\\\\\\\\------->
                 <label class="control-label">Sub Category :</label>
                    <select name="subcategory" id="subcategory" class="form-control">
                        <option value="" >--</option>
                           
                        <?php
                            while ($RoleRow =$ItemSubCategoryResult->fetch_assoc()){  
                        ?>
                        <option value="<?php echo $RoleRow["id"]; ?>">
                            <?php echo $RoleRow["sub_category"];?>
                        </option>
                        <?php
                        }
                        ?>       
                    </select>
                <!------////////////select sub category end\\\\\\\\\------->
            </div>
                <div class="col-md-6"><lable class="control-label">Quantity :</lable><input type="text" name="qty" id="qty"  class="form-control" onkeypress="isInputNumber(event)"></div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-md-6"><lable class="control-label">Unit Price :</lable><input type="text" name="price" id="price" class="form-control" onkeypress="isInputNumber(event)"></div>
                
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-md-2">
                <button type="submit" class="btn btn-block btn-primary" name="submit" id="submit" style="box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3), 0 3px 10px 0 rgba(0, 0, 0, 0.19)">
                <i class="fas fa-save">&nbsp;</i> Save
                </button>
                </div>
               
                </div> 
            </form>
        </div>
        </div>
       <!------///////// Content End\\\\\\\\------>
    </div>
    <!---------/////////// Flud End\\\\\\\\\\------>
    </div>
    </div> 
</body>
<!-- including js --> 
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>  
<script type="text/javascript" src="../js/popper.min.js"></script>   
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/sweetalert.js"></script>
<script type="text/javascript" src="../js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/datatable/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../js/Item_Validation.js" ></script>
<script>
   
      ///input number 
      function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!/[0-9]/.test(ch)){
        evt.preventDefault();
        }
    }
  
</script>
</html>


