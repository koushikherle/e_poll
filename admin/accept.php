
<form action="accept.php" method="post"   enctype="multipart/form-data">

<?php
    include('functions.php');
    $member_id = $_GET['member_id'];
    $query = "select * from `requests` where `member_id` = '$member_id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $password = $row['password'];
			$reg = $row['reg'];
			$img=base64_encode($row['img']);
            $query = "INSERT INTO `tbmembers` (`member_id`, `first_name`, `last_name`, `email`, `password`,`reg`,`img`) VALUES (NULL, '$first_name', '$last_name', '$email', '$password','$reg','$img');";
        }
        $query .= "DELETE FROM `requests` WHERE `requests`.`member_id` = '$member_id';";
        if(performQuery($query)){
            echo "<script>alert('Account was successfully added')</script>";
			die(' <meta http-equiv="refresh" content="0;url=home.php">');
        }else{
            echo "<script>alert('Unknown error occured. Please try again!')</script>";
			die(' <meta http-equiv="refresh" content="0;url=home.php">');
        }
    }else{
        echo "Error occured.";
    }
    
?>

<br/><br/>
<a href="home.php">Back</a>