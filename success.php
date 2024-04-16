<?php

require("common.php");
//if (!isset($_SESSION['email'])) {
  //  header('location: index.php');
//}
$user_id = $_SESSION['user_id'];
$item_ids_string = $_GET['id'];
$amount = $_GET['amount'];

//We will change the status of the items purchased by the user to 'Confirmed'
$query = "UPDATE cart SET status=2 WHERE uid=" . $user_id . " AND var_id IN (" . $item_ids_string . ") and status= 1 ";
mysqli_query($con, $query) or die($mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Success | RunnerFIT</title>
        <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    </head>
    <body style="font-family: 'Quicksand', sans-serif;">
        <?php include 'header.php'; ?>

        <div class="container-fluid" id="content">
            <div class="col-md-12">
                <div class="col-lg-4 col-md-6 ">
                    <img src="confirmorder.jpg" height="200px" width="200px" style="float: left; margin-left: 150px; margin-top: 20%;">
                </div>
                <div class="jumbotron" style="margin-right: 100px; background-color: white; margin-top: 5%;">
                      <h3 align="center" style="font-family: 'Quicksand', sans-serif;">Your order is confirmed.</h3><hr>
                    <p align="center">Proceed to payment:<button id="payment-button" class="btn btn-block btn-primary" style="width: 130px;">Pay with Khalti</button></p>
                </div>
            </div>
        </div>
        
    <!-- Place this where you need payment button -->
    <!-- Paste this code anywhere in you body tag -->
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_dc74e0fd57cb46cd93832aee0a390234",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 100 * (<?php echo $amount; ?>)});
        }
    </script>
    <?php include("footer.php"); ?>
    </body>
</html>