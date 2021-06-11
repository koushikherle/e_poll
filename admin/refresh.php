<?php
$con=mysqli_connect('localhost', 'root', '','poll_mysqli') or die(mysqli_error());
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

     }
    else
        //do nothing


?>
<?php
// retrieving positions sql query
$positions=mysqli_query($con, "SELECT * FROM tbPositions");
?>


<?php
$i=0;
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
<script language="JavaScript" src="js/adminj.js">
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
			 if(isset($position))
			  {
				$results = mysqli_query($con, "SELECT * FROM tbCandidates where candidate_position='$position'");
				$row=mysqli_num_rows($results);
				if($row>0)
				{
					$rs=mysqli_query($con,"SELECT SUM(candidate_cvotes) FROM tbCandidates where candidate_position='$position'");
					$r=mysqli_fetch_array($rs);
					$total=$r['SUM(candidate_cvotes)'];
					echo'<font color=blue size=5 >Total votes :'." ".$total;echo'<br></font>';
					while($row1 = mysqli_fetch_array($results))
					{
						// for the first candidate
						$candidate_name=$row1['candidate_name']; // first candidate name
						$candidate=$row1['candidate_cvotes']; // first candidate vote
              ?>
						<?php if(isset($_POST['Submit'])){echo $candidate_name;} ?>:
						 <?php if(isset($_POST['Submit'])){ echo $candidate; echo'vote(s)<br>';}
					}
					$m=mysqli_query($con,"select MAX(candidate_cvotes)as max FROM tbCandidates where candidate_position='$position'");
					$mx=mysqli_fetch_array($m);
					$maxx=$mx['max'];
					$p=mysqli_query($con,"select * FROM tbCandidates where candidate_cvotes='$maxx'");
					$na=mysqli_fetch_array($p);
					$n=$na['candidate_name'];
					$mv=mysqli_query($con,"select MAX(candidate_cvotes)as max1 FROM tbCandidates where candidate_position='$position' and candidate_name!='$n'");
					$mxv=mysqli_fetch_array($mv);
					$maxx1=$mxv['max1'];
					$pv=mysqli_query($con,"select * FROM tbCandidates where candidate_cvotes='$maxx1'");
					$nav=mysqli_fetch_array($pv);
					$nv=$nav['candidate_name'];
					if($maxx!=$maxx1){
					echo '<br></br><font color=red size=4  >The winner is'." ".$n." ".'with'." ".$maxx." ".'vote(s)</font>';
						echo '<br></br><font color=red size=4  >The 2nd winner is'." ".$nv." ".'with'." ".$maxx1." ".'vote(s)</font>';
					}
					else{
						echo'<br></br><font color=red size=4  >It is a Tie!</font>';
					}
					if(isset($_POST['Submit'])){$totalvotes=$candidate;}
						echo'<br></br><br>';
				}			
				else
				{
					echo'<Script type="text/javascript">alert("No such records found")</script>';
				}
			}
		  ?>
				


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
