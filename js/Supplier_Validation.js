$(document).ready(function(){//when the document is loaded
     
    $("#AddSupplier").submit(function(){///when the submit the form
        var SuppFname = $("#supp_fname").val();
        var SuppLname = $("#supp_lname").val();
        var SuppEmail = $("#supp_email").val();
        var SuppCno1  = $("#supp_cno1").val();
        var SuppCno2  = $("#supp_cno2").val();
        var SuppAddress  = $("#supp_address").val();
        
        if(SuppFname==""){///// if the Supplier fname  is not entered  
            $("#SupplierAlert").html("Please Enter First Name");
            $("#SupplierAlert").addClass("alert alert-danger");
            $("#supp_fname").focus();
            return false;
        }
        if(SuppLname==""){/////if the Supplier lname is not entered 
            $("#SupplierAlert").html("Please Enter last Name");
            $("#SupplierAlert").addClass("alert alert-danger");
            $("#supp_lname").focus();
            return false;
        }
        var patEmail=/^([a-zA-z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;///valid email pattern
        if(SuppEmail==""){/////if the Supplier lname is not entered 
            $("#SupplierAlert").html("Please Enter email");
            $("#SupplierAlert").addClass("alert alert-danger");
            $("#supp_email").focus();
            return false;
        }
        if(!SuppEmail.match(patEmail)){///if email is not entered
            $("#SupplierAlert").html("Invalid Email");
            $("#SupplierAlert").addClass("alert alert-danger");
            $("#supp_email").focus();
            return false;
        }
        var patCno1 = /^[0-9]{10}$/;////  valid new format pattern con1
        if(SuppCno1==""){///if contact number is not entered
            $("#SupplierAlert").html("Please Enter contact number");
            $("#SupplierAlert").addClass("alert alert-danger");
            $("#supp_cno1").focus();
            return false;  
        }
        if(!SuppCno1.match(patCno1)){
            $("#SupplierAlert").html("Please Enter valid Contact Number 1");
            $("#SupplierAlert").addClass("alert alert-danger");
            $("#supp_cno1").focus();
            return false;
        }
        var patCno2mobile = /^07[0-9]{8}$/;////  valid new format pattern con2
        if(SuppCno2==""){///if mobile number is not entered
            $("#SupplierAlert").html("Please Enter mobile number");
            $("#SupplierAlert").addClass("alert alert-danger");
            $("#supp_cno2").focus();
            return false;  
        }
        if(!SuppCno2.match(patCno2mobile)){/////  if not match con2
            $("#SupplierAlert").html("Please Enter valid Mobile Contact Number 2");
            $("#SupplierAlert").addClass("alert alert-danger");
            $("#supp_cno2").focus();
            return false;
        }
        if (SuppAddress==""){//if supplier address is not entered  
            $("#SupplierAlert").html("Please enter Address");
            $("#SupplierAlert").addClass("alert alert-danger");
            $("#supp_address").focus();
            return false;
        }        
    });
});





