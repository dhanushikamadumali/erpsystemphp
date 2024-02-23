<?php
include '../model/Report_Model.php';///include report model

$ReportObj = new Report();///create report object

$status = $_REQUEST["status"];///get status 
switch ($status){
    case "getinvoicereporttable"://///create case
        $FromDate = $_POST['fromdate'];///get from date
        $ToDate = $_POST['todate'];///get to date
    
            $Result=$ReportObj->getInvoiceReport($FromDate, $ToDate );///get result report model
            ?>
            <!--////////////////////view table\\\\\\\\\\\\\\\\\\\\\\\\-->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">INVOICE NUMBER</th>
                            <th scope="col">INVOICE DATE</th>
                            <th scope="col">CUSTOMER</th>
                            <th scope="col">CUSTOMER DISTRICT</th>
                            <th scope="col">ITEM COUNT</th>
                            <th scope="col">INVOICE AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row= $Result->fetch_assoc()){?>
                            <tr class="text-center">
                            <td><?php echo $row["invoice_no"]?> </td>
                            <td><?php echo $row["date"]?></td>
                            <td><?php echo $row["fname"]?></td>
                            <td><?php echo $row["dname"]?></td>
                            <td><?php echo $row["item_count"]?></td>
                            <td><?php echo $row["amount"]?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div> 
                    </div>
                <!--//////////////////including js\\\\\\\\\\\\\\\\\\\\-->
               <script  type="text/javascript">
                    $(document).ready(function() {
                        $('#example').DataTable();
                    });
               </script> 
                  <!--//////////////view table end\\\\\\\\\\\\\\\\\\\\\-->
            <?php
              break;
              case "getinvoiceitemreporttable"://///create case
                $FromDate = $_POST['fromdate'];///get from date
                $ToDate = $_POST['todate'];///get to date
                
                    $Result=$ReportObj->getInvoiceItemReport($FromDate, $ToDate );///get result report model
                    ?>
                    <!--////////////////////view table\\\\\\\\\\\\\\\\\\\\\\\\-->
                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-bordered" id="example">
                <thead>
                    <tr style="color: #fff"  class="bg-primary text-center" >
                    <th scope="col">INVOICE NUMBER</th>
                    <th scope="col">INVOICE DATE</th>    
                    <th scope="col">CUSTOMER</th>
                    <th scope="col">ITEM NAME/CODE</th>
                    <th scope="col">ITEM CATEGORY</th>
                    <th scope="col">UNIT PRICE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row= $Result->fetch_assoc()){?>
                    <tr class="text-center">
                    <td><?php echo $row["invoice_no"]?> </td>
                    <td><?php echo $row["idate"]?></td>
                    <td><?php echo $row["fname"]?></td>
                    <td><?php echo $row["iname"]?>/ <?php echo $row["icode"]?></td>
                    <td><?php echo $row["icname"]?></td>
                    <td><?php echo $row["iprice"]?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div> 
            </div>
        <!--//////////////////including js\\\\\\\\\\\\\\\\\\\\-->
       <script  type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable();
            });
       </script> 
          <!--//////////////view table end\\\\\\\\\\\\\\\\\\\\\-->
    <?php
      break;
 
}


