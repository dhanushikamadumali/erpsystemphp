

$(document).ready(function(){//when the document is loaded

    var sizesArr = [];
    $("input[key=size").on('change',function(){
    var sizeVal = $(this).val();
    if($(this).prop("checked") == true){
        sizesArr.push(sizeVal);
    }else{
        if(sizesArr.includes(sizeVal)){//if value has in arryy
            var index = sizeArr.indexOf(sizeVal);//get index in array value
            sizesArr.splice(index, 2);//value remove in array
        }
    }
    });
  
    $("#stock").submit(function(){////when the submit the form
       
        var ProductPrice   = $("#product_price").val();
             
        if(ProductPrice==""){/////if product price is not entered
            $("#StockAlert").html("Please Enter price");
            $("#StockAlert").addClass("alert alert-danger");
            $("#product_price").focus();
            return false;
        }
        var selectCount = 0;/////  select count
        $(".chkbx").each(function(index){
            if($(this).is(":checked")){// if chech box is checked
                selectCount++;
            }
        });
        if(selectCount==0){//select count is 0
            $("#StockAlert").html("At least One size must be selected");
            $("#StockAlert").addClass("alert alert-danger");
            $("#sizeId").focus();
            return false;
        }
        var IsValid = true;
        for(i=0; i < sizesArr.length; i++){//array check value by value
            if($("#qty" + sizesArr[i]).val() == ""){//if empty qty, relavent privious array values size id
                $("#StockAlert").html("Please Enter Stock Quantity");
                $("#StockAlert").addClass("alert alert-danger");
                IsValid = false;
                break;
            }
        }
        return IsValid;
        
    });

});


