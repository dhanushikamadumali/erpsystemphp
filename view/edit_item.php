<?php
include '../model/Item_Model.php';//include item model

$ItemObj = new item(); //create Item object
$ItemId = $_REQUEST["id"];///get item id
$ItemId= base64_decode($ItemId);///item id decode
$ItemResult = $ItemObj->ViewItem($ItemId);///get the specific item information
$Irow = $ItemResult->fetch_assoc();///make a result as an array
$ItemCategoryResult = $ItemObj->Allitemcategory(); ///get all Item
$ItemSubCategoryResult = $ItemObj->Allitemsubcategory(); ///get all Item
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title>Edit Customer</title>   
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer

    ?>
    <div class="container">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!--------////////title bar\\\\\\\\\\\-------->
        <div class="row">
        <div class="col-md-12">
            <nav aria-label="Breadcrumb"  style="height:49px;">
                <ol class="breadcrumb">
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">EDIT ITEM</h4>
                <li class="breadcrumb-item"><a href="customer.php" style="color: #000;font-size:20px;text-decoration:none;">ITEM MANAGE</a></li>
                </ol>
            </nav> 
            </nav>
        </div>
        </div>
        <!--------//////////////////title bar end\\\\\\\\\\\-------->  
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!-------- ////////////alert view\\\\\\\\\\\\\\\\--------->
        <div class="col-md-12" ><div id="ItemAlert"></div></div>
        <!----------- alert view end\\\\\\\\\\\\\\\\\\ ----------->
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-12">&nbsp;</div>
        <!--------/////////////form start\\\\\\\\\\\\----------->
        <form id="Item">
            <input type="hidden" name="item_id" value="<?php echo $ItemId;?>">
        <div class="row">
            <div class="col-md-6"><lable class="control-label">Item Code :</lable><input type="text" name="icode" id="icode" class="form-control" value="<?php echo ($Irow ["item_code"]); ?>" readonly></div>
            <div class="col-md-6"><lable class="control-label">Item Name :</lable><input type="text" name="iname" id="iname" class="form-control" value="<?php echo ($Irow ["item_name"]); ?>"></div>
           
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
        <div class="col-md-6">
            <!------////////select Category\\\\\\\\\\\------->
             <lable class="control-label">Category :</lable>
                <select name="category" id="category" class="form-control">
                    <option value="" >--</option>
                    <?php
                        while ($RoleRow = $ItemCategoryResult->fetch_assoc()){  
                    ?>
                    <option value="<?php echo $RoleRow["id"]; ?>" <?php if($RoleRow["id"]==$Irow["item_category"]){?>selected="selected"<?php }?> >
                    <?php echo $RoleRow["category"];?>
                    </option>
                    <?php
                    }
                    ?>      
                </select>
            <!------////////////select Category end\\\\\\\\\------->
            </div>
            <div class="col-md-6">
                 <!------////////select Sub Category\\\\\\\\\\\------->
                 <lable class="control-label">Sub Category :</lable>
                    <select name="subcategory" id="subcategory" class="form-control">
                        <option value="" >--</option>
                        <?php
                            while ($RoleRow = $ItemSubCategoryResult->fetch_assoc()){  
                        ?>
                        <option value="<?php echo $RoleRow["id"]; ?>" <?php if($RoleRow["id"]==$Irow["item_subcategory"]){?>selected="selected"<?php }?> >
                        <?php echo $RoleRow["sub_category"];?>
                        </option>
                        <?php
                        }
                        ?>      
                    </select>
                <!------////////////select Sub Category end\\\\\\\\\------->
            
            </div>
            
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-6"><lable class="control-label">Quantity :</lable><input type="text" name="qty" id="qty"  class="form-control" onkeypress="isInputNumber(event)" value="<?php echo ($Irow["quantity"]); ?>"></div>
            <div class="col-md-6"><lable class="control-label">Unit Price :</lable><input type="text" name="price" id="price" class="form-control" onkeypress="isInputNumber(event)" value="<?php echo ($Irow["unit_price"]); ?>"></div>
           
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-2">
                <button type="submit" id="submit" class="btn btn-block btn-primary" style="box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3), 0 3px 10px 0 rgba(0, 0, 0, 0.19);color:#fff">
                <i class="fas fa-save">&nbsp;</i> Update
                </button>
            </div>
            </div>
            </form>
        <!----///////form end\\\\\\-------->
        </div>
        </div> 
        </div>
        </div> 
       <!--/////// Content End\\\\\\\------>
    </div>
    <!----////// Flud End\\\\\\\\\\\\------>
    </div>
</body>
<!-- including js -->
<script type="text/javascript" src="../js/popper.min.js"></script>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>  
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/sweetalert.js"></script>
<!-- <script type="text/javascript" src="../js/Customer_Validation.js" ></script> -->
<script>
    function isInputNumber(evt){////only number type function
        var ch = String.fromCharCode(evt.which);
        if(!/[0-9]/.test(ch)){
        evt.preventDefault();
        }
    } 
    ////Item update function
    $("#Item").on('submit', function(e){
        e.preventDefault(e);// Prevent the default behaviour

        var Iname = $('#iname').val();
        var Category = $('#category').val();
        var SubCategory = $('#subcategory').val();
        var Quantity = $('#qty').val();
        var Price = $('#price').val();

        if (Iname ==""){
        $("#ItemAlert").html('Please Enter Your item name').addClass("alert alert-danger");
        setTimeout(function() {$("#ItemAlert").removeClass('alert').empty()}, 8000);
        }else if (Category==""){
        $("#ItemAlert").html('Please Enter Your category').addClass("alert alert-danger");
        setTimeout(function() {$("#ItemAlert").removeClass('alert').empty()}, 8000);  
        }else if (SubCategory==""){
        $("#ItemAlert").html('Please Enter Your sub category').addClass("alert alert-danger");
        setTimeout(function() {$("#ItemAlert").removeClass('alert').empty()}, 8000);
        }else if (Quantity==""){
        $("#ItemAlert").html('Please Enter Your quantity').addClass("alert alert-danger");
        setTimeout(function() {$("#ItemAlert").removeClass('alert').empty()}, 8000);
        }else if (Price==""){
        $("#ItemAlert").html('Please Enter Your price').addClass("alert alert-danger");
        setTimeout(function() {$("#CustomerAlert").removeClass('alert').empty()}, 8000);
        }
        else{
            swal({
            title: "Edit Item?",
            text: "Are you sure, you want to edit item now !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "../controller/ItemController.php?status=update_item",
                    type:'POST', 
                    data: new FormData(this),
                    enctype: 'multipart/form-data',
                    cache:false,
                    processData:false,
                    contentType:false,
                    dataType:'json',
                    success: function(data){
                        console.log(data);
                        if(data[0]==1){
                            $("#ItemAlert").html(data[1]).removeClass('alert alert-danger').addClass("alert alert-success");
                            setTimeout(function(){window.location.href="../view/item.php?>";}, 5000);
                        }
                        if(data[0]==0){
                            $("#ItemAlert").html(data[1]).addClass("alert alert-danger");
                            setTimeout(function(){$("#ItemAlert").removeClass('alert').empty()}, 8000);
                        }
                    },
                    error:function(data){
                        console.error(data);
                    }

                });
            } 
            }); 
        }
    }); 
</script>
</html>


