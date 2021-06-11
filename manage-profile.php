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
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }
?>
<?php
// updating sql query
if (isset($_POST['update'])){
$myId = addslashes( $_GET[id]);
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];

$sql = mysqli_query($con,"UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail' WHERE member_id = '$myId'" );

// redirect back to profile
 header("Location: manage-profile.php");
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
					<img src="Login_v1/images/img-mnngg.png" alt="IMG">
				</div>
				<form action="manage-profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">

				
					<span class="login100-form-title">
						Manage Profile
					</span>
					<table align="center">
						<tr><td>First Name &nbsp&nbsp&nbsp</td>
							<td><input class="input100" type="text" name="firstname" maxlength="15" value="<?php echo $firstName; ?>">
							</td>
						</tr>
					</table><br>
					<table>
						<tr><td>Last Name&nbsp&nbsp&nbsp</td>
							<td><input  class="input100" type="text"name="lastname" maxlength="15" value="<?php echo $lastName; ?>">
							</td>
						</tr>
					</table><br>
					<table>
						<tr><td>Email ID&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
							<td><input  class="input100" type="text" name="email" maxlength="100" value="<?php echo $email; ?>">
							</td>
						</tr>
					</table><br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="update">
							Update Profile
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