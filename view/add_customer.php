<?php
include '../model/District_Model.php';//include district model

$DistrictObj = new district();//create user object
$DistrictResult = $DistrictObj->getDistricts();//get user role result

?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Customer</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet" type="text/css"  href="../css/styles1.css">    
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
</head>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
  
    ?>
    <div class="container">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!---------///////////header\\\\\\\\\------------>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Breadcrumb" style="height:49px;">
                    <ol class="breadcrumb">
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">ADD CUSTOMER</h4>
                    <li class="breadcrumb-item"><a href="customer.php" style="color: #000;font-size:20px;text-decoration:none;">CUSTOMER MANAGE</a></li>
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
                    <div id="CustomerAlert"></div>
                </div> 
                </div>
         <!-------//////////add customer  //////////------> 
            <form id="AddCustomer" method="post" action="../controller/CustomerController.php?status=add_customer" enctype="multipart/form-data" >
                <div class="row">
                <div class="col-md-6"><lable class="control-label">Title :</lable><input type="text" name="title" id="title" class="form-control"></div>
                <div class="col-md-6"><lable class="control-label">First Name :</lable><input type="text" name="fname" id="fname"  class="form-control"></div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-md-6"><lable class="control-label">Middle Name :</lable><input type="text" name="mname" id="mname" class="form-control"></div>
                <div class="col-md-6"><lable class="control-label">Last Name :</lable><input type="text" name="lname" id="lname"  class="form-control"></div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-md-6"><lable class="control-label">Contact No :</lable><input type="text" name="cno" id="cno" class="form-control"></div>
                <div class="col-md-6"> 
                 <!------////////select district\\\\\\\\\\\------->
                 <label class="control-label">District</label>
                    <select name="district" id="district" class="form-control">
                        <option value="" >--</option>
                           
                        <?php
                            while ($RoleRow = $DistrictResult->fetch_assoc()){  
                        ?>
                        <option value="<?php echo $RoleRow["id"]; ?>">
                            <?php echo $RoleRow["district"];?>
                        </option>
                        <?php
                        }
                        ?>       
                    </select>
                <!------////////////select district end\\\\\\\\\------->
                </div>
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
<script type="text/javascript" src="../js/Customer_Validation.js" ></script>
<script>
      //display data table
    $(document).ready(function() {
        $('#example').DataTable();
    });
   
    ///input number 
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!/[0-9]/.test(ch)){
        evt.preventDefault();
        }
    }
    // upload image
    $(".custom-file-input").on("change",function(){
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</html>


