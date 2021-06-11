<?php
session_start();
require('../connection.php');
?>

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

<script language="JavaScript" src="js/admin2.js">
</script>
</head>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<br></br>
					<img src="Login_v1/images/img-editpass.png" alt="IMG">
				</div>
					<form action="change-pass.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
					<span class="login100-form-title">
						CHANGE PASSWORD
					</span>
					
					<?php
					//If your session isn't valid, it returns you to the login screen for protection
					if(empty($_SESSION['admin_id'])){
					 header("location:access-denied.php");
					}

					//fetch data for update file
					$result=mysqli_query($con, "SELECT * FROM tbadministrators WHERE admin_id = '$_SESSION[admin_id]'");
					if (mysqli_num_rows($result)<1){
						$result = null;
					}
					$row = mysqli_fetch_array($result);
					if($row)
					 {
					 // get data from db
					 $encPass = $row['password'];
					 }

					//Process
					if (isset($_GET['id']) && isset($_POST['update']))
					{
						$myId = addslashes( $_GET['id']);
						$mypassword = md5($_POST['oldpass']);
						$newpass= $_POST['newpass'];
						$confpass= $_POST['confpass'];
						if($encPass==$mypassword)
						{
							if($newpass==$confpass)
							{
							$newpass = md5($newpass); //This will make your password encrypted into md5, a high security hash
							$sql = mysqli_query($con, "UPDATE tbadministrators SET password='$newpass' WHERE admin_id = '$myId'" );
							echo "<script>alert('Your password updated');</script>";
							}
							else
							{
								echo "<script>alert('Your new pass and confirm pass not match');</script>";
							}    
						}
						else
						{
							echo "<script>alert('Your old pass not match');</script>";
						}
						
					}
					?>
					<table align="center">
						<tr>
							<td>
								
									<table align="center">
										<tr>	
											<td>Old &nbsp&nbsp&nbsp</td>
											<td>
												<input class="input100" type="password" name="oldpass" maxlength="15" placeholder="Enter Old Password">
																						</td>
										</tr>
										<td> <br></td>
										<tr>
											<td>
												New</td>
											<td>
													<input class="input100" type="password" name="newpass" maxlength="15" placeholder="Enter New Password">
														
											</td>
										</tr>
										<td> <br></td>
										<tr>
											<td>Confirm &nbsp&nbsp&nbsp</td>
											<td>
												<div class="wrap-input100 validate-input" >
													<input class="input100"  type="password" name="confpass"  placeholder="Confirm New Password" >
														
												</div>
													
												
											</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td>
												<div class="container-login100-form-btn">
													<input type="submit" class="login100-form-btn" name="update" value="Update Account" />
												</div>
												
											</td>
										</tr>

									</table>
									<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp&nbsp&nbsp&nbsp
								Return <a href="admin.php"><font color =green size=4>Home</a>									
									<div class="text-center p-t-136">
										<a class="txt2" href="#">
											 Project by Koushik and Vinaya
											<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
										</a>
									</div>
								</form>
							</td>
						</tr>
					</table>
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
					