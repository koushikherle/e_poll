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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>E Poll:Current Polls</title>
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

<script language="JavaScript" src="js/admin.js">
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
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<span class="login100-form-title">
			
					Current Polls
				</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				Choose Position
				<table width="420" align="center">
						<form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
						<br>
						<tr>
							
							<td>
							<SELECT NAME="position" id="position" onclick="getPosition(this.value)">
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
						
						<td><div class="container-login100-form-btn">
							<input type="submit" class="login100-form-btn" name="Submit" value="See Candidates" />
							</div></td>
					</tr>
						
						<tr>
							<td>&nbsp;</td> 
							<td>&nbsp;</td>
						</tr>
						</form> 
						</table>
						<br><center>
						<table width="100%" align="center">
						<form>
						
						<tr>
							<th><font color=black size=5>
						Candidates:
							</th>
						</tr>


						<?php
						//loop through all table rows
						//if (mysql_num_rows($result)>0){
						  if (isset($_POST['Submit']))
						  {
						while ($row=mysqli_fetch_array($result)){
						echo "<tr>";
						echo '

                            <td>
                                 <img src="data:image/jpeg;base64,'.base64_encode($row['Images_path'] ).'" height="70" width="70" />
                            </td>

                  ';
						echo "<td width='100px'><font color=#000000 size='5'>" . $row['candidate_name']."</td>";
						echo "<td width='100px'><font color=#000000 size='5'>".$row['class']."</td>";
						echo "<td></td><td><input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)' /></td>";
						
						echo "</tr>";
						}
						mysqli_free_result($result);
						mysqli_close($con);
						//}
						  }
						else
						// do nothing
						?>
						</table></center>
						<span id="error"></span><hr>
						<br>
						<h5><center>	<font color="black">Notice: Please make sure that you're voting for the right person before making any mistake! Once the vote is casted it can't be reversed!
						</center></h5></hr>
						<br>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						Return <a href="student.php"><font color =green size=4>Home</a>
						
				</form>
				
			
			
		<span id="error"></span>
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