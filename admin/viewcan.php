<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
} 
//retrive candidates from the tbcandidates table
$result=mysqli_query($con,"SELECT * FROM tbCandidates");
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php
// retrieving positions sql query
$positions_retrieved=mysqli_query($con, "SELECT * FROM tbPositions");
/*
$row = mysqli_fetch_array($positions_retrieved);
 if($row)
 {
 // get data from db
 $positions = $row['position_name'];
 }
 */
?>
<?php
// inserting sql query
if (isset($_POST['Submit']))
{

$newCandidateName = addslashes( $_POST['name'] ); //prevents types of SQL injection
$newCandidatePosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

$sql = mysqli_query($con, "INSERT INTO tbCandidates(candidate_name,candidate_position) VALUES ('$newCandidateName','$newCandidatePosition')" );

// redirect back to candidates
 header("Location: candidates.php");
}
?>
<?php
// deleting sql query
// check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysqli_query($con, "DELETE FROM tbCandidates WHERE candidate_id='$id'");
 
 // redirect back to candidates
 header("Location: viewcan.php");
 }
 else
 // do nothing   
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
					<img src="Login_v1/images/img-user.png" alt="IMG">
				</div>

					<form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)">
					<span class="login100-form-title">
						
						AVAILABLE CANDIDATES
						<br></br>
					<table>
						<?php
							//loop through all table rows
							$inc=1;
							while ($row=mysqli_fetch_array($result))
							{
								echo "<tr>";
								echo "<td>&nbsp&nbsp|&nbsp" . $inc."</td>";
								echo "<td>&nbsp|&nbsp".$row['class']."</td>";
								echo "<td>&nbsp|&nbsp" . $row['candidate_name']."</td>";
								echo "<td>&nbsp|&nbsp" . $row['candidate_position']."</td>";

								echo '

															<td>
																 <img src="data:image/jpeg;base64,'.base64_encode($row['Images_path'] ).'" height="70" width="70" />
															</td>

												  ';
								echo '<td>&nbsp|&nbsp<a href="candidates.php?id=' . $row['candidate_id'] .'">Delete</a></td>';
								echo "</tr>";
								$inc++;
							}
							mysqli_free_result($result);
							mysqli_close($con);
						?>
					</table>
					<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="admin.php"><font color=green size="4">Home</a> 
					&nbsp&nbsp&nbsp&nbsp<a href="candidates.php"><font color=green size="4">Back</a> <br>
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

</body>
</html>
