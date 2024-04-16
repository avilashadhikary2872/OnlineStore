<?php

require("common.php");

$id = $_POST['pid'];
$id = mysqli_real_escape_string($con, $id);

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
    $query = "DELETE FROM products WHERE pid='$id'";
    mysqli_query($con, $query) or die(mysqli_error($con));
    header('location: productmanagement.php');
  }
?>
