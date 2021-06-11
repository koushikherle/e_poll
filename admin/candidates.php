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


// redirect back to candidates

?>


   

<?php
if (isset($_POST["insert"]))
{
$newclass=addslashes($_POST['class']);
$newCandidateName = addslashes( $_POST['name'] ); //prevents types of SQL injection
$newCandidatePosition = addslashes( $_POST['position'] );//prevents types of SQL injection
 $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$sql = mysqli_query($con, "INSERT INTO tbCandidates(class,candidate_name,candidate_position,Images_path) VALUES ('$newclass','$newCandidateName','$newCandidatePosition','$file')" );
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
 header("Location: candidates.php");
 }
 else
 // do nothing
?>
<html lang="en">
<head>
	<title>E Poll:Edit Candidate</title>
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
  <h1>MANAGE CANDIDATES</h1>
  
<br></br><br>
<table>
<form name="fmCandidates" id="fmCandidates"  enctype="multipart/form-data" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
  <td>Candidate Class&nbsp&nbsp&nbsp&nbsp</td>
  <td><input class="input100" type="text" name="class"/></td>
</tr>
</table>
<br></br><br>
<table>
<tr>
    <td>Candidate Name&nbsp&nbsp&nbsp</td>
    <td><input class="input100" type="text" name="name" /></td>
</tr>
</table>
<br></br><br>

<table>
<tr>
<td><label>Select your Image&nbsp&nbsp&nbsp</label></td>
<td><input name="image" type="file" id="image"></td></tr>
</table>
<br></br><br>
<table>
<tr>
    <td>Candidate Position</td>
    <!--<td><input type="combobox" name="position" value="<?php echo $positions; ?>"/></td>-->
    <td><SELECT NAME="position" id="position">select
    <OPTION VALUE="select">select
    <?php
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions_retrieved)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT>
    </td>
</tr>
</table>
<table>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info"/></td>
</tr>
</table>
<br></br><br><center><h2>AVAILABLE CANDIDATES</h2></center><br></br><br>
<table border="0" width="620" align="center">

<tr>
<th>Candidate ID</th>
<th>Candidate class</th>
<th>Candidate Name</th>
<th>Candidate Position</th>
<th>Candidate Image</th>
</tr>
<?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($result)){
  // show the image
echo "<tr>";
echo "<td>" . $inc."</td>";
echo "<td>".$row['class']."</td>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";

echo '

                            <td>
                                 <img src="data:image/jpeg;base64,'.base64_encode($row['Images_path'] ).'" height="70" width="70" />
                            </td>

                  ';
echo '<td><a href="candidates.php?id=' . $row['candidate_id'] .'">Delete Candidate</a></td>';
echo "</tr>";
$inc++;
}
mysqli_free_result($result);
mysqli_close($con);
?>
</table>
<hr>
						<div class="text-center p-t-136">
						<a class="txt2" href="admin.php">
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<font color="#32CD32" size=5>
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							Back
							
						</a>
						
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
