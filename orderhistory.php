<?php
require("common.php");
//if (!isset($_SESSION['email'])) {
  //  header('location: index.php');
//}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Order History | RunnerFIT</title>
        <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="jquery.js"></script>
        <script src="bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid" id="content">
            <?php include 'header.php'; ?>
            <div class="col-lg-4 col-md-6 ">
                <img src="orderhistory.png" height="250px" width="250px" style="float: left; margin-left: 100px; margin-top: 20%;">
            </div>
            <div class="row decor_bg">
                <div class="col-md-6">
                    <table class="table table-striped">
                        <!--show table only if there are items added in the cart-->
                        <?php
                        $sum = 0;
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT products.pid AS Id, products.pname AS Name, product_varients.size AS Size, products.price AS Price, products.category AS Category, products.pgender AS Gender, product_varients.color AS Color, cart.date_time AS Timedate FROM product_varients JOIN cart ON product_varients.var_id = cart.var_id JOIN products ON product_varients.pid = products.pid WHERE cart.uid='$user_id' AND `status`=2";
                        $result = mysqli_query($con, $query) or die($mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                            ?>
                            <h1 style="margin-bottom: 20px; font-weight: 20;"><center>Order History</center></h1>
                            <thead>
                                <tr>
                                    <th>Item name</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Gender</th>
                                    <th>Color</th>
                                    <th>Order Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<tr>';
                                    echo '<td><a href="order.php">' . $row["Name"] . '</a></td>';
                                    echo '<td>' . $row["Size"] . '</td>';
                                    echo '<td>Rs. ' . $row["Price"] . '</td>';
                                    echo '<td>' . $row["Category"] . '</td>';
                                    echo '<td>' . $row["Gender"] . '</td>';
                                    echo '<td>' . $row["Color"] . '</td>';
                                    echo '<td>' . $row["Timedate"] . '</td>';
                                    echo '</tr>';
                                    $total += $row["Price"];
                                }
                                echo '<tr><td colspan="6">Total</td><td>Rs. ' . $total . '</td></tr>';
                                ?>
                            </tbody>
                            <?php
                        } else {
                            echo "Sorry! No orders placed yet";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>
