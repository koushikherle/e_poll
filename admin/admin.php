<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>
<html lang="en">
<head>
	<title>E Poll:Admin Control Panel</title>
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
<html><head>

<script language="JavaScript" src="js/admin2.js">
</script>
</head>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<br></br><br><img src="Login_v1/images/img-ctrl.png" alt="IMG">
				</div>

				<form name="form1" class="login100-form validate-form"  method="post" action="checklogin.php" onsubmit="return loginValidate(this)">
					<span class="login100-form-title">
						Administrator Control Panel
					</span>
					<a href="admin.php"><font color=black size="4">Home</a> <br> 
					<a href="home.php"><font color=black size="4">View Pending Requests</a> <br>
					<a href="positions.php"><font color=black size="4">Manage Positions</a> <br>
					<a href="candidates.php"><font color=black size="4">Manage Candidates</a> <br>
					<a href="refresh.php"><font color=black size="4">Poll Results</a> <br>
					<a href="manage-admins.php"><font color=black size="4">Manage Account</a><br>
					<a href="change-pass.php"><font color=black size="4">Change Password</a>  <br>
					<a href="logout.php"><font color=black size="4">Logout</a>
				
					<p align="center">&nbsp;</p>
					<center>
						<p>Click a link above to perform an administrative operation.</p>
					</center>
					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							 Project by Koushik and Vinaya
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
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


</body></html>