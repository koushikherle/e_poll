

<?php
require('connection.php');
//Process
if (isset($_POST['insert']))
{
	 $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$sql = mysqli_query($con, "INSERT INTO test(first_name,image) VALUES ('$file')");
header("Location: test.php");
}

?>
<form name="fmCandidates" id="fmCandidates"  enctype="multipart/form-data" action="test.php" method="post" onsubmit="return candidateValidate(this)">
<input type="file" name ="image" id="image">
<input type="submit" name="insert">