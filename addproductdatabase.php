<?php

require("common.php");

$pid = $_POST['pid'];
$pid = mysqli_real_escape_string($con, $pid);

$query = "SELECT pid FROM products WHERE pid = '$pid'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);

if ($num>0) {

$size = $_POST['size'];
$size = mysqli_real_escape_string($con, $size);

$color = $_POST['color'];
$color = mysqli_real_escape_string($con, $color);

$filepath = $_POST['filepath'];
$filepath = mysqli_real_escape_string($con, $filepath);

$quantitysold = 0;
$quantitysold = mysqli_real_escape_string($con, $quantitysold);

$quantityleft = $_POST['quantityleft'];
$quantityleft = mysqli_real_escape_string($con, $quantityleft);
/*
if ($_POST['size'] == 'size_m') {
  $size_m = $quantityleft;
  $size_l = "";
  $size_xl = "";
  $size_xxl = "";
} else if ($_POST['size'] == 'size_l') {
  $size_l = $quantityleft;
  $size_m = "";
  $size_xl = "";
  $size_xxl = "";
} else if ($_POST['size'] == 'size_xl') {
  $size_xl = $quantityleft;
  $size_l = "";
  $size_m = "";
  $size_xxl = "";
} else if ($_POST['size'] == 'size_xxl') {
  $size_xxl = $quantityleft;
  $size_l = "";
  $size_xl = "";
  $size_m = "";
} else {
  $size_m = "";
  $size_l = "";
  $size_xl = "";
  $size_xxl = "";
}
$size_m = mysqli_real_escape_string($con, $size_m);
$size_l = mysqli_real_escape_string($con, $size_l);
$size_xl = mysqli_real_escape_string($con, $size_xl);
$size_xxl = mysqli_real_escape_string($con, $size_xxl);

if ($_POST['color'] == 'color_black') {
  $color_black = $quantityleft;
  $color_white = "";
  $color_red = "";
  $color_grey = "";
  $color_green = "";
} else if ($_POST['color'] == 'color_white') {
  $color_white = $quantityleft;
  $color_black = "";
  $color_red = "";
  $color_grey = "";
  $color_green = "";
} else if ($_POST['color'] == 'color_red') {
  $color_red = $quantityleft;
  $color_white = "";
  $color_black = "";
  $color_grey = "";
  $color_green = "";
} else if ($_POST['color'] == 'color_grey') {
  $color_grey = $quantityleft;
  $color_white = "";
  $color_red = "";
  $color_black = "";
  $color_green = "";
} else if ($_POST['color'] == 'color_green') {
  $color_green = $quantityleft;
  $color_white = "";
  $color_red = "";
  $color_grey = "";
  $color_black = "";
} else {
  $color_black = "";
  $color_white = "";
  $color_red = "";
  $color_grey = "";
  $color_green = "";
}
$color_black = mysqli_real_escape_string($con, $color_black);
$color_white = mysqli_real_escape_string($con, $color_white);
$color_red = mysqli_real_escape_string($con, $color_red);
$color_grey = mysqli_real_escape_string($con, $color_grey);
$color_green = mysqli_real_escape_string($con, $color_green);
*/
//Checking whether product details already exist
$query = "SELECT * FROM product_varients WHERE pid='$pid' AND size='$size' AND color='$color'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
  
if ($num != 0) {
    $displayDialog = true;
    if ($displayDialog) {
      echo "<script>alert('Product details already exists.');
            window.location.href = 'productmanagement.php';
      </script>";
    }
} else {
    $query = "INSERT INTO product_varients(pid, size, color, filepath, quantity_left, quantity_sold) VALUES('" . $pid . "','" . $size . "','" . $color . "','" . $filepath . "','" . $quantityleft . "','" . $quantitysold . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    header('location: productmanagement.php');
  }} else {
    $displayDialog = true;
    if ($displayDialog) {
      echo "<script>alert('Product is not registered. First register it.');
            window.location.href = 'productmanagement.php';
      </script>";
    }
  }
?>
