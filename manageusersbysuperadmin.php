<?php
require("common.php");
//if (!isset($_SESSION['email'])) {
  //  header('location: admin.php');
//}
?>

<?php
    $query = "SELECT * FROM users";
    $result = mysqli_query($con, $query)or die($mysqli_error($con));
    // Initialize an array to store details
    $detailsArray = array();
    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch rows and store them in the array
        while ($row = $result->fetch_assoc()) {
            // Add each row as an array to $detailsArray
            $detailsArray[] = $row;
        }
    } else {
        echo "No records found.";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Users Management | RunnerFIT</title>
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

        th {
            background-color: #f2f2f2;
        }
    </style>

    </head>
    <body>
        <?php include 'header.php'; ?>
        <div class="col-lg-4 col-md-6" id="settings-container">
            <div class="enter_details">
            <h3>Manage Admin</h3><br>
                <form action="setsubadmin.php" method="POST" enctype="multipart/form-data">

                <label for="uid">ID: </label>
                <!--<input type="file" name="filepath" id="filepath"><br>-->
                <input type="number" name="uid" id="uid" min="101"><br><br>

                <button type="submit" name="submit" class="btn btn-primary">Set Sub-Admin</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                </form>
                
                <form action="removesubadmin.php" method="POST" enctype="multipart/form-data" style="margin-top: -10%">
                <label for="uid">ID: </label>
                <!--<input type="file" name="filepath" id="filepath"><br>-->
                <input type="number" name="uid" id="uid" min="101"><br><br>
                <button type="submit" name="submit" class="btn btn-primary">Remove Sub-Admin</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                </form>
                
                <h3 style="margin-top: 0%">Update User Details</h3><br>
                <form action="updateuserdatabase.php" method="POST" enctype="multipart/form-data">

                <label for="uid">ID: </label>
                <!--<input type="file" name="filepath" id="filepath"><br>-->
                <input type="number" name="uid" id="uid" min="101"><br><br>

                <label for="uname">Full Name: </label>
                <!--<input type="file" name="filepath" id="filepath"><br>-->
                <input type="text" name="uname" id="uname"><br><br>

                <label for="email">Email Address: </label>
                <input type="text" name="email" id="email" value=""><br><br>

                <label for="ugender">Gender: </label>
                <select name="ugender">
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Rather Not Say">Rather Not Say</option>
                </select>
                <br><br>

                <label for="ship_address">Address: </label>
                <input type="text" name="ship_address" id="ship_address" placeholder=""><br><br>

                <button type="submit" name="submit" class="btn btn-primary">Update Details</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                </form>

                <h3 style="margin-top: 0%">Delete User</h3><br>
                <form action="deleteuserdatabase.php" method="POST" enctype="multipart/form-data">

                <label for="uid">ID: </label>
                <!--<input type="file" name="filepath" id="filepath"><br>-->
                <input type="number" name="uid" id="uid" min="101"><br><br>

                <button type="submit" name="submit" class="btn btn-primary">Delete User</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                </form>
                <h3 style="margin-top: 5%; font-family: 'Quicksand', sans-serif;">Users Details</h3><br>
                <table style="width: 1000px;">
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Password</th>
                        <th>Gender</th>
                        <th>Role</th>
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
                <br>
            </div>
        </div>  
        <?php include("footer.php"); ?>
    </body>
</html>
