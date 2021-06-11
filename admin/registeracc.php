<html lang="en">
<head>
	<title>E Poll:Admin Login</title>
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
<html><head>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="Login_v1/images/img-01.png" alt="IMG">
				</div>

				<form name="form1" class="login100-form validate-form" >
					<span class="login100-form-title">
						Enter User Info
					</span>


					<?php
					require('connection.php');
					//Process
					if (isset($_POST['submit']))
					{

					$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
					$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
					$myEmail = $_POST['email'];
					$myPassword = $_POST['password'];

					$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

					$sql = mysqli_query($con, "INSERT INTO tbMembers(first_name, last_name, email,password) 
					VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass') ");

					die("<br><br><br><center><font color=black size='4'>You have registered for an account.<br><br>Go to <a href=\"registeracc.php\"><font color=black size='3'>Login</a></center>" );
					}

					echo '<form action="\registeracc.php" method="post" onsubmit="return registerValidate(this)">';
					echo '<table align="center"><tr><td>';
					echo "<tr><td><font color=black size='4'>First Name:</td><td><input class='input100'><input type='text' name='firstname' maxlength='15' value=''></td></tr>";
					echo "<tr><td><font color=black size='4'>Last Name:</td><td><input class='input100'><input type='text'' name='lastname' maxlength='15' value=''></td></tr>";
					echo "<tr><td><font color=black size='4'>Email Address:</td><td><input class='input100'><input type='email' name='email' maxlength='100' id='email'value=''></td><td><span id='result' style='color:red;'></span></td></tr>";
					echo "<tr><td><font color=black size='4'>Password:</td><td><input class='input100'><input type='password'name='password' maxlength='15' value=''></td></tr>";
					echo "<tr><td><font color=black size='4'>Confirm Password:</td><td><input class='input100'><input type='password' name='ConfirmPassword' maxlength='15' value=''></td></tr>";
					echo "<tr><td>&nbsp;</td><tr><td>&nbsp;</td><td><div class='container-login100-form-btn'>
						<input type='submit' class='login100-form-btn' name='submit' value='Register Account'></td></tr>";
					echo "</tr></td></table>";
					echo "</form>";
					?>

					
					</body>
					<script src="js/jquery-1.2.6.min.js"></script>
						<script>
						$(document).ready(function(){
						  
							$('#email').blur(function(event){
							 
								event.preventDefault();
								var emailId=$('#email').val();
													$.ajax({                     
												url:'checkuser.php',
												method:'post',
												data:{email:emailId},  
												dataType:'html',
												success:function(message)
												{
												$('#result').html(message);
												}
										  });
										
							   

							});
							

						});
						</script>
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

</body
</html>