<?php
require("common.php");

if(isset($_GET['keywords'])) {
    $keywords = $_GET['keywords'];
    
    // Function to perform search based on keywords
    function searchProducts($con, $keywords) {
        // Initialize SQL conditions
        $conditions = [];
        
        // Parse keywords using regex
        preg_match_all("/[\w'-]+/", $keywords, $matches);
        $parsedKeywords = $matches[0];
        
        // Initialize variables for gender and category
        $gender = null;
        $category = null;
        
        // Iterate through parsed keywords to identify gender and category
        foreach($parsedKeywords as $keyword) {
            // Check for gender keywords
            if(in_array(strtolower($keyword), ['mens', 'men', 'man', 'gents', 'gent', 'boys', 'boy', 'male'])) {
                $gender = 'Male';
            } elseif(in_array(strtolower($keyword), ['womens', 'women', 'woman', 'ladies', 'lady', 'girls', 'girl', 'female'])) {
                $gender = 'Female';
            }
            
            // Check for category keywords (both singular and plural)
            if(in_array(strtolower($keyword), ['t-shirt', 't-shirts', 'tshirt', 'tshirts'])) {
                $category = 'T-Shirt';
            } elseif(in_array(strtolower($keyword), ['jacket', 'jackets'])) {
                $category = 'Jacket';
            } elseif(in_array(strtolower($keyword), ['tank', 'tanks', 'top-tank', 'top-tanks'])) {
                $category = 'Tank';
            } elseif(in_array(strtolower($keyword), ['jogger', 'joggers'])) {
                $category = 'Jogger';
            }
        }
        
        // If no gender is specified, return empty array
        if($gender === null) {
            echo "<center><p style='font-family: \'Quicksand\', sans-serif; font-size: 30px;'>No result found.</p></center>";
            return [];
        }
        
        // If no category is specified, indicate it and return empty array
        if($category === null) {
            echo "<center><p style='font-family: \'Quicksand\', sans-serif; font-size: 30px;'>No result found.</p></center>";
            return [];
        }
        
        // Add gender and category conditions to SQL query
        if($gender !== null) {
            $conditions[] = "pgender = '$gender'";
        }
        if($category !== null) {
            $conditions[] = "category = '$category'";
        }
        
        // Construct the WHERE clause
        $whereClause = implode(' AND ', $conditions);
        
        // Construct the SQL query
        $sql = "SELECT filepath, pname, price, products.pid FROM products JOIN product_varients ON products.pid = product_varients.pid";
        if(!empty($whereClause)) {
            $sql .= " WHERE $whereClause";
        }
        $sql .= " GROUP BY products.pid ORDER BY time DESC LIMIT 50";
        
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $products = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
            return $products;
        } else {
            echo "<center><p style='font-family: \'Quicksand\', sans-serif; font-size: 30px;'>No result found.</p></center>";
            return [];
        }
    }
    // Call search function and get products
    $products = [];
    if(isset($keywords)) {
        $products = searchProducts($con, $keywords);
    }
} else {
    echo "<center><p style='font-family: \'Quicksand\', sans-serif; font-size: 30px;'>No search query provided.</p></center>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Results | RunnerFIT</title>
        <link href="https://fonts.googleapis.com/css2?family=Andika&family=Quicksand&display=swap" rel="stylesheet">
        <link href="addproduct.css" rel="stylesheet">
        <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="jquery.js"></script>
        <script src="bootstrap.min.js"></script>

    </head>
    <body>
        <?php include 'header.php'; ?>
        <div class="row text-center" id="latest" style="width: 100%; margin-bottom: 5%; margin-left: 0.2%;">
            <?php foreach ($products as $product) {?>
                <a href="productdetails.php?pid=<?php echo $product['pid']; ?>&filepath=<?php echo $product['filepath']; ?>">
                    <div class="col-md-3 col-sm-6 home-feature" style="width: 21%; margin-left: 3.15%; margin-right: 0%; margin-bottom: 4%; border: 1px solid rgba(0,0,0,0.1); border-radius: 25px;">
                        <div class="for_image" style="margin-top: 3%;">
                            <img src="<?php
                                        $query = "SELECT filepath FROM products JOIN product_varients ON products.pid = product_varients.pid WHERE products.pid='" . $product['pid'] . "' AND color='black'";
                                        $result = mysqli_query($con, $query) or die($mysqli_error($con));
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['filepath'];
                                    ?>" height="245px" width="200px">
                        </div>
                        <div class="for_details">
                            <h4><?php echo $product['pname'] ?></h4>
                            <p>Rs. <?php echo $product['price'] ?></p>
                        </div>
                    </div>
                </a>
            <?php }?>
        </div>  
        <?php include("footer.php"); ?>
    </body>
</html>
