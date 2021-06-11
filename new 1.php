<?php
require('connection.php');

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}

?>
<?php
// retrieving positions sql query
$positions=mysqli_query($con, "SELECT * FROM tbPositions");
?> 
<?php
    // retrieval sql query
// check if Submit is set in POST
 if (isset($_POST['Submit']))
 {
 // get position value
 $position = addslashes( $_POST['position'] ); //prevents types of SQL injection
 
 // retrieve based on position
 $result = mysqli_query($con,"SELECT * FROM tbCandidates WHERE candidate_position='$position'");
 // redirect back to vote
 //header("Location: vote.php");
 }
 else
 // do something
  
?>
<html>
<head>
<font face="Comic Sans MS">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>E-Poll:Voting Page</title>
<link href="css/userr.css" rel="stylesheet" type="text/css" />   
<script language="JavaScript" src="js/user.js">
</script>
<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

	if(confirm("Your vote is for "+int))
	{
  var pos=document.getElementById("str").value;
  var id=document.getElementById("hidden").value;
  xmlhttp.open("GET","save.php?vote="+int+"&user_id="+id+"&position="+pos,true);
  xmlhttp.send();

  xmlhttp.onreadystatechange =function()
{
	if(xmlhttp.readyState ==4 && xmlhttp.status==200)
	{
  //  alert("dfdfd");
	document.getElementById("error").innerHTML=xmlhttp.responseText;
	}
}

  }
	else
	{
	alert("Choose another candidate ");
	}
	
}

function getPosition(String)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","vote.php?position="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function()
    {
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "admin/refresh.php",
              cache: false,
              success: function(html){
                j(".refresh").html(html);
              }
            })
        })
        
    });
   j('.refresh').css({color:"green"});
});
</script>
</head>
<body bgcolor="tan">
<center>
<center><b><font color = "white" size="6">E-Poll System</font></b></center><br><br>
<body>
<div id="page">
<div id="header">
  <h1>CURRENT POLLS</h1>
  <a href="student.php"><font color=white size="3">Home</a> | 
  <a href="vote.php"><font color=white size="3">Current Polls</a> |
  <a href="manage-profile.php"><font color=white size="3">Manage My Profile</a> | 
  <a href="changepass.php"><font color=white size="3">Change Password</a>|
  <a href="logout.php"><font color=white size="3">Logout</a></font>
</div>
<div class="refresh">
</div>

<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
<br>
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position" onclick="getPosition(this.value)">
    <OPTION VALUE="select">select
    <?php 
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT></td>
    <td><input type="hidden" id="hidden" value="<?php echo $_SESSION['member_id']; ?>" /></td>
    <td><input type="hidden" id="str" value="<?php echo $_REQUEST['position']; ?>" /></td>
    <td><input type="submit" name="Submit" value="See Candidates" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<table width="270" align="center">
<form>
<tr>
    <th><font color=white>
Candidates:</th>
</tr>


<?php
//loop through all table rows
//if (mysql_num_rows($result)>0){
  if (isset($_POST['Submit']))
  {
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td><font color=#ffffff>" . $row['candidate_name']."</td>";
echo "<td><input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)' /></td>";
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($con);
//}
  }
else
// do nothing
?>
<tr>
    <h3 style ="text-align:center;"><font color="white">NB: Click a circle under a respective candidate to cast your vote. You can't vote more than once in a respective position. This process can not be undone so think wisely before casting your vote.
	</h3>
    <td>&nbsp;</td>
</tr>
</form>
</table>
<center><span id="error"></span></center>
</div>
<div id="footer"> 
  <div class="bottom_addr">&copy; Project by Koushik and Vinaya</div>
</div>
</div>
</body>
</html>