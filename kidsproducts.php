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
        <title>Kids Products | RunnerFIT</title>
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
                <p style="font-size: 18px;">Choose from our exquisite collection for kids.</p>
            </div>
            <hr style="border: 1px solid lightblue; margin-bottom: 35px;">

            <div class="row text-center" id="mens">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="1.jpg" alt="" height="250px" width="180px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT KT5X92</h4>
                            <p>Price: Rs. 2,000.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(25)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-kid.php?id=25" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="2.jpg" alt="" height="250px" width="180px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT KT3Y26</h4>
                            <p>Price: Rs. 2,200.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(26)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-kid.php?id=26" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
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
                        <img src="3.jpg" alt="" height="250px" width="180px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT KT4R78</h4>
                            <p>Price: Rs. 2,700.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(27)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-kid.php?id=27" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
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
                        <img src="4.jpg" alt="" height="250px" width="180px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT KT9P71</h4>
                            <p>Price: Rs. 2,500.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(28)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-kid.php?id=28" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
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
                        <img src="5.jpg" alt="" height="250px" width="140px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT KJ78FG</h4>
                            <p>Price: Rs. 2,850.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(29)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-kid.php?id=29" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
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
                        <img src="6.jpg" alt="" height="250px" width="140px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT KJ7SF8</h4>
                            <p>Price: Rs. 2,700.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(30)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-kid.php?id=30" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
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
                        <img src="7.jpg" alt="" height="250px" width="140px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT KJSD79</h4>
                            <p>Price: Rs. 2,500.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(31)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-kid.php?id=31" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
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
                        <img src="8.jpg" alt="" height="250px" width="140px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT KJ89SD</h4>
                            <p>Price: Rs. 2,150.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(32)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-kid.php?id=32" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
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
                        <img src="9.jpg" alt="" height="250px" width="150px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT KS3D09</h4>
                            <p>Price: Rs. 4,800.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(33)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-kid.php?id=33" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
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
                        <img src="10.jpg" alt="" height="250px" width="140px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT KS67XC</h4>
                            <p>Price: Rs. 4,200.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(34)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-kid.php?id=34" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
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
                        <img src="11.jpg" alt="" height="250px" width="140px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT KS1P6L</h4>
                            <p>Price: Rs. 3,500.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(35)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-kid.php?id=35" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
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
                        <img src="12.jpg" alt="" height="250px" width="140px">
                        <div class="caption">
                            <h4 style="font-family: 'Quicksand', sans-serif;">RunnerFIT KS7UY5</h4>
                            <p>Price Rs. 3,800.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(36)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                    <a href="cart-add-kid.php?id=36" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
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