<?php
if(isset($_REQUEST["status"])){//////if have value request status
    include '../model/Customer_Model.php';//////include customer model
    $CustomerObj = new customer();//////create object
    $status = $_REQUEST["status"];
    switch ($status){
        case "add_customer"://////for add customer 
            $Title = $_POST["title"];//////get customer title
            $FirstName = $_POST["fname"];//////get customer fname
            $MiddleName = $_POST["mname"];//////get customer mname
            $LastName = $_POST["lname"];/////////get customer lname
            $Contactno = $_POST["cno"];/////////get cno
            $District = $_POST["district"];///////get district
           
           
           try{////server side validation
                if($Title==""){///////if first name empty
                    throw  new Exception("Title Cannot Be Empty!!!");
                }
                if($FirstName==""){///////if first name empty
                    throw  new Exception("FirstName Cannot Be Empty!!!");
                }
                if($MiddleName==""){///////if first name empty
                    throw  new Exception("MiddleName Cannot Be Empty!!!");
                }
                if($LastName==""){//////if last name empty
                    throw  new Exception("lastName Cannot Be Empty!!!");
                }
                
                if ($District =="") {///////if nic empty
                    throw new Exception("District  Cannot Be Empty!!!");
                }
                $patCno1 = "/^[0-9]{10}$/";/////  valid new format pattern con1
               
                if(!preg_match($patCno1, $Contactno) ){///if not match nic\\\\\
                    throw  new Exception("Please Enter your valid Contact Number 1");
                }
               
                $CusId = $CustomerObj->AddCustomer($Title,$FirstName,$MiddleName, $LastName, $Contactno,  $District);/////pass value to customer module
                
               $msg = "Successfully Inserted  $FirstName"." "." $LastName";////msg variable create
               $msg = base64_encode($msg);/////msg is encode
               ?>
               <!-- /////riderected -->
               <script>window.location = "../view/customer.php?msg=<?php echo $msg;?>"</script>
               <?php 
            } catch (Exception $ex) {///////catch exeptionn
               $msg = $ex->getMessage();////////get message value
               $msg = base64_encode($msg);
               ?>
               <!-- ////riderected -->
               <script>window.location = "../view/add_customer.php?msg=<?php echo $msg;?>"</script>
               <?php 

           }
        break;
     
        case "update_Customer" :///update user
           
        try{
            $Customer_id = $_POST["customer_id"]; 
            $Title = $_POST["title"];//////get customer title
            $FirstName = $_POST["fname"];//////get customer fname
            $MiddleName = $_POST["mname"];//////get customer mname
            $LastName = $_POST["lname"];/////////get customer lname
            $Contactno = $_POST["cno"];/////////get cno
            $District = $_POST["district"];///////get district
           
            $patCno1 = "/^[0-9]{10}$/";/////  valid new format pattern con1
            if($Title==""){///////if first name empty
                throw  new Exception("Title Cannot Be Empty!!!");
            }
            if($FirstName==""){///////if first name empty
                throw  new Exception("FirstName Cannot Be Empty!!!");
            }
            if($MiddleName==""){///////if first name empty
                throw  new Exception("MiddleName Cannot Be Empty!!!");
            }
            if($LastName==""){//////if last name empty
                throw  new Exception("lastName Cannot Be Empty!!!");
            }
                
            if ($District =="") {///////if nic empty
                throw new Exception("District  Cannot Be Empty!!!");
            }
            $patCno1 = "/^[0-9]{10}$/";/////  valid new format pattern con1
               
            if(!preg_match($patCno1, $Contactno) ){///if not match nic\\\\\
                throw  new Exception("Please Enter your valid Contact Number 1");
            }
               
            $data[0]=1;
            $data[1] = 'Successfully Update Customer!!';///data success array
       
           
            $CusId =  $CustomerObj->UpdateCustomer($Customer_id,$Title,$FirstName,$MiddleName, $LastName, $Contactno,  $District);/////pass value to customer module
        
        }   catch (Exception $ex) {////////catch exeptionn
            $data[0]=0;
            $data[1]=$ex->getMessage();
        }
        echo json_encode($data);  
        
    break;
    
		
		
    }
}
