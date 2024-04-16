<?php
require_once("common.php");

// Initialize detailsArray
$detailsArray = array();

// Check if form is submitted
if(isset($_POST['submit'])) {
    $pid = $_POST['pid'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $ugender = $_POST['ugender'];
    $pgender = $_POST['pgender'];

    // Construct query based on form input
    $query = "SELECT cart.uid, uname, products.pid, pname, size, color, category, pgender, price, quan_ordered, pay_price, date_time FROM product_varients JOIN cart ON product_varients.var_id = cart.var_id JOIN products ON product_varients.pid = products.pid JOIN users ON cart.uid = users.uid WHERE 1";
    if(!empty($pid)) {
        $query .= " AND products.pid = '$pid'";
    }
    if(!empty($size)) {
        $query .= " AND size = '$size'";
    }
    if(!empty($color)) {
        $query .= " AND color = '$color'";
    }
    if(!empty($ugender)) {
        $query .= " AND users.ugender = '$ugender'";
    }
    if(!empty($pgender)) {
        $query .= " AND products.pgender = '$pgender'";
    }

    // Execute the query
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    // Fetch rows and store them in the array
    while ($row = $result->fetch_assoc()) {
        $detailsArray[] = $row;
    }
}

// Function to fetch user IDs details
function fetchUserDetails() {
    global $con;
    // Query to fetch only specific columns from users table
    $query = "SELECT uid, uname, email, ugender, contact, ship_address FROM users";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $detailsArray = array();
    // Fetch rows and store them in the array
    while ($row = $result->fetch_assoc()) {
        $detailsArray[] = $row;
    }
    return $detailsArray;
}

// Function to fetch product IDs details
function fetchProductDetails() {
    global $con;
    // Query to fetch only specific columns from products table
    $query = "SELECT pid, pname, price, category, pgender FROM products";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
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
    <title>Sales Report | RunnerFIT</title>
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
            <p style="color: grey;">Click 'User IDs' button to view all user IDs. Click 'Product IDs' button to view all product IDs.</p><br>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="pid">Product ID: </label>
                <input type="number" name="pid" id="pid" min="1001" style="width: 100px;"><br><br>
                <label for="uid">User ID: </label>
                <input type="number" name="uid" id="uid" min="102" style="width: 100px;"><br><br>
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
                <label for="ugender">User's Gender: </label>
                <select name="ugender">
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br><br>
                <label for="pgender">Products for Gender: </label>
                <select name="pgender">
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br><br>
                <button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
            </form>
            <form action="" method="POST" style="margin-top: -20.5%; margin-left: 40%;">
                <button type="submit" name="user_ids" class="btn btn-primary">User IDs</button>
            </form>
            <form action="" method="POST" style="margin-top: -15.7%; margin-left: 69%;">
                <button type="submit" name="product_ids" class="btn btn-primary">Product IDs</button>
            </form>
            <h3 style="margin-top: 5%; font-family: 'Quicksand', sans-serif;">Sales Report</h3><br>
            <table style="width: 1100px;">
                <tr>
                    <th>User's ID</th>
                    <th>User's Name</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Category</th>
                    <th>For Gender</th>
                    <th>Unit Price</th>
                    <th>Quantity Ordered</th>
                    <th>Total Price</th>
                    <th>Ordered Time</th>
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
            } else if(isset($_POST['user_ids'])) {
                $userDetails = fetchUserDetails();
                echo "<h3 style='margin-top: 5%; font-family: \"Quicksand\", sans-serif;'>User IDs Details</h3><br>";
                echo "<table style='width: 1100px;'>";
                echo "<tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Address</th>
                </tr>";
                foreach ($userDetails as $detail) {
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
