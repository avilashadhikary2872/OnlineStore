<?php

require("common.php");

$id = $_POST['uid'];
$id = mysqli_real_escape_string($con, $id);

//Checking whether user details exist
$query = "SELECT * FROM users WHERE uid='$id'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
  
if ($num == 0) {
  $displayDialog = true;
  if ($displayDialog) {
    if ($_SESSION['role'] == 'Super-Admin') {
      echo "<script>alert('User details do not exist.');
          window.location.href = 'manageusersbysuperadmin.php';
          </script>";
    }
    else if ($_SESSION['role'] == 'Sub-Admin') {
      echo "<script>alert('User details do not exist.');
          window.location.href = 'manageusersbysubadmin.php';
          </script>";
    }
  }
} else {
    $query = "DELETE FROM users WHERE uid='$id'";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
    if ($_SESSION['role'] == 'Super-Admin') {
      header('location: manageusersbysuperadmin.php');
    }
    else if ($_SESSION['role'] == 'Sub-Admin') {
      header('location: manageusersbysubadmin.php');
    }
  }
?>
