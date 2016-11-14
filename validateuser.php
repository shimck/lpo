<html>
  <head>
    <script language="JavaScript" type="text/JavaScript">
      function updateUser(username)
      {
      var ajaxUser = document.getElementById("userinfo");
      ajaxUser.innerHTML = "Welcome " + username + "&nbsp;&nbsp;&nbsp;
      <a href=\"logout.php\"> Log Out </a>";
      }
      </script>
  </head>
  <body>
    <?php
       error_reporting(0);
       require "checkconnection.php";
       
       
       $query = "SELECT email_address, password, complete_name FROM users WHERE email_address LIKE '" . $_POST['emailaddress'] . "' " . "AND password LIKE (PASSWORD('" . $_POST['password'] . "'))";
       
       $result = mysqli_query($sqlconn, $query) or die(mysql_error());
       if(mysqli_num_rows($result) == 1)
       {
       while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       {
       extract($row);
       echo "<br /><br /><p>Login successful for <b>" . $complete_name . "</b><br> <a href=\"home.php\">Proceed to the site</a> </p>";

       $verifier = TRUE;
       $_SESSION['emailaddress'] = $_POST['emailaddress'];
       $_SESSION['password'] = $_POST['password'];
       echo "<SCRIPT LANGUAGE=\"JavaScript\">updateUser('$complete_name');
					    </SCRIPT>";
       }
       }
       else
       {
        $verfier = FALSE;
       ?>
    <fieldset>
    <br /><br />
    Invalid Email Address and/or Password <br /><br />
    Not registered?
    <a href="createuser.php">Click Here</a> to request access.<br /><br /><br />
     Want to try again? <br />
    <a href="index.php"> Click Here </a> to try login again. <br />
</fieldset>
    <?php
       }

	//write to log file
	$fp = fopen("loginlogfile.txt","a");
	fwrite($fp, date("ymd").",".date("H:i").",".$complete_name);

	//$verifier=trim($verifier);
	//read from data base but for the mean time
	if($verifier)
	{
		fwrite($fp,"success\r\n ");
	}
	else
	{
		fwrite($fp,"failed\r\n");
	}
	
	fclose($fp);
       
       ?>
    
  </body>
  

</html>
