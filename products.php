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
        <link href="https://fonts.googleapis.com/css2?family=Andika&family=Quicksand&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <title>Home | RunnerFIT</title>
        <!-- Bootstrap Core CSS -->
        <link href="bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="style.css" rel="stylesheet">
        <link href="index.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="bootstrap.min.js"></script>
    </head>
    <body style="padding-top: 50px; font-family: 'Quicksand', sans-serif;">
        <!-- Header -->
        <?php
        include 'header.php';
        include 'check-if-added.php';
        ?>
        <!--Header end-->

        <div id="content">
            <!--Main banner image-->
            <div id = "banner_image">
                <div class="container" style="margin-top: 2%; margin-bottom: -2%; color: black; height: 75px; width: 80%; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 50px; background-image: url(banner3.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;">
                    <h1 style="margin-top: 12px; font-size:20px; font-family: 'Quicksand', sans-serif; user-select: none;">Unleash Your Inner Athlete with RunnerFIT Sportswear</h1>
                    <p style="font-size:12px; user-select: none;">We have the best sportswear products that make athletes feel comfortable.</p>
                </div>
            </div>
            <!--Main banner image end-->

            <!--Item categories listing-->
            <div class="container" style="display: flex; justify-content: center;">
                <div class="row text-center" id="item_list" style="width: 50%; height: 150px; font-family: 'Quicksand', sans-serif; display: flex; justify-content: space-between;">
                    <div class="col-sm-4" style="margin-top: -8%; height: 140%;">
                        <div class="thumbnail">
                            <a href="mensproducts.php">
                                <img src="men.jpg" alt="" style="border-radius: 150px; height: 90px; width: 90px;">
                                <h5 style="font-family: 'Quicksand', sans-serif;">Mens</h5>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4" style="margin-top: -8%; height: 140%;">
                        <div class="thumbnail">
                            <a href="womensproducts.php">
                                <img src="women.jpg" alt="" style="border-radius: 150px; height: 90px; width: 90px;">
                                <h5 style="font-family: 'Quicksand', sans-serif;">Womens</h5>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4" style="margin-top: -8%; height: 140%;">
                        <div class="thumbnail">
                            <a href="kidsproducts.php">
                                <img src="kid.jpg" alt="" style="border-radius: 150px; height: 90px; width: 90px;">
                                <h5 style="font-family: 'Quicksand', sans-serif;">Kids</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="latest">
                <center><p style="font-size: 18px; font-family: 'Quicksand', sans-serif; user-select: none; margin-bottom: -10px;">Latest Addition</p></center>
                <hr style="width: 90%; border: 1px solid lightgrey; margin-bottom: 3%;">
            </div>
            <!--Item categories listing end-->

            <div class="row text-center" id="latest" style="width: 100%;">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="1.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT5X92</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="2.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT3Y26</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="3.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT4R78</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="4.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT9P71</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center" id="latest" style="width: 100%;">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="1.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT5X92</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="2.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT3Y26</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="3.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT4R78</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="4.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT9P71</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center" id="latest" style="width: 100%;">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="1.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT5X92</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="2.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT3Y26</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="3.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT4R78</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="4.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT9P71</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center" id="latest" style="width: 100%;">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="1.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT5X92</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="2.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT3Y26</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="3.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT4R78</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="4.jpg" alt="" height="225px" width="180px">
                        <div class="caption">
                            <p><a href="productdetails.php" role="button" class="btn btn-primary btn-block" style="color: black; font-size: 16px; font-weight: bold; background-color: white; border: none;">RunnerFIT MT9P71</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Footer-->
        <?php
        include 'footer.php';
        ?>
        <!--Footer end-->
   
    </body> 

</html>