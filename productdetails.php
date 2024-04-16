<?php
require("common.php");
//var_dump($_GET);
$pid = $_GET['pid'];
$fpath = $_GET['filepath'];
function getImagePath($pid, $color) {
    global $con;
    $query = "SELECT filepath FROM product_varients WHERE pid='$pid' AND color='$color'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    return $row['filepath'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details | RunnerFIT</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="product.css">
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>
    <link href="productdetails.css" rel="stylesheet">
    <meta charset="UTF-8">
</head>
<body>
    <?php include 'header.php'; ?>
    <form method="GET" action="<?php if(!isset($_SESSION['email'])) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; ?>login.php<?php } else { ?>cart-add.php<?php } ?>">
        <?php
            $query = "SELECT pname, price FROM products WHERE products.pid='$pid'";
            $result = mysqli_query($con, $query) or die($mysqli_error($con));
            $products = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
        ?>
        <center>
        <div class="product">
        <div class="product_img">
                    <img id="product_img" src="<?php echo getImagePath($pid, 'Black'); ?>" height="300px" width="250px">
            </div>
            <div class="product_description">
                <p id="product_title"><?php echo $products[0]['pname']?></p><br><br>
                <p id="product_option"><b><u>Select your options</u></b></p><br>
                <textarea id="price" rows="1" cols="6" readonly style="position: absolute; left: -99999px; resize: none; border: none;">Rs. <?php echo $products[0]['price']?></textarea>
                <br>
                <input type="number" name="pid" id="pid" value="<?php echo $pid ?>" style="position: absolute; left: -99999px;">
                <div class="product_selection_size">
                    <p id="product_selection_size">Select Size:</p>
                    <div class="product_size_group">
                        <input type="radio" name="size" value="M" id="M" onclick="updateSize('M'); checkSelection();">
                        <label for="M">M</label>
                        <input type="radio" name="size" value="L" id="L" onclick="updateSize('L'); checkSelection();">
                        <label for="L">L</label>
                        <input type="radio" name="size" value="XL" id="XL" onclick="updateSize('XL'); checkSelection();">
                        <label for="XL">XL</label>
                        <input type="radio" name="size" value="XXL" id="XXL" onclick="updateSize('XXL'); checkSelection();">
                        <label for="XXL">XXL</label>
                    </div>
                </div>
                <div class="product_selection_color">
                    <p id="product_selection_color">Select Color:</p>
                    <div class="product_color_group">
                        <input type="radio" name="color" value="Black" id="Black" onclick="updateColor('Black'); checkSelection(); checkSelection1();">
                        <input type="radio" name="color" value="White" id="White" onclick="updateColor('White'); checkSelection(); checkSelection1();">
                        <input type="radio" name="color" value="Red" id="Red" onclick="updateColor('Red'); checkSelection(); checkSelection1();">
                        <input type="radio" name="color" value="Grey" id="Grey" onclick="updateColor('Grey'); checkSelection(); checkSelection1();">
                        <input type="radio" name="color" value="Green" id="Green" onclick="updateColor('Green'); checkSelection(); checkSelection1();">
                    </div>
                </div>
                <div class="product_selection_quantity">
                    <p id="product_selection_quantity" style="width: 60px;">Quantity</p>
                    <input type="number" id="qnt" name="qnt" value="1" min="1" max="1" onkeydown="return false" onchange="updatePrice()">
                </div>
                <div class="product_selection_price">
                    <p id="product_selection_price" style="width: 60px;">Price</p>
                    <input type="number" id="totalprice" name="totalprice" readonly value="" style="width: 63px;">
                <div><br>
                <div class="product_selection_stock">
                    <textarea id="selected_size" rows="1" cols="5" readonly></textarea>
                    <br>
                    <textarea id="selected_color" rows="1" cols="10" readonly></textarea>
                    <br>
                    <textarea id="stock" rows="1" cols="10" readonly></textarea>
                    <br>
                </div>
                <!-- Submit button to pass the selected value via href -->
                <div class="buttons">
                    <button id="addToCartBtn" type="submit" class="btn btn-block btn-primary" style="width: 100px;" disabled>Add To Cart</button>
                    <button id="rstBtn" type="reset" class="btn btn-block btn-primary" style="width: 100px;">Reset</button>
                </div>
            </div>
        </div>
        </center>
    </form>
    <script>
		var initialImageSrc;
        function resetForm() {
            document.querySelector('.product_selection').reset();
			document.getElementById("product_img").src = initialImageSrc;
        }
        document.addEventListener("DOMContentLoaded", function() {
            initialImageSrc = document.getElementById("product_img").src;
        });

        function checkSelection1() {
            var color = document.querySelector('input[name="color"]:checked').value;
            var imgSrc = "<?php echo getImagePath($pid, 'Black'); ?>";
            var newImgSrc = imgSrc.replace("Black", color); // Assuming 'default' is the placeholder for image filename

            document.getElementById("product_img").src = newImgSrc;
        }
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Call updatePrice() when the page loads
        updatePrice();

        // Add event listener to #qnt input
        document.getElementById("qnt").addEventListener("input", updatePrice);
    });
    
    function updateSize(size) {
        document.getElementById('selected_size').value = size;
        checkSelection();
    }
    
    function updateColor(color) {
        document.getElementById('selected_color').value = color;
        checkSelection();
    }

    function updatePrice() {
        var quantity = document.getElementById("qnt").value;
        var pricePerUnit = "<?php echo $products[0]['price']?>";
        var totalPrice = quantity * pricePerUnit;
        document.getElementById("totalprice").value = totalPrice;
        // Set the value of hidden_totalprice
        document.getElementById("hidden_totalprice").value = totalPrice;
    }
    
    function checkSelection() {
        var size = document.querySelector('input[name="size"]:checked');
        var color = document.querySelector('input[name="color"]:checked');
        var qntInput = document.getElementById('qnt');

        if (!size || !color) {
            document.getElementById('addToCartBtn').disabled = true;
            document.getElementById('addToCartBtn').textContent = 'Add To Cart';
            return;
        }

        $.ajax({
            type: 'GET',
            url: 'fetch_quantity.php',
            data: { pid: '<?php echo $pid; ?>', size: size.value, color: color.value },
            success: function(response) {
                var stock = parseInt(response);
                document.getElementById('stock').value = stock;
                qntInput.max = stock > 0 ? stock : 1; // Set max attribute based on stock value
                var addToCartBtn = document.getElementById('addToCartBtn');
                if (stock <= 0) {
                    addToCartBtn.disabled = true;
                    addToCartBtn.textContent = 'Out Of Stock';
                } else {
                    addToCartBtn.disabled = false;
                    addToCartBtn.textContent = 'Add To Cart';
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }
    </script>
    <?php include 'footer.php'; ?>
</body>
</html>
