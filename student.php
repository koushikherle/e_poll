<?php
$allowlist = array(
'192.168.137.1',
'192.168.43.88',
    '127.0.0.1',
	'::1',
    '98.465.23.89',
    '16.289.90.10',
    '71.214.228.18'
);

if(!in_array($_SERVER['REMOTE_ADDR'],$allowlist)){
    die('<br></br><br></br><br></br><font size="15" color="red" ><b>This website cannot be accessed from your IP address, Please contact the Admin');
}
else
{
require('connection.php');

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
}
?>

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
				<div class="login100-pic js-tilt" data-tilt>
					<img src="Login_v1/images/img-hoe.png" alt="IMG">
				</div>

				<form name="form1" class="login100-form validate-form"  method="post" action="checklogin.php" onsubmit="return loginValidate(this)">
					<span class="login100-form-title">
						Student Home
					</span>
				<a href="student.php"><font color=black size="3">Home</a> <br>
				<a href="vote.php"><font color=black size="3">Current Polls</a> <br>
				<a href="manage-profile.php"><font color=black size="3">Manage My Profile</a> <br>
				<a href="changepass.php"><font color=black size="3">Change Password</a><br> 
				<a href="logout.php"><font color=black size="3">Logout</a><br></br>
				
				<div class="text-center p-t-136">
						<a class="txt2" href="#">
							 Project by Koushik and Vinaya
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
						
				
			</form>

			
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