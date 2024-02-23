<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report</title>
    <link  rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link  rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
    <link  rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">    
</head>
<style>
.product_image{
  border-radius: 3px;
  padding: 10px 10px 10px 10px;
  border: 3px solid #2d82d2;
  height: 150px;
}
#topic{
    text-shadow:2px 2px 5px #94b8b8;
    color:#4d79ff;
    text-align: center;
    font-size: 30px;
    font-weight:bold;
}
</style>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
  
    ?>
    <div class="container">
        <!---------///////////header\\\\\\\\\------------>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
            <nav aria-label="Breadcrumb" class="breadcrumb" style="height:49px;">
            <h4>REPORT MANAGEMENT</h4>
            </nav>
            </div>
        </div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row" style="padding-top: 70px;">&nbsp;</div>
        <!--------///////user view table\\\\\\\\\\\-------->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if(isset($_GET["msg"])){
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-success">
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
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="product_image">
                            <p id="topic">INVOICE REPORT</p>
                            <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">&nbsp;</div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <a href="invoice.php" class="btn btn" style="background-color:#0099cc;color:#fff">GET</a>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">&nbsp;</div>   
                            </div>
                            <div class="row">&nbsp;</div>
                            </div>   
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="product_image">
                            <p id="topic">INVOICE ITEM REPORT</p>
                            <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">&nbsp;</div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <a  href="invoice_item.php" class="btn btn" style="background-color:#0099cc;color:#fff">GET</a>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">&nbsp;</div>   
                            </div>
                            <div class="row">&nbsp;</div>
                            </div>   
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="product_image">
                            <p id="topic">ITEM REPORT</p>
                            <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">&nbsp;</div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <a  href="item_re.php" class="btn btn" style="background-color:#0099cc;color:#fff">GET</a>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">&nbsp;</div>   
                            </div>
                            <div class="row">&nbsp;</div>
                            </div>  
                        </div>
                    </div>
                    </div> 
                </div>
               
                <div class="row"><div class="col-md-12">&nbsp;</div></div> 
            </div> 
         <!-------/////////user view table end//////////---->
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
</html>


