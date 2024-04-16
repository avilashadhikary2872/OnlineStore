<?php
require_once("common.php");
if (!isset($_SESSION['email'])) {
    header('location: admin.php');
}
?>
<?php
    require("common.php");

    $query = "SELECT fid, users.uid, users.uname, users.email, feed FROM feedback LEFT JOIN users ON feedback.uid = users.uid";
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
        <title>Feedbacks | RunnerFIT</title>
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
                
                <h3 style="margin-top: 5%; font-family: 'Quicksand', sans-serif;">Inventory Details</h3><br>
                <table style="width: 1100px;">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Feedback</th>
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
            <h3 style="margin-top: 5%; font-family: 'Quicksand', sans-serif;"><u>Delete Feedback</u></h3><br>
            <form action="deletefeedback.php" method="POST" enctype="multipart/form-data">

            <label for="fid">Feedback ID: </label>
            <!--<input type="file" name="filepath" id="filepath"><br>-->
            <input type="number" name="fid" id="fid" min="5001" style="width: 80px;"><br><br>

            <button type="submit" name="submit" class="btn btn-primary">Delete Feedback</button>
            <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
            </form>
            <br><br>
        </div>  
        <?php include("footer.php"); ?>
    </body>
</html>
