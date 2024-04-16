<?php
    require("common.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <style type="text/css">
            h5{
                color: blue;
            }
            .p1{
                text-align: justify;
            }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>About us | RunnerFIT</title>

        <link href="bootstrap.min.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="jquery.js"></script>
        <script src="bootstrap.min.js"></script>
    </head>
<body>
<?php
include 'header.php';
?>
<div class="container" id="content" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <div class="ceo_photos" style="display: flex; justify-content:center; gap:50px;">
        <img src="abhilash.jpg" style="center; border: 1px solid black; border-radius:60px;" height="200px" width="200px" alt="CEO Abhilash Adhikari">
        <img src="anjan.jpg" style="center; border: 1px solid black; border-radius:60px;" height="200px" width="200px" alt="CEO Anjan Poudel">
        <img src="kripesh.jpg" style="center; border: 1px solid black; border-radius:60px;" height="200px" width="200px" alt="CEO Kripesh Aryal">
    </div>
    <div class="row" style="display: flex; justify-content:center; aligh-items: center;">
        <div class="col-lg-5" text-align="justify" style="width:880px;">
            <h4 style="font-family: 'Quicksand', sans-serif;"></br></br>What Defines Us?</h4></br>
            <p id="p1" style="font-family: 'Quicksand', sans-serif;">RunnerFIT is the first and prominent supplier of sportswear which sells products made in Nepal, with a steadfast commitment to success and a record of achievement that continues a tradition of delivering excellence.</br></br>
            The company was co-founded in 2022 by A Adhikari, A Poudel, and K Aryal to ease the process of ordering top-notch sportswear items.<br><br>
            RunnerFIT is guided by four principles: customer obsession rather than competitor focus, passion for invention, commitment to operational excellence, and long-term thinking.<br><br>
            <h4 style="font-family: 'Quicksand', sans-serif;">Our Vision</h4><p style="font-family: 'Quicksand', sans-serif;">To encourage employments.</p><p style="font-family: 'Quicksand', sans-serif;">To utilize local raw products to manufacture high-quality gears for our Nepalese athletes.</p></br>
            <h4 style="font-family: 'Quicksand', sans-serif;">Our Mission</h4><p style="font-family: 'Quicksand', sans-serif;">We strive to offer our customers the lowest possible prices, the best available selection, and the utmost convenience.</p>
            </p>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>