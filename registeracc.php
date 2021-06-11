<head>
	<title>E-Poll: Registration</title>
	

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="Login_v1/css/util.css">
	<link href="Login_v1/css/main.css" rel="stylesheet" type="text/css" />
<!--===============================================================================================-->
</head><html><head>
<script language="JavaScript" src="js/user.js">
</script>

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
<h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Student Registration</h1>
<div class="news"><marquee behavior="alternate">New polls are up and running. But they will not be up forever! Just Login and then go to Current Polls to vote for your favourate candidates. </marquee></div>



<?php
require('connection.php');
//Process
if (isset($_POST['submit']))
{

$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];
$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash
$myReg=addslashes( $_POST['reg'] );
 $file = addslashes(file_get_contents($_FILES["images"]["tmp_name"]));
$sql = mysqli_query($con, "INSERT INTO requests(first_name, last_name, email,password,reg,img) 
VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass','$myReg','$file')");

die( "<br><center><h3>Your request for account registration is still pending. Kindly wait for the admin to approve!</center></h3>
			<br></br><br>
			<a href=\"index.php\"><font color=green size =3>Return Home</a><br></br><br>" );
}

echo "<center><h3>Register an account by filling in the needed information below:</h3></center><br><br>";
echo '<form action="registeracc.php" method="post" onsubmit="return registerValidate(this)"  enctype="multipart/form-data">';
echo '<table align="center">';
echo "<tr><td></td><td>First Name:</td><td><input type='text' class='input100' font-weight:bold;' name='firstname' maxlength='15' value=''></td></tr>";
echo "<tr><td></td><td>Last Name:</td><td><input type='text' class='input100'  font-weight:bold;' name='lastname' maxlength='15' value=''></td></tr>";
echo "<tr><td></td><td>Email Address:</td><td><input type='email' class='input100'  font-weight:bold;' name='email' maxlength='100' id='email'value=''></td><tr><td></td><td><span id='result' style='color:red;'></span></td></tr></tr>";
echo "<tr><td></td><td>Password:</td><td><input type='password' class='input100'  font-weight:bold;' name='password' maxlength='15' value=''></td></tr>";
echo "<tr><td></td><td>Confirm Password:</td><td><input type='password' class='input100'  font-weight:bold;' name='ConfirmPassword' maxlength='15' value=''></td></tr>";
echo "<tr><td></td><td>Reg no</td><td><input type='text' class='input100'  font-weight:bold;' name='reg' maxlength='15' value=''></td></tr>";
echo "<tr><td></td><td>College Id Proof</td><td><input name='images' type='file' id='image'></td></tr>";
echo "<tr><td></td><td>&nbsp;</td><td><input type='submit' class='login100-form-btn' name='submit' value='Register'/></td></tr>";
echo "<tr><td></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Already have an account? <a href='index.php'><b>Login Here</b></a></tr>";
echo "</tr></td></table>";
echo "</form>";
?>
<div class="text-center p-t-136">
						
							 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

							 Project by Koushik and Vinaya
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						
					</div>
</div> 
</div>
</div>



<script src="js/jquery-1.2.6.min.js"></script>
    <script>
    $(document).ready(function(){
      
        $('#email').blur(function(event){
         
            event.preventDefault();
            var emailId=$('#email').val();
                                $.ajax({                     
                            url:'checkuser.php',
                            method:'post',
                            data:{email:emailId},  
                            dataType:'html',
                            success:function(message)
                            {
                            $('#result').html(message);
                            }
                      });
                    
           

        });

    });
   
    </script>
	 <script>
    $(document).ready(function(){
      
        $('#reg').blur(function(event){
         
            event.preventDefault();
            var regId=$('#reg').val();
                                $.ajax({                     
                            url:'checkreg.php',
                            method:'post',
                            data:{reg:regId},  
                            dataType:'html',
                            success:function(message)
                            {
                            $('#result').html(message);
                            }
                      });
                    
           

        });

    });
   
    </script>
</html>