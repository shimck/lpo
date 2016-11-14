<?php
	error_reporting(0);
	require "checkconnection.php";

	$email_address = $_POST['emailaddress'];
	$password = $_POST['password'];
	$completename = $_POST['complete_name'];
	$location = $_POST['location'];
	$costcentre = $_POST['costcentre'];
	
	$sql = "INSERT INTO users (email_address, password, complete_name, location, cost_centre) VALUES ('$email_address',(PASSWORD('$password')),'$completename',$location,'$costcentre')";

	$result = mysqli_query($sqlconn, $sql) or die(mysql_error());

	if($result)
	{
	?>
		<p>
		The user <?php echo $completename; ?>'s account has been successfully created.
		</p>
		You may proceed to the <a href="index.php"> site </a>
	<?php		
	}
	else
	{
		echo "Some error occurred. Please try again.";
	}
	

?>