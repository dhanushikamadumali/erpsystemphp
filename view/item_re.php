<?php
include '../model/Report_Model.php'; ///include report model

$ReportObj = new Report(); ///create report object
$ItemResult = $ReportObj->getItemReport(); ///get all Item
?>
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
                        <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">INVOICE REPORT</h4>
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

                <!-- <div class="row"><div class="col-md-12">&nbsp;</div></div> -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <!-- INCOME -->
                        <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                          <a href="../view/report_item.php"   class="btn btn-primary ">PDF </a> 
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <table class="table table-bordered" id="example">
                                    <thead>
                                        <tr style="color: #fff" class="bg-primary text-center">
                                            <th scope="col">ID</th>
                                            <th scope="col">ITEM NAME</th>
                                            <th scope="col">ITEM CATEGORY</th>
                                            <th scope="col">ITEM SUB CATEGORY</th>
                                            <th scope="col">ITEM QUANTITY</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $ItemResult->fetch_assoc()) { ?>
                                            <tr class="text-center">
                                                <td><?php echo $row["id"] ?> </td>
                                                <td><?php echo $row["item_name"] ?> </td>
                                                <td><?php echo $row["icname"] ?></td>
                                                <td><?php echo $row["iscname"] ?></td>
                                                <td><?php echo $row["quantity"] ?></td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>