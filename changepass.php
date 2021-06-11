<?php
session_start();
require('connection.php');

//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
} 
//retrive student details from the tbmembers table
$result=mysqli_query($con, "SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // get data from db
 $stdId = $row['member_id']; 
  $encpass= $row['password'];
}
?>
<?php
// updating sql query
if (isset($_POST['changepass'])){
$myId =  $_REQUEST['id'];
$oldpass = md5($_POST['oldpass']);
$newpass = $_POST['newpass'];
$conpass = $_POST['conpass'];
if($encpass == $oldpass)
{
  if($newpass == $conpass)
  {
    $newpassword = md5($newpass); //This will make your password encrypted into md5, a high security hash
    $sql = mysqli_query($con,"UPDATE tbmembers SET password='$newpassword' WHERE member_id = '$myId'" );
    echo "<script>alert('Password Changed Successully!')</script>";
  }
  else
  {
    echo "<script>alert('New and Confirm Password Does Not Match!!')</script>";
  }

}
else
{
    echo "<script>alert('Old password Does Not Match')</script>";
}


// redirect back to profile
// header("Location: manage-profile.php");
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
					<br></br><br><img src="Login_v1/images/img-cpass.png" alt="IMG">
				</div>
					<form action="changepass.php?id=<?php echo $_SESSION['member_id']; ?>" method="post">

				
					<span class="login100-form-title">
						Change Password
					</span>
					<table align="center">
						<tr><td>Old  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td>
							<td><input class="input100" type="password" name="oldpass" maxlength="5" value="">
							</td>
						</tr>
					</table><br>
					<table align="center">
						<tr><td>New &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  </td>
							<td><input class="input100" type="password" name="newpass" maxlength="5" value="">
							</td>
						</tr>
					</table><br>
					<table align="center">
						<tr><td>Confirm  &nbsp &nbsp </td>
							<td><input class="input100" type="password" name="conpass" maxlength="5" value="">
							</td>
						</tr>
					</table><br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="changepass">
							Update Password
						</button>
					</div>
					<br>
					<center>Return <a href="student.php"><font color =green size=4>Home</center></a>
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