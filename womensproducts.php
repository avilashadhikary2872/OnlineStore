<?php
require("common.php");
?>
<?php
    require("common.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mens | RunnerFIT</title>
    <link href="https://fonts.googleapis.com/css2?family=Andika&family=Quicksand&display=swap" rel="stylesheet">
    <link href="addproduct.css" rel="stylesheet">
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>

</head>

<body style="font-family: 'Quicksand', sans-serif;">
<?php
include 'header.php';
include 'check-if-added.php';
?>
<div class="container" id="content">
    <!-- Jumbotron Header -->
    <div class="banner" style="display: flex-inline; justify-content: center; height: 70px; width: 1140px; margin-top: -30px; margin-bottom: -2px; border-radius: 50px; border: 1px solid lightblue; background-image: url(banner5.jpg); background-size: cover;">
        <center><h3 style="color: black; user-select: none; font-weight: normal; font-family: 'Quicksand', sans-serif; font-size: 22px; margin-top: 5px;">Welcome!</h3></center>
        <center><p style="color: black; user-select: none; font-weight: normal; font-size: 15px;">Comfy sportswear for women.</p></center>
    </div>
    <hr style="border: 1px solid lightblue; margin-bottom: 35px;">

    <?php
    $query = "SELECT filepath, pname, price, products.pid FROM products JOIN product_varients ON products.pid = product_varients.pid WHERE pgender='Female' GROUP BY products.pid ORDER BY time DESC LIMIT 10";
    $result = mysqli_query($con, $query) or die($mysqli_error($con));

    // Fetch all products and store them in an array
    $products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    ?>
    <div class="row text-center" id="mens" style="width: 103%;">
        <?php foreach ($products as $product) {?>
            <a href="productdetails.php?pid=<?php echo $product['pid']; ?>&filepath=<?php echo $product['filepath']; ?>">
                <div class="col-md-3 col-sm-6 home-feature" style="width: 21%; margin-left: 3.15%; margin-right: 0%; margin-bottom: 4%; border: 1px solid rgba(0,0,0,0.1); border-radius: 25px;">
                    <div class="for_image" style="margin-top: 3%;">
                        <img src="<?php
                                    $query = "SELECT filepath FROM products JOIN product_varients ON products.pid = product_varients.pid WHERE products.pid='" . $product['pid'] . "' AND color='black'";
                                    $result = mysqli_query($con, $query) or die($mysqli_error($con));
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['filepath'];
                                ?>" height="245px" width="200px">
                    </div>
                    <div class="for_details">
                        <h4><?php echo $product['pname'] ?></h4>
                        <p>Rs. <?php echo $product['price'] ?></p>
                    </div>
                </div>
            </a>
        <?php }?>
    </div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
