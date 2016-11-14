<?php
   error_reporting(0);
?>
<html>
<head>

<title> Purchase Order Form </title>

</head>

<body>


<table width="1000px" align="center" border="0">

<tr><th width="50px"> <img src="mlclogo.jpg" alt="company logo"> </th> <th> <br /> <h1> Mechanical Lloyd Co. Ltd </h1>   P.O. BOX 2086, Accra, GHANA W.A. <br /> 
		      Ring Road West Industrial Area, Telephone 229231/229318, Cables: Mecoy Accra, Fax: 229399/227366 <br />	
			  Bankers: BARCLAYS BANK GHANA LTD. HIGH STREET, ACCRA. <br />
			  STANDARD CHARTERED BANK GHANA LTD., <br />
			  HIGH STREET, ACCRA </th> </tr>

<tr>
 <td> </td><td><h2 align="center"> <br /> LOCAL PURCHASE ORDER </h2></td> 

</tr>


</table>
<fieldset>
  <legend> Login </legend>
<form action="validateuser.php" method="post">
  <table border="0" align="center" cellspacing="1" cellpadding="3">
  
	<tr><td>Email Address: </td><td><input size="40" type="text" name="emailaddress"></td></tr>
	<tr><td>Password: </td><td><input size="40" type="password" name="password"></td></tr>
	<tr><td colspan=2 align="center"><input type="submit" name="submit" value="Login"></td></tr>
	
  </table>


  </form>
</fieldset>



</html>
