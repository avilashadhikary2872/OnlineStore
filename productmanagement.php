<?php
require_once("common.php");
if (!isset($_SESSION['email'])) {
    header('location: admin.php');
}
?>
<?php
    require("common.php");

    $query = "SELECT products.pid,var_id,pname,price,category,pgender,time,size,color,quantity_left,quantity_sold,filepath FROM products LEFT JOIN product_varients ON products.pid = product_varients.pid ORDER BY products.pid";
    $result = mysqli_query($con, $query)or die($mysqli_error($con));
    // Initialize an array to store details
    $detailsArray = array();
    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch rows and store them in the array
        while ($row = $result->fetch_assoc()) {
            // Add each row as an array to $detailsArray
            $detailsArray[] = $row;
        }
    } else {
        echo ("No records found.");
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
            .product_entry input, .product_entry select {
                margin-right: 2.5%;
            }
        </style>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div class="col-lg-4 col-md-6" id="settings-container">
            <div class="product_entry" style="width: 1100px; margin: 15% 0% 0% 6.2%;">
                <h3 style="margin-top: -3%; font-family: 'Quicksand', sans-serif;"><u>Register New Product</u></h3><br>
                <form action="registerproductdatabase.php" method="POST" enctype="multipart/form-data">
                
                <label for="name">Product Name: </label>
                <input type="text" name="pname" id="pname" value="RunnerFIT ">

                <label for="price">Price: </label>
                <input type="number" name="price" id="price" placeholder="Rs." min="0">

                <label for="category">Category: </label>
                <select name="category">
                    <option value=""></option>
                    <option value="Tshirt">Tshirt</option>
                    <option value="Tank">Tank</option>
                    <option value="Jacket">Jacket</option>
                    <option value="Jogger">Jogger</option>
                </select>

                <label for="pgender">Gender: </label>
                <select name="pgender">
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br><br>
                <button type="submit" name="submit" class="btn btn-primary">Register Product</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                </form>
                <br>
                <h3 style="margin-top: 1%; font-family: 'Quicksand', sans-serif;"><u>Enter New Product Details</u></h3><br>
                <form action="addproductdatabase.php" method="POST" enctype="multipart/form-data">

                <label for="pid">Product ID: </label>
                <input type="number" name="pid" id="pid" min="1001" style="width: 110px;">

                <label for="size">Size: </label>
                <select name="size">
                    <option value=""></option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>

                <label for="color">Color: </label>
                <select name="color">
                    <option value=""></option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Red">Red</option>
                    <option value="Grey">Grey</option>
                    <option value="Green">Green</option>
                </select>
                <label for="filepath">Filepath:</label>
                <!--<input type="file" name="filepath" id="filepath"><br>-->
                <input type="text" name="filepath" id="filepath">

                <label for="quantityleft">Quantity: </label>
                <input type="number" name="quantityleft" id="quantityleft" min="1" style="width: 70px;"><br><br>

                <button type="submit" name="submit" class="btn btn-primary">Add Product Details</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                </form>
                <br>
                <h3 style="margin-top: 1%; font-family: 'Quicksand', sans-serif;"><u>Enter Product Details to Update</u></h3><br>
                <form action="updateproductdatabase.php" method="POST" enctype="multipart/form-data">

                <label for="pid">Product ID: </label>
                <input type="number" name="pid" id="pid" min="1001" style="width: 110px;">

                <label for="pname">Product Name:</label>
                <input type="text" name="pname" id="pname">

                <label for="price">Price:</label>
                <input type="number" name="price" id="price" placeholder="Rs." min="0">

                <label for="category">Category: </label>
                <select name="category">
                    <option value=""></option>
                    <option value="T-shirt">T-shirt</option>
                    <option value="Tank">Tank</option>
                    <option value="Jacket">Jacket</option>
                    <option value="Jogger">Jogger</option>
                    <option value="Shoe">Shoe</option>
                </select>
                <br><br>

                <label for="pgender">Gender: </label>
                <select name="pgender">
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br><br>
                <button type="submit" name="submit" class="btn btn-primary">Update Details</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                </form>
                <br>
                <h3 style="margin-top: 1%; font-family: 'Quicksand', sans-serif;"><u>Enter Product Variation Details to Update</u></h3><br>
                <form action="updateproductvariationdatabase.php" method="POST" enctype="multipart/form-data">

                <label for="var_id">Variation ID: </label>
                <input type="number" name="var_id" id="var_id" min="2001" style="width: 110px;">

                <label for="filepath">Filepath: </label>
                <!--<input type="file" name="filepath" id="filepath"><br>-->
                <input type="text" name="filepath" id="filepath">

                <label for="size">Size: </label>
                <select name="size">
                    <option value=""></option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>

                <label for="color">Color: </label>
                <select name="color">
                    <option value=""></option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Red">Red</option>
                    <option value="Grey">Grey</option>
                    <option value="Green">Green</option>
                </select>

                <label for="quantityleft">Quantity Left: </label>
                <input type="number" name="quantityleft" id="quantityleft" min="0" style="width: 100px;"><br><br>

                <button type="submit" name="submit" class="btn btn-primary">Update Details</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                </form>
                <br>
                <h3 style="margin-top: 1%; font-family: 'Quicksand', sans-serif;"><u>Delete Product Variation</u></h3><br>
                <form action="deleteproductvariationdatabase.php" method="POST" enctype="multipart/form-data">

                <label for="var_id">Variation ID: </label>
                <!--<input type="file" name="filepath" id="filepath"><br>-->
                <input type="number" name="var_id" id="var_id" min="2001" style="width: 100px;"><br><br>

                <button type="submit" name="submit" class="btn btn-primary">Delete Product Variation</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                </form>
                <br>
                <h3 style="margin-top: 1%; font-family: 'Quicksand', sans-serif;"><u>Delete Product Details</u></h3><br>
                <form action="deleteproductdatabase.php" method="POST" enctype="multipart/form-data">

                <label for="pid">Product ID: </label>
                <!--<input type="file" name="filepath" id="filepath"><br>-->
                <input type="number" name="pid" id="pid" min="1001" style="width: 100px;"><br><br>

                <button type="submit" name="submit" class="btn btn-primary">Delete Product</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                </form>
                <br><br>
            </div>
            <h3 style="margin-top: 5%; font-family: 'Quicksand', sans-serif;"><u>Available Product's Details</u></h3><br>
            <table style="width: 1100px;">
                <tr>
                    <th>Product ID</th>
                    <th>Variation ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>For Gender</th>
                    <th>Launched On</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Quantity Left</th>
                    <th>Quantity Sold</th>
                    <th>Filepath</th>
                </tr>
                <?php foreach ($detailsArray as $details): ?>
                    <tr>
                        <?php foreach ($details as $detail): ?>
                            <td><?php echo $detail; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
            <br><br>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>
