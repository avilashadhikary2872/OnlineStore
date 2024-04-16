<?php
require_once("common.php");
if (!isset($_SESSION['email'])) {
    header('location: admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Product Management | RunnerFIT</title>
        <link href="https://fonts.googleapis.com/css2?family=Andika&family=Quicksand&display=swap" rel="stylesheet">
        <link href="addproduct.css" rel="stylesheet">
        <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="jquery.js"></script>
        <script src="bootstrap.min.js"></script>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div class="col-lg-4 col-md-6" id="settings-container">
            <div class="enter_details">
                <h3>Enter the product details</h3><br>
                <form action="addproductdatabase.php" method="POST" enctype="multipart/form-data">

                <label for="filepath">Select file:</label>
                <!--<input type="file" name="filepath" id="filepath"><br>-->
                <input type="text" name="filepath" id="filepath"><br><br>

                <label for="id">ID:</label><br>
                <input type="text" name="id" id="id"><br><br>

                <label for="name">Product Name:</label><br>
                <input type="text" name="name" id="name" value="RunnerFIT "><br><br>

                <label for="price">Price:</label><br>
                <input type="text" name="price" id="price" placeholder="Rs."><br><br>

                <button type="submit" name="submit" class="btn btn-primary">Add Item</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                </form>
            </div>
        </div>  
        <?php include("footer.php"); ?>
    </body>
</html>
