<?php
//establish the connection to database, and start the session
require("common.php");
?>

<!--Specifies document type is html-->
<!DOCTYPE html>
<!--Specifies the language as English-->
<html lang="en">
    <head>
        <!--instructs browser on how to control the page's dimensions and scaling-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Title of products page-->
        <title>Premium Products | RunnerFIT</title>
        <!-- Bootstrap Core CSS -->
        <link href="bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="bootstrap.min.js"></script>
    </head>

    <body style="font-family: 'Quicksand', sans-serif;">
        <?php
        include 'header.php';
        include 'check-if-added.php';
        ?>
        <div class="container" id="content">
            <!-- Jumbotron Header -->
            <div class="jumbotron home-spacer" id="products-jumbotron" style="height: 100px; width: 1140px; margin-top: -25px; margin-bottom: -2px; border-radius: 50px; border: 1px solid lightblue; background-image: url(banner2.jpg); background-size: cover;">
                <h2 style="font-family: 'Quicksand', sans-serif; font-size: 30px; margin-top: -30px;">Welcome!</h2>
                <p style="font-size: 18px;">We have the best sportswear products that make athletes feel comfortable.</p>
            </div>
            <hr style="border: 1px solid lightblue; margin-bottom: 35px;">

            <div class="row text-center" id="mens" style="font-family: 'Quicksand', sans-serif;">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="37.jpg" alt="" height="250px" width="180px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT PMTX92</h4>
                            <p>Price: Rs. 28,000.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(37)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-premium.php?id=37" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="38.jpg" alt="" height="250px" width="115px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT PMJL5D</h4>
                            <p>Price: Rs. 32,000.00 </p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(38)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-premium.php?id=38" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="39.jpg" alt="" height="250px" width="176px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT PMC7B2</h4>
                            <p>Price: Rs. 45,000.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(39)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-premium.php?id=39" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="40.jpg" alt="" height="250px" width="168px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT PMS2DW</h4>
                            <p>Price: Rs. 50,500.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(40)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-premium.php?id=40" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center" id="watches">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="41.jpg" alt="" height="250px" width="180px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT PWTL5D</h4>
                            <p>Price: Rs. 26,500.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(41)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-premium.php?id=41" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="42.jpg" alt="" height="250px" width="121px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT PWJL5D</h4>
                            <p>Price: Rs. 28,500.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(42)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-premium.php?id=42" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="43.jpg" alt="" height="250px" width="176px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT PWCL5D</h4>
                            <p>Price: Rs. 42,000.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(43)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-premium.php?id=43" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="44.jpg" alt="" height="250px" width="161px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT PWSL5D</h4>
                            <p>Price: Rs. 48,000.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(44)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-premium.php?id=44" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center" id="shirts">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="45.jpg" alt="" height="250px" width="140px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT PKTL5D</h4>
                            <p>Price: Rs. 16,500.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(45)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-premium.php?id=45" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="46.jpg" alt="" height="250px" width="90px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT PKJL5D</h4>
                            <p>Price: Rs. 18,000.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(46)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-premium.php?id=46" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="47.jpg" alt="" height="250px" width="138px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT PKCL5D</h4>
                            <p>Price: Rs. 22,500.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(47)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-premium.php?id=47" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="48.jpg" alt="" height="250px" width="132px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT PKSL5D</h4>
                            <p>Price: Rs. 28,000.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(48)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-premium.php?id=48" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
        </div>

        <?php include("footer.php"); ?>
    </body>

</html>