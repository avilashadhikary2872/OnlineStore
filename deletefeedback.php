<?php

require("common.php");

$id = $_POST['fid'];
$id = mysqli_real_escape_string($con, $id);

//Checking whether product details exist
$query = "SELECT * FROM feedback WHERE fid='$id'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
  
if ($num == 0) {
    $displayDialog = true;
    if ($displayDialog) {
      echo "<script>alert('Invalid feedback ID.');
            window.location.href = 'managefeedbacks.php';
      </script>";
    }
} else {
    $query = "DELETE FROM feedback WHERE fid='$id'";
    mysqli_query($con, $query) or die(mysqli_error($con));
    header('location: managefeedbacks.php');
  }
?>
