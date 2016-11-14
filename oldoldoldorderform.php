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




<h2> Enter the details for the purchase order below. </h2>
<br />
<hr />


<form action="lpopdf.php" method="post">

<b> Vendor Name: </b><input name="supplierName" size="50" type="text">
<br />
<br />
<b>Vendor Address: </b><input name="supplierAddress" size="50" type="text">
<br />
<br />
<!-- <b> Account: </b><input name="account" size="50" type="text"> -->
<br />
<br />
<?php echo "<b> Date: </b>" . date('d/m/20y'); ?>

<br />
<br />
<fieldset>
Item Number: <input  size="6" name="item1" type="text">
Description: <input size="50" name="desc1" type="text"> 
Quantity:  <input size="4" name="qty1" type="text">
Unit Cost: <input name="uct1" type="text">

<br />

Item Number: <input size="6" name="item2" type="text">
Description: <input size="50" name="desc2" type="text"> 
Quantity:  <input size="4" name="qty2" type="text">
Unit Cost: <input name="uct2" type="text">

<br />

Item Number: <input size="6" name="item3" type="text">
Description: <input size="50" name="desc3" type="text"> 
Quantity:  <input size="4" name="qty3" type="text">
Unit Cost: <input name="uct3" type="text">

<br />

Item Number: <input size="6" name="item4" type="text">
Description: <input size="50" name="desc4" type="text"> 
Quantity:  <input size="4" name="qty4" type="text">
Unit Cost: <input name="uct4" type="text">

<br />
</fieldset>

<br />
<input type="submit" value="Enter Order">



</form>



</body>


</html>


<?php
error_reporting(0);
   

   $item1 = $_POST['item1'];
   $desc1 = $_POST['desc1'];
   $qty1  = $_POST['qty1'];
   $uct1  = $_POST['uct1'];
   $totalcost1 = $qty1 * $uct1;

   $item2 = $_POST['item2'];
   $desc2 = $_POST['desc2'];
   $qty2  = $_POST['qty2'];
   $uct2  = $_POST['uct2'];
   $totalcost2 = $qty2 * $uct2;

   $item3 = $_POST['item3'];
   $desc3 = $_POST['desc3'];
   $qty3  = $_POST['qty3'];
   $uct3  = $_POST['uct3'];
   $totalcost3 = $qty3 * $uct3;

   $item4 = $_POST['item4'];
   $desc4 = $_POST['desc4'];
   $qty4  = $_POST['qty4'];
   $uct4  = $_POST['uct4'];
   $totalcost4 = $qty4 * $uct4;




   $totext1 = $item1 . ";" . $desc1 . ";" . $qty1 . ";" . $uct1 . ";" . $totalcost1;

   writeToFile($totext1);
  
   function writeToFile($tofile1)
   {
   $myfile = fopen("contents.txt", "w") or die("Failed to open file");
    
      fwrite($myfile, $tofile1) or die("Could not write to file");
   fclose($myfile);
   
   }




   ?>
