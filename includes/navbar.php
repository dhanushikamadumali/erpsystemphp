<?php
$url = $_SERVER['REQUEST_URI'];
$a = explode("/", $url);
$l = sizeof($a);
$pathname = $a[$l - 1];

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/stylesdashboard.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!----side bar start----->
            <div class="bg-dark" id="menu">
                <nav class="siderbar">
                    <ul class="navbar-nav">
                        <a class=" bg-secondary list-group-item list-group-item-action  text-white">
                            <span style="font-weight: bold;font-size: 20px">ERP SYSTEM</span>
                        </a>

                        <a href="dashboard.php" class="<?php if ($pathname == "dashboard.php") echo "active2" ?> bg-dark list-group-item list-group-item-action text-white" style="height: 50px">
                            <i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;<span style=" font-size: 18px">Dashboard</span>
                        </a>
                        <!-------customer management start----->
                        <a href="customer.php" class="bg-dark list-group-item list-group-item-action text-white <?php if ($pathname == "customer.php") echo "active2" ?>"" style=" height: 50px">
                            <i class="fas fa-user-tie"></i><span style="font-size: 18px">Customer</span>
                        </a>
                        <!---------item management start------->
                        <a href="item.php" class="bg-dark list-group-item list-group-item-action text-white <?php if ($pathname == "item.php") echo "active2" ?>"" style=" height: 50px">
                            <i class="far fa-id-card"></i><span style="font-size: 18px">Item</span>
                        </a>
                        <!---------report management start-------->
                        <a href="report.php" class="bg-dark list-group-item list-group-item-action text-white <?php if ($pathname == "report.php") echo "active2" ?>"" style=" height: 50px">
                            <i class="fas fa-chart-bar"></i><span style=" font-size: 18px">Report</span>
                        </a>
                </nav>
            </div>
            <!----/////////sidebar end\\\\\\\\\\\\\-------->
            <!-----///////////header nav start\\\\\\\\\\---->
            <div id="content">
                <nav class="navbar navbar-expand-md bg-secondary navbar-secondary" style="height:57px">

                    <a href="#" id="toggle" class="navbar-toggler-icon">
                        <i class="fas fa-bars" style="color:#fff; font-size:26px;"></i>
                    </a>


                </nav>
                <!-----///////////////header nav end\\\\\\\\\\\------->
                <!-- js including -->
                <script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
                <script type="text/javascript" src="../js/popper.min.js"></script>
                <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="../js/dashboard_validation.js"></script>
                <script type="text/javascript" src="../js/sweetalert.js"></script>
                <script>
                    $(document).ready(function() {
                        // dispaly data togal
                        $('[data-toggle="tooltip"]').tooltip();

                    });
                </script>
</body>

</html>