<?php
require("common.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact | RunnerFIT</title>
    <style type="text/css">
        .p1{
            text-align: justify;
        }
    </style>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>
</head>
<body>
<?php
include 'header.php';
?>
<div class="container" id="content">
    <div class="row">
    <div class="col-lg">
        <img src="contact.png" style="float: right;" height="250px" width="210px">
        <h1 style="font-family: 'Quicksand', sans-serif;">Get in Touch</h1>
        <p id="p1" style="width:900px; text-align: justify; font-family: 'Quicksand', sans-serif;">
            Hi there, we are here to help you.<br>
            Please feel free to contact us in case you have any queries regarding the products, payment or order delivery.<br>
            With respect to payment, we will be accepting prepaid orders only, in order to avoid cash payment and hence maintain social distancing.<br>
            With respect to delay in order delivery, please note that we are trying our best to deliver your order on time, but your order may be delayed due to the current situation (or unforseen circumstances). However, we ensure that your order will be delivered soon.<br>
            In case you have any other queries, please fill the form below, and our team will get in touch with you within 24 hours.<br>
            You can also contact the number given below to get in touch with our customer care executive immediately.</p>
    </div><br><br>
    <div class="col-lg">
        <div style="float: right; font-family: 'Quicksand', sans-serif;">
            <h1 style="font-family: 'Quicksand', sans-serif;">Information</h1><br>
            <p id="p1">RunnerFIT Pvt. Ltd., Lions Chowk, Narayangarh, Chitwan</p><br>
            <p id="p1">Phone: 9845848114, 9840515882, 9869892565</p><br>
            <p id="p1">Email: avilashadhikary2872@gmail.com, karyal2057@gmail.com, poudelanjan022@gmail.com</p></br>
            <p id="p1">Fax: 056-405073</p>
        </div>
        <h1 style="font-family: 'Quicksand', sans-serif;">Contact Us</h1>
        <div style="float: left;">
        <form  action="feedback_script.php" method="POST" style="font-family: 'Quicksand', sans-serif;">
            <!--<div class="form-group">
                <input type="text" name="name" placeholder="Name" autofocus="off" class="form-control" required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required = "true">
            </div>-->
            <div class="form-group">
                <textarea rows="5" name="feedback" cols="60" placeholder="Enter your valuable feedback here..." style="padding-left: 12px;"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>