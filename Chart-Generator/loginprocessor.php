<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<?php include 'head.php'; ?>
</head>
<body>
<?php
// servername, username, password, database name
$host = "localhost";
$username = "bookworm_store";
$password = "1998.1989lawp";
$database = "bookworm_data";

// Check connection
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['sent'])) {
    $email = mysqli_real_escape_string($connection, $_POST['EMAIL']);
    $password = mysqli_real_escape_string($connection, $_POST['PASSWORD']);
    
    $sql = "SELECT * FROM `user` WHERE EMAIL='$email'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['PASSWORD'])) {
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["EMAIL"] = $row['EMAIL'];
        $_SESSION["PASSWORD"] = $row['PASSWORD'];
        header("Location: dashboard/profile.php");
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Oops... Invalid Email/Password. Please try again.
        <a href="login.php">Login</a>
        </div>';
    }
}

// commit the current transaction for the specified database connection
   mysqli_commit($connection);
//roll back the current transaction for the specified database connection
   mysqli_rollback($connection);
//close connection
   mysqli_close($connection);
?>

<!-- jQuery library -->   
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
ob_end_flush();
?>
</body>
</html>

