<?php
require_once("common.php");

// Initialize detailsArray
$detailsArray = array();

// Check if form is submitted
if(isset($_POST['submit'])) {
    $pid = $_POST['pid'];
    $size = $_POST['size'];
    $color = $_POST['color'];

    // Construct query based on form input
    $query = "SELECT products.pid, pname, price, category, pgender, size, color, quantity_sold, quantity_left FROM products JOIN product_varients ON products.pid = product_varients.pid WHERE 1";
    if(!empty($pid)) {
        $query .= " AND products.pid = '$pid'";
    }
    if(!empty($size)) {
        $query .= " AND size = '$size'";
    }
    if(!empty($color)) {
        $query .= " AND color = '$color'";
    }

    // Execute the query
    $result = mysqli_query($con, $query) or die($mysqli_error($con));

    // Fetch rows and store them in the array
    while ($row = $result->fetch_assoc()) {
        $detailsArray[] = $row;
    }
}

// Function to fetch product IDs details
function fetchProductDetails() {
    global $con;
    // Query to fetch only specific columns from products table
    $query = "SELECT pid, pname, price, category, pgender FROM products";
    $result = mysqli_query($con, $query) or die($mysqli_error($con));
    $detailsArray = array();
    // Fetch rows and store them in the array
    while ($row = $result->fetch_assoc()) {
        $detailsArray[] = $row;
    }
    return $detailsArray;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Inventory | RunnerFIT</title>
    <link href="https://fonts.googleapis.com/css2?family=Andika&family=Quicksand&display=swap" rel="stylesheet">
    <link href="addproduct.css" rel="stylesheet">
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="col-lg-4 col-md-6" id="settings-container" style="margin-bottom: 5%;">
        <div class="enter_details">
            <h3 style="margin-top: 0%">Search for specific product</h3>
            <p style="color: grey;">!!! Click 'Product IDs' button to view all product IDs. !!!</p><br>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="pid">ID: </label>
                <input type="number" name="pid" id="pid" min="1001" style="width: 100px;"><br><br>
                <label for="size">Size: </label>
                <select name="size">
                    <option value=""></option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
                <br><br>
                <label for="color">Color: </label>
                <select name="color">
                    <option value=""></option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Red">Red</option>
                    <option value="Grey">Grey</option>
                    <option value="Green">Green</option>
                </select>
                <br><br>
                <button type="submit" name="submit" class="btn btn-primary">Search Product</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
            </form>
            <form action="" method="POST" style="margin-top: -20.5%; margin-left: 40%;">
                <button type="submit" name="product_ids" class="btn btn-primary">Product IDs</button>
            </form>
            <h3 style="margin-top: 5%; font-family: 'Quicksand', sans-serif;">Inventory Details</h3><br>
            <table style="width: 1100px;">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>For Gender</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Quantity Sold</th>
                    <th>Quantity Left</th>
                </tr>
                <?php foreach ($detailsArray as $details): ?>
                    <tr>
                        <?php foreach ($details as $detail): ?>
                            <td><?php echo $detail; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php 
            if(isset($_POST['product_ids'])) {
                $productDetails = fetchProductDetails();
                echo "<h3 style='margin-top: 5%; font-family: \"Quicksand\", sans-serif;'>Product IDs Details</h3><br>";
                echo "<table style='width: 1100px;'>";
                echo "<tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>For Gender</th>
                </tr>";
                foreach ($productDetails as $detail) {
                    echo "<tr>";
                    foreach ($detail as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>
        </div>
    </div>  
    <?php include("footer.php"); ?>
</body>
</html>
