<?php
require("common.php");

// Debugging
//var_dump($_GET);

if (isset($_GET['pid']) && is_numeric($_GET['pid'])) {
    $pid = $_GET['pid'];
    $uid = $_SESSION['user_id'];
    $size = $_GET['size'];
    $color = $_GET['color'];
    $qnt = $_GET['qnt'];
    $totalprice = $_GET['totalprice'];
    
    $sql = "SELECT var_id from product_varients WHERE pid='$pid' AND size='$size' AND color='$color'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    $var_id = $row['var_id'];

    // Prepare the SQL statement
    $query = "INSERT INTO cart(uid, var_id, status, quan_ordered, pay_price) VALUES(?, ?, 1, ?, ?)";
    
    // Prepare the statement
    $statement = mysqli_prepare($con, $query);
    
    // Bind parameters
    mysqli_stmt_bind_param($statement, 'iiii', $uid, $var_id, $qnt, $totalprice);
    
    // Execute the statement
    mysqli_stmt_execute($statement);
    
    // Check if the insertion was successful
    if(mysqli_stmt_affected_rows($statement) > 0) {
        // Redirect to index.php
        header('location: cart.php');
    } else {
        // Handle the error, such as displaying an error message or logging the error
        echo "Error: Unable to add item to cart.";
    }
}
?>
