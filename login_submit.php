<?php

require("common.php");
//Get the email and password from the user through login page
$email = $_POST['email'];
$email = mysqli_real_escape_string($con, $email);
$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
//$password = MD5($password);
// Query checks if the email and password are present in the database.
$query = "SELECT uid, email, role FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if ($num == 0) {
  $error = "<span class='red'>Please enter correct E-mail address or Password</span>";
  header('location: login.php?error=' . $error);
} else {  
  $row = mysqli_fetch_array($result);
  $_SESSION['email'] = $row['email'];
  $_SESSION['user_id'] = $row['uid'];
  $_SESSION['role'] = $row['role'];
  //header('location: index.php');
  // Check if the user is already logged in
if(isset($_SESSION['user_id'])) {
  // User is already logged in, redirect them to the last visited page or any default page
  // Check if the email is admin
  //if($_SESSION['email'] == 'admin@admin.admin') {
    //header('Location: admin.php');
    //exit();
  //}
  if($_SESSION['role'] == 'Super-Admin' || $_SESSION['role'] == 'Sub-Admin') {
    header('Location: admin.php');
    exit();
  }
  if(isset($_SESSION['redirect_url'])) {
      // Redirect the user to the stored URL
      $redirect_url = $_SESSION['redirect_url'];
      unset($_SESSION['redirect_url']); // Remove the stored URL from session
      header('Location: ' . $redirect_url);
      exit();
  } else {
      // If there's no stored URL, redirect to a default page
      header('Location: index.php'); // Change 'index.php' to your desired default page
      exit();
  }
}
}