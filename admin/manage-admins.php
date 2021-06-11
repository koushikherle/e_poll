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
					<img src="Login_v1/images/img-editinfo.png" alt="IMG">
				</div>
					<form action="manage-admins.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
					<span class="login100-form-title">
						EDIT INFO
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
					 $adminId = $row['admin_id'];
					 $firstName = $row['first_name'];
					 $lastName = $row['last_name'];
					 $email = $row['email'];
					 }

					//Process
					if (isset($_GET['id']) && isset($_POST['update']))
					{
					$myId = addslashes( $_GET['id']);
					$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
					$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
					$myEmail = $_POST['email'];

					$sql = mysqli_query($con, "UPDATE tbAdministrators SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail' WHERE admin_id = '$myId'" );
					}
					?>
					
					
					<table align="center">
						<tr>
							<td>
								
									<table align="center">
										<tr>	
											<td>First Name &nbsp&nbsp&nbsp</td>
											<td>
												<input class="input100" type="text" name="firstname" maxlength="15" value="<?php echo $firstName; ?>">
																						</td>
										</tr>
										<td> <br></td>
										<tr>
											<td>
												Last Name</td>
											<td>
													<input class="input100" type="text" name="lastname" maxlength="15" value="<?php echo $lastName;?>">
														
											</td>
										</tr>
										<td> <br></td>
										<tr>
											<td>Email</td>
											<td>
												
													<input class="input100"  type="text" name="email"  value="<?php echo $email;?>">
														
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
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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