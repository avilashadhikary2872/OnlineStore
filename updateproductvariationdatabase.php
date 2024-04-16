<?php

require("common.php");

$id = $_POST['var_id'];
$id = mysqli_real_escape_string($con, $id);
$filepath = $_POST['filepath'];
$filepath = mysqli_real_escape_string($con, $filepath);
$gender = mysqli_real_escape_string($con, $gender);
$size = $_POST['size'];
$size = mysqli_real_escape_string($con, $size);
$color = $_POST['color'];
$color = mysqli_real_escape_string($con, $color);
$quantityleft = $_POST['quantityleft'];
$quantityleft = mysqli_real_escape_string($con, $quantityleft);


// Fetching existing filepath from the database
$query = "SELECT filepath, size, color, quantity_left FROM product_varients WHERE var_id='$id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_filepath = $row['filepath'];
// If filepath field is empty, use the existing filepath from the database
if(empty($filepath)) {
  $filepath = $existing_filepath;
}
$existing_size = $row['size'];
// If gender field is empty, use the existing gender from the database
if(empty($size)) {
  $size = $existing_size;
}
$existing_color = $row['color'];
// If gender field is empty, use the existing gender from the database
if(empty($color)) {
  $color = $existing_color;
}
$existing_quantityleft = $row['quantity_left'];
// If quantityleft field is empty, use the existing quantityleft from the database
if(empty($quantityleft)) {
  $quantityleft = $existing_quantityleft;
}

//Checking whether product details exist
$query = "SELECT * FROM product_varients WHERE var_id='$id'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
  
if ($num == 0) {
    $displayDialog = true;
    if ($displayDialog) {
      echo "<script>alert('Product variation details do not exist.');
            window.location.href = 'productmanagement.php';
      </script>";
    }
} else {
    $query = "UPDATE product_varients SET `size`='$size',`color`='$color',`quantity_left`='$quantityleft', `filepath`='$filepath' WHERE var_id='$id'";
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
