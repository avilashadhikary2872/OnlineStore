<?php

require("common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

$query = "SELECT uid FROM users WHERE email ='" . $_SESSION['email'] . "'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$uid = $row['uid'];

$uname = $_POST['uname'];
$uname = mysqli_real_escape_string($con, $uname);
// Fetching existing uname from the database
$query = "SELECT uname FROM users WHERE uid='$uid'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_uname = $row['uname'];
// If filepath field is empty, use the existing uname from the database
if(empty($uname)) {
  $uname = $existing_uname;
}

$query = "SELECT email FROM users WHERE uid='$uid'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_email = $row['email'];
// If email field is empty, use the existing email from the database
if(empty($email)) {
  $email = $existing_email;
}

$old_pass = $_POST['old-password'];
$new_pass = $_POST['password'];
$new_pass1 = $_POST['password1'];
if ($new_pass == $new_pass1) {
    $password = $new_pass;
}
$query = "SELECT password FROM users WHERE uid='$uid'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_password = $row['password'];
// If email field is empty, use the existing email from the database
if(empty($new_pass) && empty($new_pass1) && empty($old_pass)) {
  $password = $existing_password;
}

// Check if the password has been changed
if ($old_pass != $existing_password) {
    // Password has been changed, redirect to login.php
    header('Location: login.php');
    exit(); // Ensure script stops execution after redirect
}

$ugender = $_POST['ugender'];
$ugender = mysqli_real_escape_string($con, $ugender);
// Fetching existing price from the database
$query = "SELECT ugender FROM users WHERE uid='$uid'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_ugender = $row['ugender'];
// If price field is empty, use the existing price from the database
if(empty($ugender)) {
  $ugender = $existing_ugender;
}

// Fetching existing category from the database
$query = "SELECT role FROM users WHERE uid='$uid'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_role = $row['role'];
// If category field is empty, use the existing category from the database
if(empty($role)) {
  $role = $existing_role;
}

$contact = $_POST['contact'];
$contact = mysqli_real_escape_string($con, $contact);
// Fetching existing gender from the database
$query = "SELECT contact FROM users WHERE uid='$uid'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$existing_contact = $row['contact'];
// If gender field is empty, use the existing gender from the database
if(empty($contact)) {
  $contact = $existing_contact;
}

$address = $_POST['ship_address'];
$address = mysqli_real_escape_string($con, $address);
// Fetching existing quantityleft from the database
$query = "SELECT ship_address FROM users WHERE uid='$uid'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
if($result){$row = mysqli_fetch_assoc($result);}
$existing_address = $row['ship_address'];
// If quantityleft field is empty, use the existing quantityleft from the database
if(empty($address)) {
  $address = $existing_address;
}

//Checking whether user details exist
$query = "SELECT * FROM users WHERE uid='$uid'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);

if ($num > 0) {
    if (($existing_uname != $uname) || ($old_pass != $password) || ($existing_ugender != $ugender)) {
        $query = "UPDATE users SET uname = '" . $uname . "', password = '" . $password . "', ugender = '" . $ugender . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        $displayDialog = true;
        if ($displayDialog) {
        echo "<script>alert('Changes Saved.');
                window.location.href = 'myprofile.php';
        </script>";
        }
    } else {
        if ($existing_uname == $uname) {
            $displayDialog = true;
            if ($displayDialog) {
            echo "<script>alert('Name Already Used.');
                    window.location.href = 'myprofile.php';
            </script>";
            }
        }
        else if ($existing_ugender != $ugender) {
            $displayDialog = true;
            if ($displayDialog) {
            echo "<script>alert('Gender Already Used.');
                window.location.href = 'myprofile.php';
            </script>";
            }
        }
        else {
            if ($new_pass != $new_pass1) {
                $displayDialog = true;
                if ($displayDialog) {
                echo "<script>alert('Two passwords do not match.');
                        window.location.href = 'myprofile.php';
                </script>";
                }
            }
            else if ($old_pass != $password) {
                $query = "UPDATE users SET password = '" . $password . "' WHERE email = '" . $_SESSION['email'] . "'";
                mysqli_query($con, $query) or die($mysqli_error($con));
                $displayDialog = true;
                if ($displayDialog) {
                echo "<script>alert('Changes Saved.');
                        window.location.href = 'myprofile.php';
                </script>";
                }
            }
        }
    }
}
  /*  if ($old_pass != $password) {
        $query = "UPDATE users SET password = '" . $password . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        $displayDialog = true;
        if ($displayDialog) {
        echo "<script>alert('Changes Saved.');
                window.location.href = 'myprofile.php';
        </script>";
        }
    } else if ($new_pass != $new_pass1) {
        $displayDialog = true;
        if ($displayDialog) {
        echo "<script>alert('Two passwords do not match.');
                window.location.href = 'myprofile.php';
        </script>";
        }
    } else if ($old_pass != $existing_password) {
        $displayDialog = true;
        if ($displayDialog) {
        echo "<script>alert('Wrong Old Password.');
                window.location.href = 'myprofile.php';
        </script>";
        }
    }

    if ($existing_ugender != $ugender) {
        $query = "UPDATE users SET ugender = '" . $ugender . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        $displayDialog = true;
        if ($displayDialog) {
        echo "<script>alert('Changes Saved.');
                window.location.href = 'myprofile.php';
        </script>";
        }
    } else {
        $displayDialog = true;
        if ($displayDialog) {
        echo "<script>alert('Gender Already Used.');
                window.location.href = 'myprofile.php';
        </script>";
        }
    }
*/
    if ($existing_contact != $contact) {
        $query = "UPDATE users SET contact = '" . $contact . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        $displayDialog = true;
        if ($displayDialog) {
        echo "<script>alert('Changes Saved.');
                window.location.href = 'myprofile.php';
        </script>";
        }
    } else {
        $displayDialog = true;
        if ($displayDialog) {
        echo "<script>alert('Contact Already Used.');
                window.location.href = 'myprofile.php';
        </script>";
        }
    }

    if ($existing_address != $address) {
        $query = "UPDATE users SET ship_address = '" . $address . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        $displayDialog = true;
        if ($displayDialog) {
        echo "<script>alert('Changes Saved.');
                window.location.href = 'myprofile.php';
        </script>";
        }
    } else {
        $displayDialog = true;
        if ($displayDialog) {
        echo "<script>alert('Address Already Exists.');
                window.location.href = 'myprofile.php';
        </script>";
        }
    } 
?>