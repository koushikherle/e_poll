<?php $a= array("Three", "two", "Four", "five","ten"); 
$max=sizeof($a);
for($i=0; $i<$max; $i++) { 
echo "$a[$i] ,"; 
}
?><br>
<?php 
$string = 'place1 place2';
$arr = explode(' ', $string);
$array_of_parts = explode(' ', 'place1 place2');
echo $array_of_parts[0]; // place1
echo $array_of_parts[1]; // place2
?>











<?php
require('../connection.php');
// retrieving candidate(s) results based on position
if (isset($_POST['Submit'])){   
/*
$resulta = mysqli_query($con, "SELECT * FROM tbCandidates where candidate_name='Luis Nani'");

while($row1 = mysqli_fetch_array($resulta))
  {
  $candidate_1=$row1['candidate_cvotes'];
  }
  */
  $position = addslashes( $_POST['position'] );
  
    $results = mysqli_query($con, "SELECT * FROM tbCandidates where candidate_position='$position'");
	$n = mysqli_num_rows($results);
	$rows=array();
	$candidate_name=array();
	$candidate=array();
	for($i=1;$i<5;$i++)
	{
		if ($rows[$i])
		{		
			  array_push($candidate_name[$i],$rows[$i]['candidate_name']); // first candidate name
			  $candidate[$i]=$rows[$i]['candidate_cvotes']; // first candidate votes
		}
		
}}
     else   // do nothing
?> 
<?php
// retrieving positions sql query
$positions=mysqli_query($con, "SELECT * FROM tbPositions");
?>
<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>

<?php if(isset($_POST['Submit'])){$totalvotes=$candidate_1+$candidate_2+$candidate_3;} ?>

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
				<br></br><br></br><br></br>
					<img src="Login_v1/images/img-poll.png" alt="IMG">
				</div>
					<form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return positionValidate(this)">
					<span class="login100-form-title">
						Poll Results
					</span>
					<div class="wrap-input100"> 
							
							<SELECT NAME="position" id="position">
							<OPTION VALUE="select">select
							<?php 
							//loop through all table rows
							while ($row=mysqli_fetch_array($positions)){
							echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
							//mysql_free_result($positions_retrieved);
							//mysql_close($link);
							}
							?>
							</SELECT>
							<div class="container-login100-form-btn">
								<input type="submit" class="login100-form-btn" name="Submit" value="See Results" />
							
					
							&nbsp; 
							&nbsp;
						</div>
						<?php
						 if(isset($_POST['Submit']))
						for($i=0;$i<5;$i++)
						{
							if ($rows[$i])
							{
								
								 echo $candidate[$i];
							}
						}
						
						
						?>
						<br></br><br>
						<center>Return <a href="admin.php"><font color =green size=4>Home</center></a>								
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
