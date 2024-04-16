<?php

require("common.php");

$name = $_POST['pname'];
$name = mysqli_real_escape_string($con, $name);

$price = $_POST['price'];
$price = mysqli_real_escape_string($con, $price);

$category = $_POST['category'];
$category = mysqli_real_escape_string($con, $category);

$gender = $_POST['pgender'];
$gender = mysqli_real_escape_string($con, $gender);

//Checking whether product details already exist
$query = "SELECT * FROM products WHERE pname='$name'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
  
if ($num != 0) {
    $displayDialog = true;
    if ($displayDialog) {
      echo "<script>alert('Product already registered.');
            window.location.href = 'productmanagement.php';
      </script>";
    }
} else {
    $query = "INSERT INTO products(pname, price, category, pgender) VALUES('" . $name . "','" . $price . "','" . $category . "','" . $gender . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    header('location: productmanagement.php');
  }
?>
