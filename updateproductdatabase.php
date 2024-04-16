<?php

require("common.php");

$id = $_POST['pid'];
$id = mysqli_real_escape_string($con, $id);
$name = $_POST['pname'];
$name = mysqli_real_escape_string($con, $name);
$price = $_POST['price'];
$price = mysqli_real_escape_string($con, $price);
$category = $_POST['category'];
$category = mysqli_real_escape_string($con, $category);
$gender = $_POST['pgender'];
$gender = mysqli_real_escape_string($con, $gender);

// Fetching existing filepath from the database
$query = "SELECT pname, price, category, pgender FROM products WHERE pid='$id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);

$existing_name = $row['pname'];
// If name field is empty, use the existing name from the database
if(empty($name)) {
  $name = $existing_name;
}
$existing_price = $row['price'];
// If price field is empty, use the existing price from the database
if(empty($price)) {
  $price = $existing_price;
}
$existing_category = $row['category'];
// If category field is empty, use the existing category from the database
if(empty($category)) {
  $category = $existing_category;
}
$existing_gender = $row['pgender'];
// If gender field is empty, use the existing gender from the database
if(empty($gender)) {
  $gender = $existing_gender;
}

//Checking whether product details exist
$query = "SELECT * FROM products WHERE pid='$id'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
  
if ($num == 0) {
    $displayDialog = true;
    if ($displayDialog) {
      echo "<script>alert('Product details do not exist.');
            window.location.href = 'productmanagement.php';
      </script>";
    }
} else {
    $query = "UPDATE products SET `pname`='$name', `price`='$price', `category`='$category', `pgender`='$gender' WHERE pid='$id'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    if ($result) {
      // Both queries executed successfully
      header('location: productmanagement.php');
    } else {
      // At least one query failed
      echo "Error: " . mysqli_error($con);
}
  }
?>
