<?php

// This page updates the user password
require("common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

$new_name = $_POST['uname'];
$new_name = mysqli_real_escape_string($con, $new_name);

$old_pass = $_POST['old-password'];
$old_pass = mysqli_real_escape_string($con, $old_pass);
//$old_pass = MD5($old_pass);

$new_pass = $_POST['password'];
$new_pass = mysqli_real_escape_string($con, $new_pass);
//$new_pass = MD5($new_pass);

$new_pass1 = $_POST['password1'];
$new_pass1 = mysqli_real_escape_string($con, $new_pass1);
//$new_pass1 = MD5($new_pass1);

$new_gender = $_POST['ugender'];
$new_gender = mysqli_real_escape_string($con, $new_gender);

$new_contact = $_POST['contact'];
$new_contact = mysqli_real_escape_string($con, $new_contact);

$new_city = $_POST['city'];
$new_city = mysqli_real_escape_string($con, $new_city);

$new_address = $_POST['address'];
$new_address = mysqli_real_escape_string($con, $new_address);

$query = "SELECT email, uname, password, ugender, contact, city, address FROM users WHERE email ='" . $_SESSION['email'] . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_array($result);
$orig_name = $row['uname'];
$orig_pass = $row['password'];
$orig_gender = $row['ugender'];
$orig_contact = $row['contact'];
$orig_city = $row['city'];
$orig_address = $row['address'];

if ($orig_name != $new_name) {
    $query = "UPDATE users SET uname = '" . $new_name . "' WHERE email = '" . $_SESSION['email'] . "'";
    mysqli_query($con, $query) or die($mysqli_error($con));
    $message = "<span class='red'>Name Updated Successfully</span>";
    header('location: myprofile.php?error= ' . $message);
} else{
    $error = "<span class='red'>Name Already Used</span>";
    header('location: myprofile.php?error= ' . $error);
}

if ($new_pass != $new_pass1) {
	$error = "<span class='red'>Two passwords don't match</span>";
    header('location: settings.php?error= ' . $error);
} else {
    if ($old_pass == $orig_pass) {
        $query = "UPDATE  users SET password = '" . $new_pass . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        $error = "<span class='red'>Password Changed Successfully</span>";
        header('location: settings.php?error= ' . $error);
    } else{
    	$error = "<span class='red'>Wrong Old Password</span>";
        header('location: settings.php?error= ' . $error);
    }
}

if ($orig_gender != $new_gender) {
    $query = "UPDATE users SET ugender = '" . $new_gender . "' WHERE email = '" . $_SESSION['email'] . "'";
    mysqli_query($con, $query) or die($mysqli_error($con));
    $message = "<span class='red'>Gender Updated Successfully</span>";
    header('location: myprofile.php?error= ' . $message);
} else{
    $error = "<span class='red'>Gender Already Used</span>";
    header('location: myprofile.php?error= ' . $error);
}

if ($orig_contact != $new_contact) {
    $query = "UPDATE users SET contact = '" . $new_contact . "' WHERE email = '" . $_SESSION['email'] . "'";
    mysqli_query($con, $query) or die($mysqli_error($con));
    $message = "<span class='red'>Contact Updated Successfully</span>";
    header('location: myprofile.php?error= ' . $message);
} else{
    $error = "<span class='red'>Contact Already Used</span>";
    header('location: myprofile.php?error= ' . $error);
}

if ($orig_city != $new_city) {
    $query = "UPDATE users SET city = '" . $new_city . "' WHERE email = '" . $_SESSION['email'] . "'";
    mysqli_query($con, $query) or die($mysqli_error($con));
    $message = "<span class='red'>City Updated Successfully</span>";
    header('location: myprofile.php?error= ' . $message);
} else{
    $error = "<span class='red'>City Already Exists</span>";
    header('location: myprofile.php?error= ' . $error);
}

if ($orig_address != $new_address) {
    $query = "UPDATE users SET address = '" . $new_address . "' WHERE email = '" . $_SESSION['email'] . "'";
    mysqli_query($con, $query) or die($mysqli_error($con));
    $message = "<span class='red'>Address Updated Successfully</span>";
    header('location: myprofile.php?error= ' . $message);
} else{
    $error = "<span class='red'>Address Already Exists</span>";
    header('location: myprofile.php?error= ' . $error);
}

?>