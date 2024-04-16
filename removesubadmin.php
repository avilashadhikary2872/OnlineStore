<?php

require("common.php");

$id = $_POST['uid'];
$id = mysqli_real_escape_string($con, $id);

$query = "SELECT uname, email, password, ugender, contact, ship_address FROM users WHERE uid='$id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$name = $row['uname'];
$email = $row['email'];
$password = $row['password'];
$gender = $row['ugender'];
$contact = $row['contact'];
$ship_address = $row['ship_address'];

$role = "User";
$role = mysqli_real_escape_string($con, $role);

$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
$regex_num = "/^[789][0-9]{9}$/";

//Checking whether user details already exist
$query = "SELECT * FROM users WHERE uid='$id'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);

if ($num == 0) {
  $displayDialog = true;
  if ($displayDialog) {
    echo "<script>alert('User details do not exist.');
          window.location.href = 'manageusersbysuperadmin.php';
    </script>";
  }
} else {
    $query = "UPDATE users SET `uname`='" . $name . "',`email`='" . $email . "',`password`='" . $password . "',`ugender`='" . $gender . "',`role`='" . $role . "',`contact`='" . $contact . "',`ship_address`='" . $ship_address . "' WHERE uid='$id'";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
    if ($_SESSION['role'] == 'Super-Admin') {
      header('location: manageusersbysuperadmin.php');
    }
  }
?>
