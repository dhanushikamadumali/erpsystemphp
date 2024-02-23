<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Income Report</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">

</head>
<style>
    .view:focus {
        outline-style: none;
    }
</style>

<body>
    <?php
    include '../includes/navbar.php'; //include navbaer

    ?>
    <div class="container">
        <!---------///////////header\\\\\\\\\------------>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Breadcrumb" style="height:49px;">
                    <ol class="breadcrumb">
                        <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">INVOICE ITEM REPORT</h4>
                        <li class="breadcrumb-item"><a href="report.php" style="color: #000;font-size:20px;text-decoration:none;">REPORT MANAGE</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">&nbsp;</div>
        <!--------///////user view table\\\\\\\\\\\-------->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if (isset($_GET["msg"])) {
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
                <!-- <div class="row"><div class="col-md-12">&nbsp;</div></div> -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <!-- INCOME -->
                        <div class="row">&nbsp;</div>
                        <form method="post" action="../view/report_invoice_item.php" enctype="multipart/form-data">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><label style="font-weight: bold;">FROM :</label></div>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><input type="date" class="form-control fromdate" id="FromDate" name="FromDate"></div>
                                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><label style="font-weight: bold;">TO :</label></div>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><input type="date" class="form-control todate" id="ToDate" name="ToDate"></div>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <button type="button" class="btn btn-primary report">VIEW REPORT </button>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <button type="submit" class="btn btn-primary pdf">PDF </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">&nbsp;</div>
                        <div class="row">&nbsp;</div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div id="select"></div>
                            </div>
                        </div>
                    </div>
                    <!-- INCOME END -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
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
<script type="text/javascript">
    $(".report").click(function() {

        $.ajax({
            type: "post",
            url: "../controller/ReportController.php?status=getinvoiceitemreporttable",
            data: {
                fromdate: $(".fromdate").val(),
                todate: $(".todate").val(),
            },
            success: function(res) {
                $("#select").empty();
                $("#select").append(res);
            }
        });
    })
</script>

</html>