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

 $host = "localhost";
$username = "bookworm_store";
$password = "1998.1989lawp";
$database = "bookworm_data";

$connection = mysqli_connect($host, $username, $password);

if (mysqli_connect_errno()) {
    echo(mysqli_connect_error());
    die();
}

mysqli_select_db($connection, $database);
if (mysqli_errno($connection)) {
    echo(mysqli_error($connection));
    die();
}

$errors = array(); // Initialize an array to hold error messages

if (isset($_POST['sent'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['FNAME']);
    $lname = mysqli_real_escape_string($connection, $_POST['LNAME']);
    $email = mysqli_real_escape_string($connection, $_POST['EMAIL']);
    $phone = mysqli_real_escape_string($connection, $_POST['PHONE']);
    $password = mysqli_real_escape_string($connection, $_POST['PASSWORD']);
    $confirmPassword = mysqli_real_escape_string($connection, $_POST['CONFIRM_PASSWORD']);

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $errors[] = "Oops... Passwords do not match.";
    } else {
        // Check for duplicate registration
        $duplicateCheckQuery = "SELECT * FROM `user` WHERE EMAIL='$email'";
        $duplicateCheckResult = mysqli_query($connection, $duplicateCheckQuery);

        if (mysqli_num_rows($duplicateCheckResult) > 0) {
            $errors[] = "Oops... This email is already registered.";
        } else {
            // Hash the password (for security) before storing it in the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Perform the database insertion
            $query = "INSERT INTO `user` (FNAME, LNAME, EMAIL, PHONE, PASSWORD) VALUES ('$fname', '$lname', '$email', '$phone', '$hashedPassword')";
            $result = mysqli_query($connection, $query);

            if ($result) {
                $_SESSION['registration_success'] = true;
                header("Location: login.php");
                exit();
            } else {
                $errors[] = "Oops... Something went wrong. Please try again.";
            }
        }
    }
}

mysqli_close($connection);
?>


<!-- Display error messages if any -->
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($errors as $error): ?>
            <?php echo $error; ?><br>
        <?php endforeach; ?>
        <a href="login.php"> Login </a>
    </div>
<?php endif; ?>

<!-- jQuery library -->   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
ob_end_flush();
?>
</body>
</html>
