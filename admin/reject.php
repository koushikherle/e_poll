<?php
    include('functions.php');
    $member_id = $_GET['member_id'];
    
    $query = "DELETE FROM `requests` WHERE `requests`.`member_id` = '$member_id';";
        if(performQuery($query)){
			 echo "<script>alert('Account has been rejected!')</script>";
			die(' <meta http-equiv="refresh" content="0;url=home.php">');
        }else{
           
			 echo "<script>alert('Unknown error occured. Please try again!')</script>";
			die(' <meta http-equiv="refresh" content="0;url=home.php">');
        }

?>
<br/><br/>
<a href="home.php">Back</a>