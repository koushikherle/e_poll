
<?php
$allowlist = array(
'192.168.137.1',
'192.168.43.88',
	'127.0.0.1',
    '12.101.67.56',
    '98.465.23.89',
    '16.289.90.10',
    '71.214.228.18'
);



if(!in_array($_SERVER['REMOTE_ADDR'],$allowlist))
{
    die(' <meta http-equiv="refresh" content="0;url=ip.php">');
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
				<div class="login100-pic js-tilt" data-tilt> <br></br>
					<img src="Login_v1/images/img-usrr.png" alt="IMG">
				</div>

				<form name="form1" class="login100-form validate-form"  method="post" action="checklogin.php" onsubmit="return loginValidate(this)">
					<span class="login100-form-title">
						Student Login
					</span>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="myusername" id="myusername" placeholder="username or email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" name="mypassword" type="password" id="mypassword" placeholder="password">
					<span class="focus-input100"></span>
				</div>
				

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Sign In
					</button>
				</div>

				<br></br><br>
				<div class="text-center">
					<a href="registeracc.php" class="txt2 hov1">
					<font size=3>Request For </font><font color=green size=4>Registration
					</a>
				</div>
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