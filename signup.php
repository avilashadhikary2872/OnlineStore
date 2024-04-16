<?php
require("common.php");
//if (isset($_SESSION['email'])) {
  //  header('location: index.php');
//}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Signup | RunnerFIT</title>
        <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="jquery.js"></script>
        <script src="bootstrap.min.js"></script>
    </head>
    <body style="font-family: 'Quicksand', sans-serif;">
        <?php include 'header.php'; ?>
        <div class="container-fluid decor_bg" id="content" style="margin-top: -1%;">
            <div class="col-lg-4 col-md-6" style="margin-left: 10%; margin-top: 2%;">
                <img src="signup.png" height="450px" width="450px">
            </div>
            <div class="row">
                <div class="container" style="width: 900px; margin-top: 1%; margin-left: 0%; padding-left: 45%;">
                    <div class="col-lg-4 col-lg-offset-3 col-md-6" style="width: 410px;">
                        <div class="panel panel-primary" style="width: 380px; font-family: 'Quicksand', sans-serif;">
                            <div class="panel-heading" style="height: 50px; ">
                                <h3 style="margin-top: 1%; font-size: 22px; font-family: 'Quicksand', sans-serif;">Create a new account</h3>
                            </div>
                        </div>
                        <form  action="signup_script.php" method="POST">
                            <div class="form-group">
                                <input class="form-control" placeholder="Full Name" autofocus="off" name="uname"  required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="Enter a Valid Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="email" required = "true"><?php if(isset($_GET['m1'])) echo $_GET['m1']; ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Choose a Strong Password" title="Password must be 8 characters including 1 uppercase letter, 1 lowercase letter and numeric characters"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password" required = "true">
                            </div>
                            <div class="form-group">
                                Gender:
                                <select name="ugender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Rather Not Say">Rather Not Say</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Contact Number" maxlength="10" size="10" name="contact" required = "true"><?php if(isset($_GET['m2'])) echo $_GET['m2']; ?>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="Enter Your Shipping Address" name="ship_address" required = "true">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Create Account</button>
                            <section class="copy_legal">
                                <br><p><span class="small">By continuing, you accept our <a href="privacypolicy.php"><u>Privacy Policy</u></a> &amp; <a href="termsNconditions.php"><u>Terms and Conditions</u></a></span></p><br>
					        </section>
                            <div class="login_container">
						        <p>Already have an account? <a href="login.php"><u>Sign In</u></a></p>
					        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>