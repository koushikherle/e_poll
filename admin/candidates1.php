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

// inserting sql query
<?php


// redirect back to candidates

?>


    // code...

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration Control Panel:Candidates</title>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body bgcolor="tan">
<center><b><font color = "brown" size="6">Simple PHP Polling System</font></b></center><br><br>
<div id="page">
<div id="header">
  <h1>MANAGE CANDIDATES</h1>
  <a href="admin.php">Home</a> | <a href="positions.php">Manage Positions</a> | <a href="candidates.php">Manage Candidates</a> | <a href="refresh.php">Poll Results</a> | <a href="manage-admins.php">Manage Account</a> | <a href="change-pass.php">Change Password</a>  | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table width="380" align="center">
<CAPTION><h3>ADD NEW CANDIDATE</h3></CAPTION>
<form name="fmCandidates" id="fmCandidates"  enctype="multipart/form-data" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
  <td>Candidate class</td>
  <td><input type="text" name="class"/></td>
</tr>
<tr>
    <td>Candidate Name</td>
    <td><input type="text" name="name" /></td>
</tr><tr>
<td><label>Select your Image</label></td>
<td><input name="image" type="file" id="image"></td></tr>
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
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info"/></td>
</tr>
</table>
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>AVAILABLE CANDIDATES</h3></CAPTION>
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
</div>
<div id="footer">
  <div class="bottom_addr">&copy; 2012 Simple PHP Polling System. All Rights Reserved</div>
</div>
</div>
</body>
</html>
