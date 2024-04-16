<?php
require("common.php");
// Redirects the user to products page if logged in.
if (isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login | RunnerFIT</title>

        <link href="bootstrap.min.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="jquery.js"></script>
        <script src="bootstrap.min.js"></script>
    </head>

    <body>
        <?php include 'header.php'; ?>
        <div id="content" style="margin-top: 2%;">
            <div class="container-fluid decor_bg" id="login-panel" style="display: flex; justify-content: center;">
                <div class="col-lg-4 col-md-6" style="margin-left: -15%; margin-right: -5%;">
                    <img src="login.png" height="330px" width="350px">
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-3 col-md-4">
                        <div class="panel panel-primary" style="width: 350px; font-family: 'Quicksand', sans-serif;">
                            <div class="panel-heading">
                                <h3 style="font-family: 'Quicksand', sans-serif; margin: 1% 0%;">Welcome</h3>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning">Please Login First !!!<p>
                                <form action="login_submit.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control"  placeholder="Email" autofocus="off" name="email" required = "true">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required = "true">
                                    </div>
                                    <br>
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
                                    <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                                </form>
                            </div>
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php">Register</a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>