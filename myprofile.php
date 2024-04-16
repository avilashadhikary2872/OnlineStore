<?php
require("common.php");
//if (!isset($_SESSION['email'])) {
  //  header('location: mydetails.php');
//}
?>
<?php
    require("common.php");

    $email = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con,$query)or die($mysqli_error($con));
    $row = $result->fetch_assoc();
    if($row) {
        $id = $row['uid'];
        $query = "SELECT uname,email,ugender,contact,ship_address FROM users WHERE uid='$id'";
        $result = mysqli_query($con, $query)or die($mysqli_error($con));
        // Check if any rows were returned
        // Initialize an array to store details
        $detailsArray = array();
        if ($result->num_rows > 0) {
            // Fetch rows and store them in the array
            while ($row = $result->fetch_assoc()) {
                // Add each row as an array to $detailsArray
                $detailsArray[] = $row;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Profile | RunnerFIT</title>
        <link href="https://fonts.googleapis.com/css2?family=Andika&family=Quicksand&display=swap" rel="stylesheet">
        <link href="addproduct.css" rel="stylesheet">
        <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="jquery.js"></script>
        <script src="bootstrap.min.js"></script>

        <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        h4 {
            font-family: 'Quicksand', sans-serif;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

    </head>
    <body>
        <?php include 'header.php'; ?>
        <div class="col-lg-4 col-md-6" id="settings-container">
            <div class="enter_details">
                
                <h3 style="margin-top: 5%; font-family: 'Quicksand', sans-serif;">Your Profile</h3><br>
                <table style="width: 1100px;">
                    <tr>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Address</th>
                    </tr>
                    <?php foreach ($detailsArray as $details): ?>
                        <tr>
                            <?php foreach ($details as $detail): ?>
                                <td><?php echo $detail; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <br><br>

            <form action="updateprofile.php" method="POST" enctype="multipart/form-data">

            <label for="uname">Full Name: </label><br>
            <input type="text" name="uname" id="uname" placeholder="Enter Your Full Name" style="width: 200px;"><br><br>

            <label for="password">Password Details: </label><br>
            <input type="password" name="old-password"  placeholder="Old Password" style="margin-bottom: 10px; width: 200px;"><br>
            <input type="password" name="password" placeholder="New Password" style="margin-bottom: 10px; width: 200px;"><br>
            <input type="password" name="password1"  placeholder="Re-type New Password" style="width: 200px;"><br><br>
            
            <label for="ugender">Gender: </label><br>
            <select name="ugender">
                <option value=""></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Rather Not Say">Rather Not Say</option>
            </select>
            <br><br>

            <label for="contact">Contact:</label><br>
            <input type="number" name="contact" id="contact" placeholder="Your Contact" min="0" style="width: 200px;"><br><br>

            <label for="ship_address">Address: </label><br>
            <input type="text" name="ship_address" id="ship_address" placeholder="Your Shipping Address" style="width: 200px;"><br><br>

            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
            <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
            </form>
        </div>  
        <?php include("footer.php"); ?>
    </body>
</html>
