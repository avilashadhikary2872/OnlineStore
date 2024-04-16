<?php
require("common.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $var_id = $_GET["id"]; // Corrected parameter name to match the one passed in the URL
    $uid = $_SESSION['user_id'];
    
    // Delete the rows from user_items table where item_id and user_id equal to the item_id and user_id we got from the cart page and session
    $query = "DELETE cart FROM cart JOIN product_varients ON cart.var_id = product_varients.var_id WHERE cart.var_id='$var_id' AND cart.uid='$uid' AND cart.status = 1";
    $res = mysqli_query($con, $query) or die($mysqli_error($con));
    header("location:cart.php");
}
?>
