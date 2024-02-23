$(document).ready(function(){//when the document is loaded
    
    $("#AddCustomer").submit(function(){
 
        var Title = $("#title").val();
        var Fname = $("#fname").val();
        var Mname = $("#mname").val();
        var Lname   = $("#lname").val();
        var Cno  = $("#cno").val();
        var District  = $("#district").val();

        if(Title==""){///// if the cuss fname  is not entered  
            $("#CustomerAlert").html("Please Enter Your Title");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#title").focus();
            return false;
        }
        if(Fname==""){//////if the cuss lname is not entered 
            $("#CustomerAlert").html("Please Enter Your first Name");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#fname").focus();
            return false;
        }
        if(Mname==""){///if email is not entered
            $("#CustomerAlert").html("Please Enter Your middle Name");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#mname").focus();
            return false;  
        }
        if(Lname==""){///if nic is not entered
            $("#CustomerAlert").html("Please Enter Your last Name");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#lname").focus();
            return false;  
        }
        var patCno1 = /^[0-9]{10}$/;
        if(Cno==""){///if contact number is not entered
            $("#CustomerAlert").html("Please Enter Your  contact number");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#cno").focus();
            return false;  
        }
        if(Cno!==""){/////if cno is not  empty
            if(!CussCno2.match(patCno1)){
                $("#CustomerAlert").html("Please Enter your valid contact Number");
                $("#CustomerAlert").addClass("alert alert-danger");
                $("#cno").focus();
                return false;
            }
            }
        if(District==""){///if nic is not entered
            $("#CustomerAlert").html("Please Enter Your last Name");
            $("#CustomerAlert").addClass("alert alert-danger");
            $("#district").focus();
            return false;  
        }
    });
});





