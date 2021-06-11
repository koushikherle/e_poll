<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
	
    
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

<script language="JavaScript" src="js/admin2.js">
</script>
<script type="text/javascript">
</script>
<form action="home.php" method="post"   enctype="multipart/form-data">
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<span class="login100-form-title">
			
					Pending List
				</span>
				
				
            <div class="pull-right">
                <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location:home.php');
                }
    
                ?>
               
         

    <main role="main">

     
            <?php
            
                $query = "select * from `requests`;";
                if(count(fetchAll($query))>0){
                    foreach(fetchAll($query) as $row){
                        ?>
                
                    <h1 class="jumbotron-heading"><font color="#32CD32">Reg no: <?php echo $row['reg'] ?></h1>
					<p class="lead text-muted"><?php echo"<font color=blue>", $row['email'] ?></p>
					<p class="lead text-muted"><?php echo $row['first_name']," ", $row['last_name'] ?> has requested to register</font></p>
					<p class="lead text-muted"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" height="400" width="400" />';?></p>

                      <p>
                        <a href="accept.php?member_id=<?php echo $row['member_id'] ?>" class="btn btn-primary my-2">Accept</a>
                        <a href="reject.php?member_id=<?php echo $row['member_id'] ?>" class="btn btn-secondary my-2">Reject</a>
                      </p>
            <?php
                    }
                }else{ echo"<font color=red size=5>";
                    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					No Pending Requests!";
                }
            ?>
          <div class="text-center p-t-136">
						<a class="txt2" href="admin.php">
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<font color="#32CD32" size=5>
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							Back
							
						</a>
        
             </div>
			 
			
        </div>
      </div>
	  </div>
	  
    </header>
      </section>

    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
