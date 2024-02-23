<?php
include '../model/Customer_Model.php';//include Customer model
include '../model/District_Model.php';//include district model

$CustomerObj = new customer();//create customer object
$CustomerId = $_REQUEST["id"];///get customer id
$CustomerId = base64_decode($CustomerId);///customer id decode
$CustomerResult = $CustomerObj->ViewCustomer($CustomerId );///get the specific customer information
$Crow = $CustomerResult ->fetch_assoc();///make a result as an array
$DistrictObj = new district();//create Customer object
$DistrictResult = $DistrictObj->getDistricts();//get Customer role result
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
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">EDIT CUSTOMER</h4>
                <li class="breadcrumb-item"><a href="customer.php" style="color: #000;font-size:20px;text-decoration:none;">CUSTOMER MANAGE</a></li>
                </ol>
            </nav> 
            </nav>
        </div>
        </div>
        <!--------//////////////////title bar end\\\\\\\\\\\-------->  
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!-------- ////////////alert view\\\\\\\\\\\\\\\\--------->
        <div class="col-md-12" ><div id="CustomerAlert"></div></div>
        <!----------- alert view end\\\\\\\\\\\\\\\\\\ ----------->
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-12">&nbsp;</div>
        <!--------/////////////form start\\\\\\\\\\\\----------->
        <form id="Customer">
            <input type="hidden" name="customer_id" value="<?php echo $CustomerId;?>">
        <div class="row">
            <div class="col-md-6"><lable class="control-label">Title</lable><input type="text" name="title" id="title" class="form-control" value="<?php echo ($Crow["title"]); ?>"></div>
            <div class="col-md-6"><lable class="control-label">First Name</lable><input type="text" name="fname" id="fname" class="form-control" value="<?php echo ($Crow["first_name"]); ?>"></div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-6"><lable class="control-label">Middle Name</lable><input type="text" name="mname" id="mname" class="form-control" value="<?php echo ($Crow["middle_name"]); ?>"></div>
            <div class="col-md-6"><lable class="control-label">LastEmail</lable><input type="text" name="lname" id="lname" class="form-control" value="<?php echo ($Crow["last_name"]); ?>"></div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-6"><lable class="control-label">Contact number</lable><input type="text" name="cno" id="cno" class="form-control"  value="<?php echo ($Crow["contact_no"]);?>" ></div>
            <div class="col-md-6">
            <!------////////select Customer role\\\\\\\\\\\------->
             <lable class="control-label">Customer role</lable>
                <select name="district" id="district" class="form-control">
                    <option value="" >--</option>
                    <?php
                        while ($RoleRow = $DistrictResult->fetch_assoc()){  
                    ?>
                    <option value="<?php echo $RoleRow["id"]; ?>" <?php if($RoleRow["id"]==$Crow["district"]){?>selected="selected"<?php }?> >
                    <?php echo $RoleRow["district"];?>
                    </option>
                    <?php
                    }
                    ?>      
                </select>
            <!------////////////select Customer role end\\\\\\\\\------->
            </div>
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
  
   
    $(".custom-file-input").on("change",function(){// upload image
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    function isInputNumber(evt){////only number type function
        var ch = String.fromCharCode(evt.which);
        if(!/[0-9]/.test(ch)){
        evt.preventDefault();
        }
    } 
    ////Customer update function

   
    $("#Customer").on('submit', function(e){
        e.preventDefault(e);// Prevent the default behaviour
        var Title = $('#title').val();
        var Fname = $('#fname').val();
        var Mname = $('#mname').val();
        var Lname = $('#lname').val();
        var Contact = $('#cno').val();
        var District = $('#district').val(); 
    
        var patCno1 = /^[0-9]{10}$/;
        if (Title ==""){
        $("#CustomerAlert").html('Please Enter Your Title').addClass("alert alert-danger");
        setTimeout(function() {$("#CustomerAlert").removeClass('alert').empty()}, 8000);
        }else if (Fname==""){
        $("#CustomerAlert").html('Please Enter Your last Name').addClass("alert alert-danger");
        setTimeout(function() {$("#CustomerAlert").removeClass('alert').empty()}, 8000);  
        }else if (Mname==""){
        $("#CustomerAlert").html('Please Enter Your Middle Name').addClass("alert alert-danger");
        setTimeout(function() {$("#CustomerAlert").removeClass('alert').empty()}, 8000);
        }else if (Lname==""){
        $("#CustomerAlert").html('Please Enter Your Last Name').addClass("alert alert-danger");
        setTimeout(function() {$("#CustomerAlert").removeClass('alert').empty()}, 8000);
        }else if (Contact==""){
        $("#CustomerAlert").html('Please Enter Your  contact no').addClass("alert alert-danger");
        setTimeout(function() {$("#CustomerAlert").removeClass('alert').empty()}, 8000);
        }else if(!Contact.match(patCno1)){
        $("#CustomerAlert").html('Please Enter Your Valid Contact Number 1').addClass("alert alert-danger");
        setTimeout(function() {$("#CustomerAlert").removeClass('alert').empty()}, 8000);
        }else if (District==""){
            $("#CustomerAlert").html('Please Enter Your District').addClass("alert alert-danger");
            setTimeout(function() {$("#CustomerAlert").removeClass('alert').empty()}, 8000);
        }
        else{
            swal({
            title: "Edit Customer?",
            text: "Are you sure, you want to edit Customer now !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "../controller/CustomerController.php?status=update_Customer",
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
                            $("#CustomerAlert").html(data[1]).removeClass('alert alert-danger').addClass("alert alert-success");
                            setTimeout(function(){window.location.href="../view/customer.php?>";}, 5000);
                        }
                        if(data[0]==0){
                            $("#CustomerAlert").html(data[1]).addClass("alert alert-danger");
                            setTimeout(function(){$("#CustomerAlert").removeClass('alert').empty()}, 8000);
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


