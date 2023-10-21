<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<?php include 'head.php'; ?>
</head>
<style>
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
<form method="post" action="loginprocessor">
 <div class="container d-flex flex-column"> 

  <div class="row align-items-center justify-content-center p-5">
        <div class="col-12 col-md-8 col-lg-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="mb-4">
              <h4 class="text-primary text-center">Login Now</h4>
  <div class="form-group">
    <label for="EMAIL">Email address:</label>
    <input type="email" class="form-control" name="EMAIL" require>
  </div>
  <div class="form-group">
    <label for="PASSWORD">Password:</label>
    <input type="password" class="form-control" name="PASSWORD" require>
  </div>
  <p class="text-center mt-5">Don't have an account?
                                    <a href="register"><span class="text-primary">Sign Up</span></a>
                                  </p>
   <a href="forgot-password.php"><p class="text-center text-primary">Forgot your password?</p></a>
  <button type="submit" name="sent" class="btn btn-primary">Submit</button> 
            </div>
          </div>
        </div>
      </div></div>
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