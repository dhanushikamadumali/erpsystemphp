<?php
include '../model/Item_Model.php'; ///include Item model

$ItemObj = new item(); //create Item object
$ItemResult = $ItemObj->getAllItem(); ///get all Item

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Item view</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" media="All" href="../css/styles2.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
</head>

<body>
    <?php
    include '../includes/navbar.php'; //include navbaer

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Breadcrumb" class="breadcrumb" style="height:49px;">
                    <h4>ITEM MANAGEMENT</h4>
                </nav>
            </div>
        </div>
        <!----------////////////////button\\\\\\\\\\\\\\\\\----------->
        <div class="row">
            <div class="col-md-12">
                <ul class=" nav nav-pills ">
                    <a href="add_Item.php" class="btn btn-outline-primary ml-auto"><i class="fas fa-plus"></i> &nbsp; Add Item</a>
                </ul>
            </div>
        </div>
        <!----------//////////////////button end\\\\\\\\\\\\\------------------->
        <!-- <div class="row">&nbsp;</div> -->
        <!---------///////////////////view Item table\\\\\\\\\\\\\\\------------>
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
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr style="color: #fff" class="bg-primary text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">ITEM CODE</th>
                                    <th scope="col">ITEM NAME</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">SUB CATGEORY</th>
                                    <th scope="col">QUANTITY</th>
                                    <th scope="col">UNIT PRICE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($Itemrow = $ItemResult->fetch_assoc()) {$ItemId = $Itemrow ["id"];$ItemId = base64_encode($ItemId);?>
                                    <tr class="text-center">
                                        <td><?php echo $Itemrow["id"] ?></td>
                                        <td><?php echo $Itemrow["item_code"] ?></td>
                                        <td><?php echo $Itemrow["item_name"] ?></td>
                                        <td><?php echo $Itemrow["icname"] ?></td>
                                        <td><?php echo $Itemrow["iscname"] ?></td>
                                        <td><?php echo $Itemrow["quantity"] ?></td>
                                        <td><?php echo $Itemrow["unit_price"] ?></td>
                                        <td>
                                            <a href="../view/edit_Item.php?id=<?php echo $ItemId; ?>" class="btn btn-warning" style="color:#fff" data-toggle="tooltip" title="edit"><i class="far fa-edit"></i>&nbsp;</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                <!-------///////////////////view Item table end\\\\\\\\\\\\\\\\\\---->
              
            </div>
        </div>
        <!-------////////// Content End\\\\\\\\\\\\\\\\\\------>
    </div>
    <!----------/////////////// Flud End\\\\\\\\\\\\\\\\\\\\\\\------>
    </div>
    </div>
</body>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../js/popper.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/Item_Validation.js"></script>
<script type="text/javascript" src="../js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/datatable/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
        // dispaly data togal
        $('[data-toggle="tooltip"]').tooltip();
    });
    ////image preview
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#prev_img')
                    .attr('src', e.target.result)
                    .height(70)
                    .width(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    ////image preview end
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!/[0-9]/.test(ch)) {
            evt.preventDefault();
        }
    }

    function load_data(x) {
        var url = "../controller/ItemController.php?status=viewItem";
        $.post(url, {
            Item_id: x
        }, function(data) {
            $("#cus_count").html(data).show();
        });
    }
</script>

</html>