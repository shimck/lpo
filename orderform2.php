<html>
<head>
    <script language="JavaScript" type="text/JavaScript" src="jdilla.js"></script>
<title> Purchase Order Form </title>

</head>

<body>
<?php
require "topmenu.php";
?>


<h2> Enter the details for the purchase order below. </h2>
<br />
<hr />

<div id="orderfrm">
  
  </div>

<form id="orderfrm" name="orderfrm"  method="post">

<b> Vendor Name: </b><input name="supplierName" size="50" type="text">
<br />
<br />
<b>Vendor Address: </b><input name="supplierAddress" size="50" type="text">
<br />
<br />

  <b> Select category (i.e. Clinic, IT, Sales etc.): </b>
    <select name="frmCategory">
      <option> IT </option>
      <option> Stationery </option>
      <option> Office Equipment </option>
      <option> General Services </option>
      <option> Sales </option>
      <option> After Sales </option>
      <option> Clinic </option>
      <option> Misc. </option>
      </select>
<br />
<br />
<?php echo "<b> Date: </b>" . date('d/m/20y'); ?>

<br />
<br />
<fieldset>

  Item Number: <input  size="6" name="item[]" type="text"/>
    <script src="C:/xampp/htdocs/finallpo2/jquery-1.12.3.min.js"></script>
    <script>
      
	  $(document).ready(function()
          {
	  $('#add').click(function()
	  {
           $('#orderfrm').append(' Item Number: <input  size="6" name="item[]" type="text"/>');
	  });
	  }
  
	  );
	  
	  </script>

    <button id="add"> Add </button>

</fieldset>

<br />
<!-- <input type="submit" value="Enter Order"> -->

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



   $totext1 = $item1 . ";" . $desc1 . ";" . $qty1 . ";" . $uct1 . ";" . $totalcost1;

   writeToFile($totext1);
  
   function writeToFile($tofile1)
   {
   $myfile = fopen("contents.txt", "w") or die("Failed to open file");
    
      fwrite($myfile, $tofile1) or die("Could not write to file");
   fclose($myfile);
   
   }




   ?>
