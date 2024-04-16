<?php

require("common.php");

$id = $_POST['uid'];
$id = mysqli_real_escape_string($con, $id);

$name = $_POST['uname'];
$name = mysqli_real_escape_string($con, $name);
// Fetching existing name from the database
$query = "SELECT uname FROM users WHERE uid='$id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_name = $row['uname'];
// If name field is empty, use the existing name from the database
if(empty($name)) {
  $name = $existing_name;
}

$email = $_POST['email'];
$email = mysqli_real_escape_string($con, $email);
// Fetching existing email from the database
$query = "SELECT email FROM users WHERE uid='$id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_email = $row['email'];
// If email field is empty, use the existing email from the database
if(empty($email)) {
  $email = $existing_email;
}

$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
// Fetching existing password from the database
$query = "SELECT password FROM users WHERE uid='$id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_password = $row['password'];
// If password field is empty, use the existing password from the database
if(empty($password)) {
  $password = $existing_password;
}

$gender = $_POST['ugender'];
$gender = mysqli_real_escape_string($con, $gender);
// Fetching existing gender from the database
$query = "SELECT ugender FROM users WHERE uid='$id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_gender = $row['ugender'];
// If gender field is empty, use the existing gender from the database
if(empty($gender)) {
  $gender = $existing_gender;
}

$role = $_POST['role'];
$role = mysqli_real_escape_string($con, $role);
// Fetching existing role from the database
$query = "SELECT role FROM users WHERE uid='$id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_role = $row['role'];
// If role field is empty, use the existing role from the database
if(empty($role)) {
  $role = $existing_role;
}

$contact = $_POST['contact'];
$contact = mysqli_real_escape_string($con, $contact);
// Fetching existing contact from the database
$query = "SELECT contact FROM users WHERE uid='$id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_contact = $row['contact'];
// If contact field is empty, use the existing contact from the database
if(empty($contact)) {
  $contact = $existing_contact;
}

$ship_address = $_POST['ship_address'];
$ship_address = mysqli_real_escape_string($con, $address);
// Fetching existing ship_address from the database
$query = "SELECT ship_address FROM users WHERE uid='$id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_ship_address = $row['ship_address'];
// If ship_address field is empty, use the existing ship_address from the database
if(empty($address)) {
  $ship_address = $existing_ship_address;
}

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
    } else if ($_SESSION['role'] == 'Sub-Admin') {
      header('location: manageusersbysubadmin.php');
    }
  }
?>
