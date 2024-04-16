<?php
require("common.php");

if(isset($_GET['pid']) && isset($_GET['size']) && isset($_GET['color'])) {
    $pid = $_GET['pid'];
    $size = $_GET['size'];
    $color = $_GET['color'];

    $query = "SELECT quantity_left FROM product_varients WHERE pid='$pid' AND size='$size' AND color='$color'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    
    if($row) {
        $quantity_left = $row['quantity_left'];
        echo $quantity_left;
    } else {
        echo '0';
    }
} else {
    echo 'Error: Invalid parameters';
}
?>