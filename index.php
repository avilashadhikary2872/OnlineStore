<?php
    require("common.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Andika&family=Quicksand&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <title>Home | RunnerFIT</title>
        <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <link href="index.css" rel="stylesheet">
        <script src="jquery.js"></script>
        <script src="bootstrap.min.js"></script>
    </head>
    <body style="padding-top: 50px; font-family: 'Quicksand', sans-serif;">
        <?php
            include 'header.php';
            include 'check-if-added.php';
        ?>
        <?php /*
            // Function to perform linear search
            function linearSearch($con, $keywords) {
                $sql = "SELECT * FROM products WHERE pname LIKE '%$keywords%' OR pgender LIKE '%$keywords%' OR category LIKE '%$keywords%'";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        $pspid = $row['pid'];
                        $psname = $row['pname'];
                        $psprice = $row['price'];
                        //echo "ID: " . $row["pid"]. " - Name: " . $row["pname"]. " <br>";
                        //echo "ID: " . $psid . " - Name: " . $psname . " <br>";
                        echo "<a href='search.php?pid=$pspid&pname=$psname&price=$psprice'>ID: $pspid - Name: $psname</a><br>";
                    }
                } else {
                    echo "No result found.";
                }
            }

            // Check if form is submitted
            //if(isset($_POST['search'])) {
              //  $keywords = $_POST['keywords'];
                //linearSearch($con, $keywords);
            //}*/
        ?>

        <div id="content">
            <!--Main banner image-->
            <div id = "banner_image">
                <div class="container" style="margin-top: 1.6%; margin-bottom: -2%; color: black; height: 70px; width: 1140px; border: 1px solid lightblue; border-radius: 50px; background-image: url(banner5.jpg); background-position: cover; background-size: cover; background-repeat: no-repeat;">
                    <h3 style="margin-top: 5px; font-weight: normal; font-size: 22px; font-family: 'Quicksand', sans-serif; user-select: none;">Unleash Your Inner Athlete with RunnerFIT Sportswear</h3>
                    <p style="font-size: 15px; font-weight: normal; user-select: none;">We have the best sportswear products that make athletes feel comfortable.</p>
                </div>
            </div>
            <hr style="border: 1px solid lightblue; margin-top: -7px; margin-bottom: 2%; width: 1140px;">
            <!--Main banner image end-->

            <!--Item categories listing-->
            <div class="container" style="display: flex; justify-content: center;">
                <div class="col-sm-4" style="display: flex; justify-content: center; height: 140%; margin-left: 27%;">
                    <div class="thumbnail">
                        <a href="mensproducts.php">
                            <img src="men.jpg" alt="" style="border-radius: 150px; height: 90px; width: 90px;">
                            <center><h5 style="font-family: 'Quicksand', sans-serif;">Mens</h5></center>
                        </a>
                    </div>
                    <div class="thumbnail">
                        <a href="womensproducts.php">
                            <img src="women.jpg" alt="" style="border-radius: 150px; height: 90px; width: 90px;">
                            <center><h5 style="font-family: 'Quicksand', sans-serif;">Womens</h5></center>
                        </a>
                    </div>
                </div>
                <!--<div class="col-sm-4" style="display: flex; justify-content: space-between; margin-top: 5%;">-->
                <form method="GET" action="search.php">
                <div class="col-sm-4" style="display: flex; justify-content: space-between; margin-top: 15%; margin-left: 50%;">
                    <input type="text" name="keywords" placeholder="Search here..." style="height: 30px; width: 225px; margin-left: 25%; border: 1px solid black; border-radius: 10px; padding-left: 10px;">
                    <button type="submit" value="" style="font-size: 20px; margin-left: 5%; background: none; border: none;"><span class="fa fa-search" aria-hidden="true"></span></button>
                </div>
<!--                    <a id="a" href="search.php"><span class="fa fa-search" aria-hidden="true" ></span></a>
-->             </form>  
            </div>
            
            <div class="latest">
                <center><p style="font-size: 18px; font-family: 'Quicksand', sans-serif; user-select: none; margin-bottom: -10px;">LATEST ADDITION</p></center>
                <hr style="width: 90%; border: 1px solid lightblue; margin-bottom: 3%;">
            </div>

            <?php
            $query = "SELECT filepath, pname, price, products.pid FROM products JOIN product_varients ON products.pid = product_varients.pid GROUP BY products.pid ORDER BY time DESC LIMIT 10";

            $result = mysqli_query($con, $query) or die($mysqli_error($con));

            // Fetch all products and store them in an array
            $products = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
            ?>
            <div class="row text-center" id="mens" style="width: 98%; margin-left: 1%;">
                <?php foreach ($products as $product) {?>
                    <a href="productdetails.php?pid=<?php echo $product['pid']; ?>&filepath=<?php echo $product['filepath']; ?>">
                        <div class="col-md-3 col-sm-6 home-feature" style="width: 21%; margin-left: 3.15%; margin-right: 0%; margin-bottom: 4%; border: 1px solid rgba(0,0,0,0.2); border-radius: 25px;">
                        <div class="for_image" style="margin-top: 3%;">
                                <img height="245px" width="200px" src="<?php
                                    $query = "SELECT filepath FROM products JOIN product_varients ON products.pid = product_varients.pid WHERE products.pid='" . $product['pid'] . "' AND color='black'";
                                    $result = mysqli_query($con, $query) or die($mysqli_error($con));
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['filepath'];
                                ?>">
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
        <?php include 'footer.php'; ?>   
    </body> 

</html>