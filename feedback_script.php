<?php

    require("common.php");

    if($_SESSION['email']) {
        $email = $_SESSION['email'];
        $email = mysqli_real_escape_string($con, $email);
    } else {
        $email = "";
        $email = mysqli_real_escape_string($con, $email);
    }

    $query = "SELECT * FROM users WHERE email='" . $email . "'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    $uid = $row['uid'];
    $uname = $row['uname'];
    $email = $row['email'];
    $uid = mysqli_real_escape_string($con, $uid);
    $uname = mysqli_real_escape_string($con, $uname);
    $email = mysqli_real_escape_string($con, $email);

    $feedback = $_POST['feedback'];
    $feedback = mysqli_real_escape_string($con, $feedback);

    $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    $regex_num = "/^[789][0-9]{9}$/";

    $query = "INSERT INTO feedback(uid, feed) VALUES('" . $uid . "','" . $feedback . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    header('location: contact.php');

?>