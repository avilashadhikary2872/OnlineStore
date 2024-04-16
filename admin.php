<?php
require("common.php");
//if (!isset($_SESSION['email'])) {
  //  header('location: admin.php');
//}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | RunnerFIT</title>
        <link href="https://fonts.googleapis.com/css2?family=Andika&family=Quicksand&display=swap" rel="stylesheet">
        <link href="admin.css" rel="stylesheet">
        <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="jquery.js"></script>
        <script src="bootstrap.min.js"></script>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div class="row text-center" id="mens" style="width: 100%; height: 84.4%; display: flex; justify-content: center; gap: 2%;">
            <div class="col-md-3 col-sm-6 home-feature" style="width:250px;">
                <div class="thumbnail">
                    <img src="salereport.png" alt="" height="250px" width="200px">
                    <a href="salesreport.php" name="salesreport" class="btn btn-block btn-primary" style="font-size: 18px; font-family: 'Quicksand', sans-serif;">Sales Report</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 home-feature" style="width:250px;">
                <div class="thumbnail">
                    <img src="productmanagement.jpg" alt="" height="250px" width="200px">
                    <a href="productmanagement.php" name="productmanagement" class="btn btn-block btn-primary" style="font-size: 18px; font-family: 'Quicksand', sans-serif;">Product Management</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 home-feature" style="width:250px;">
                <div class="thumbnail">
                    <img src="checkinventory.jpg" alt="" height="250px" width="200px">
                    <a href="checkinventory.php" name="checkinventory" class="btn btn-block btn-primary" style="font-size: 18px; font-family: 'Quicksand', sans-serif;">Check Inventory</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 home-feature" style="width:250px;">
                <div class="thumbnail">
                    <img src="manageusers.jpg" alt="" height="250px" width="200px">
                    <a href="<?php if ($_SESSION['role'] == 'Super-Admin') { ?>manageusersbysuperadmin.php<?php } else if ($_SESSION['role'] == 'Sub-Admin') { ?>manageusersbysubadmin.php<?php } ?>" name="manageusers" class="btn btn-block btn-primary" style="font-size: 18px; font-family: 'Quicksand', sans-serif;">Users Management</a>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>