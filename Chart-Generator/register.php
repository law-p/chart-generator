<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<?php include 'head.php'; ?>
<style>
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 8px;
        width: 100%;
    }

    /* Style the submit button */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    /* Style the link */
    .text-primary {
        color: #007bff;
    }
     /* Preloader */
.preloader {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 999999999;
  width: 100%;
  height: 100%;
  background-color: white;
  overflow: hidden;
}
.preloader-inner {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%,-50%);
  -moz-transform: translate(-50%,-50%);
  transform: translate(-50%,-50%);
}
.preloader-icon {
  width: 100px;
  height: 100px;
  display: inline-block;
  padding: 0px;
}
.preloader-icon span {
  position: absolute;
  display: inline-block;
  width: 100px;
  height: 100px;
  border-radius: 100%;
  background:#F7941D;
  -webkit-animation: preloader-fx 1.6s linear infinite;
  animation: preloader-fx 1.6s linear infinite;
}
.preloader-icon span:last-child {
  animation-delay: -0.8s;
  -webkit-animation-delay: -0.8s;
}
@keyframes preloader-fx {
  0% {transform: scale(0, 0); opacity:0.5;}
  100% {transform: scale(1, 1); opacity:0;}
}
@-webkit-keyframes preloader-fx {
  0% {-webkit-transform: scale(0, 0); opacity:0.5;}
  100% {-webkit-transform: scale(1, 1); opacity:0;}
}
/* End Preloader */
</style>
</head>
<body>
    <!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
 <script>
     // Function to stop the loader
function stopLoader() {
    var preloader = document.querySelector('.preloader');
    if (preloader) {
        preloader.style.display = 'none';
    }
}

// Call the function to stop the loader after 5 seconds
setTimeout(stopLoader, 5000); // 5000 milliseconds = 5 seconds

 </script>
<form method="post" action="register-processor">
<div class="container d-flex flex-column">
      <div class="row align-items-center justify-content-center p-5">
        <div class="col-12 col-md-8 col-lg-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="mb-4">
              <h3 class="text-primary text-center">Register to Get Started</h3>
              
<div class="form-group">
    <label for="text"><i class="fas fa-user"></i> First Name:</label>
    <input type="text" class="form-control" name="FNAME" required>
</div>

<div class="form-group">
    <label for="text"><i class="fas fa-user"></i> Last Name:</label>
    <input type="text" class="form-control" name="LNAME" required>
</div>

<div class="form-group">
    <label for="email"><i class="fas fa-envelope"></i> Email address:</label>
    <input type="email" class="form-control" name="EMAIL" required>
</div>


<div class="form-group">
    <label for="PHONE"><i class="fas fa-phone"></i> Phone Number:</label>
    <input type="tel" class="form-control" name="PHONE" required>
</div>


<div class="form-group">
    <label for="PASSWORD"><i class="fas fa-lock"></i> Password:</label>
    <input type="password" class="form-control" name="PASSWORD" required>
</div>

<div class="form-group">
    <label for="PASSWORD"><i class="fas fa-lock"></i> Confirm Password:</label>
    <input type="password" class="form-control" name="CONFIRM_PASSWORD" required>
</div>

<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" required>
    <label class="form-check-label" for="check1">I agree to all <a href="#">Terms of Service</a></label>
</div>

<div class="d-grid gap-2">
    <button type="submit" name="sent" class="btn btn-primary"><i class="fas fa-user-plus"></i> Create Account</button>
</div>

<p class="text-center mt-1">Already have an account?
    <a href="login"><span class="text-primary">Sign in</span></a>
</p>
            </div>
          </div>
        </div>
      </div>
</div>
</form>



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