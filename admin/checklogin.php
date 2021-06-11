<!DOCTYPE html>
<html lang="en">
<head>
	<title>E-Poll Student Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Login_v1/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/css/util.css">
	<link href="Login_v1/css/main.css" rel="stylesheet" type="text/css" />
<!--===============================================================================================-->
</head>
<body>
	
<script language="JavaScript" src="js/user.js">
</script>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt> <br></br>
					<img src="Login_v1/images/img-01.png" alt="IMG">
				</div>

				<form name="form1" class="login100-form validate-form"  method="post" action="checklogin.php" onsubmit="return loginValidate(this)">
					<span class="login100-form-title">
						Invalid Credentials Provided! 
					</span>
<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);

ob_start();
session_start();
require('../connection.php');

$tbl_name="tbAdministrators"; // Table name


// Defining your login details into variables
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$encrypted_mypassword=md5($mypassword); //MD5 Hash for security

// MySQL injection protections
$myusername = stripslashes($myusername);
$mypassword = stripslashes($encrypted_mypassword);

//$myusername = mysqli_real_escape_string($myusername);
//$mypassword = mysqli_real_escape_string($mypassword);

//echo $mypassword." ".$myusername;

$sql=mysqli_query($con, "SELECT * FROM tbadministrators WHERE email='$myusername' and password='$mypassword'");
// Checking table row
$count = mysqli_num_rows($sql);

// If username and password is a match, the count will be 1
if($count)
{
// If everything checks out, you will now be forwarded to admin.php

  $user=mysqli_fetch_assoc($sql); 
  $_SESSION['admin_id'] = $user['admin_id'];
  header("location:Authenticator/index.php");
}
//If the username or password is wrong, you will receive this message below.
else {
  echo "<font color =red size=3><br></br><br><center>You've either entered a wrong email or your password is incorrect!</center></font><br></br><hr><br><center>Return to<a href=\"index.php\"><font color =green size=4> login</a></center>";
  }
  
ob_end_flush();
?> 
 <br></br><br>
									<div class="text-center p-t-136">
										<a class="txt2" href="#">
											 Project by Koushik and Vinaya
											<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
										</a>
									</div>

					</div>
						</div>
					</div>
	
	

<!--===============================================================================================-->	
	<script src="Login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v1/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v1/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="Login_v1/js/main.js"></script>

</body>
</html>
