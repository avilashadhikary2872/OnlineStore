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
        <title>Cart | RunnerFIT</title>
        <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="jquery.js"></script>
        <script src="bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid" id="content">
            <?php include 'header.php'; ?>
            <div class="col-lg-4 col-md-6" style="width: 25%;">
                    <img src="confirmorder.png" style="float: left;">
                </div>
            <div class="row decor_bg">
                <div class="col-md-6" style="width: 70%;">
                    <table class="table table-striped">
    
                        <!--show table only if there are items added in the cart-->
                        <?php
                        $sum = 0;
                        $id='';
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT product_varients.var_id AS var_id, products.pid AS pid, pname, size, color, quan_ordered, pay_price FROM product_varients JOIN cart ON product_varients.var_id = cart.var_id JOIN products ON product_varients.pid = products.pid WHERE cart.uid = '$user_id' AND `status` = 1";
                        $result = mysqli_query($con, $query)or die($mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                            ?>
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th></th> <!-- Added a new column for the "Remove" action -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    $sum += $row['pay_price'];
                                    $id .= $row['var_id'] . ", ";
                                    echo "<tr>
                                            <td>" . $row['pname'] . "</td>
                                            <td>" . $row['size'] . "</td>
                                            <td>" . $row['color'] . "</td>
                                            <td>" . $row['quan_ordered'] . "</td>
                                            <td>Rs " . $row['pay_price'] . "</td>
                                            <td><a href='cart-remove.php?id={$row['var_id']}' class='remove_item_link'>Remove</a></td>
                                        </tr>";
                                    $id = rtrim($id, ", ");
                                    echo "<tr>
                                            <td></td>
                                            <td>Total</td>
                                            <td>Rs " . $sum . "</td>
                                            <td></td> <!-- Added an empty cell for alignment -->
                                            <td></td> <!-- Added an empty cell for alignment -->
                                            <td><a href='success.php?id=" . $id . "&amount=".$sum."&qntor=". $row['quan_ordered'] ."' class='btn btn-primary'>Confirm Order</a></td>
                                        </tr>";
                                }
                                ?>
                            </tbody>
                            <?php
                                } else {

                                    echo "Your Cart is Empty. ";
                                }
                            ?>
                        <a href="index.php" style="color: blue;">Continue Shopping.</a>
                        <?php
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>
