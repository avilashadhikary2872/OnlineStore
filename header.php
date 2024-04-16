
<link href="https://fonts.googleapis.com/css2?family=Andika&family=Quicksand&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<link href="header.css" rel="stylesheet">

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!--To add menu option when screen width is reduced-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="<?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'Super-Admin' || $_SESSION['role'] == 'Sub-Admin')) { ?>admin.php<?php } else { ?>index.php<?php } ?>" style="color: black;"><img src="icon_black.png">RunnerFIT</a>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <!--If user is logged in, then header will contain these-->
                <?php
                if (isset($_SESSION['email'])) {
                    $query = "SELECT role FROM users WHERE email='" . $_SESSION['email'] . "'";
                    $result = mysqli_query($con, $query)or die($mysqli_error($con));    
                    if($result){$row = mysqli_fetch_assoc($result);}
                    $role = $row['role'];
                    
                    if($role == 'Super-Admin' || $role == 'Sub-Admin') {
                        ?>
                        <li><a id="a" href="logout_script.php"><span class="fa fa-sign-out" aria-hidden="true"></span> Logout</a></li>
                        <li><a id="a" href="managefeedbacks.php"><span class="fa fa-commenting" aria-hidden="true"></span> Feedbacks</a></li>
                    <?php
                    } else {
                        ?>
                        <li><a id="a" href="myprofile.php"><span class="fa fa-user" aria-hidden="true"></span> My Account </a></li>
                        <li><a id="a" href="cart.php"><span class="fa fa-cart-plus" aria-hidden="true"></span> Cart </a></li>
                        <li><a id="a" href="orderhistory.php"><span class="fa fa-history" aria-hidden="true"></span> Order History</a></li>
                        <li><a id="a" href="logout_script.php"><span class="fa fa-sign-out" aria-hidden="true"></span> Logout</a></li>
                        <li><a id="a" href="aboutus.php"><span class="fa fa-info" aria-hidden="true"></span> About us</a></li>
                        <li><a id="a" href="contact.php"><span class="fa fa-phone" aria-hidden="true"></span> Contact</a></li>
                    <?php
                }} else {
                    ?>
                        <li><a id="a" href="signup.php"><span class="fa fa-user-plus" aria-hidden="true"></span> Sign Up</a></li>
                        <li><a id="a" href="login.php"><span class="fa fa-sign-in" aria-hidden="true"></span> Login</a></li>
                        <li><a id="a" href="aboutus.php"><span class="fa fa-info" aria-hidden="true"></span> About us</a></li>
                        <li><a id="a" href="contact.php"><span class="fa fa-phone" aria-hidden="true"></span> Contact</a></li>
                    <?php
                    }
                    ?>
            </ul>
        </div>
    </div>
</div>