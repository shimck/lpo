<html>
  <head>
    <script language="JavaScript" type="text/JavaScript" src="checkform.js"></script>
      </head>


  <body>
    <fieldset>
      <legend> Create User </legend>
    <form action="adduser.php" method="post" onsubmit="return validate(this);">
      <table border="0" cellspacing="1" cellpadding="3">
	<tr><td colspan="2" align="center"> Enter user information </td></tr>
	<tr><td>Email Address: </td><td><input size="40" type="text" name="emailaddress"><span id="emailmsg"></span></td></tr>
	<tr><td>Password: </td><td><input size="20" type="password" name="password"><span id="passwdmsg"></span></td></tr>
	<tr><td>Re-Type Password: </td><td><input size="20" type="password" name="repassword"><span id="repasswdmsg"></span></td></tr>
	<tr><td>Complete Name: </td><td><input size="30" type="text" name="complete_name"><span id="usrmsg"></span></td></tr>
	<tr><td>Location </td><td><input size="4" maxlength="4" type="text" name="location"><span id="locmsg"></span></td></tr>
	<tr><td>Cost Centre </td><td><input size="10" type="text" name="costcentre"><span id="costmsg"></span></td></tr>
	
	<tr><td><input type="submit" name="submit" value="Submit"></td>
	    <td><input type="reset" value="Cancel"></td></tr>

      </table>
    </form>
   </fieldset>
  </body>
</html>
