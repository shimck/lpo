<html>
  <head>
    <script language="JavaScript" type="text/JavaScript" src="jdilla.js"></script>
    <title> Purchase Order Form </title>

  </head>

  <body>
    <?php
       require "topmenu.php";
       require "checkconnection.php";
       ?>


    <h2> Enter the details for the purchase order below. </h2>
    <br />
    <hr />


    <form action="orderform.php" name="ofrm" method="post">
      <table border="0">
	<tr><td><b> Vendor Name: </b></td><td><input name="vendorName" size="30" type="text" tabindex=1></td></tr>
	<tr><td><b>Vendor Address: </b></td><td><input name="vendorAddress" size="30" type="text" tabindex=2></td></tr>
	<tr><td><b>Quotation Number: </b></td><td><input name="qn" size="30" type="text" tabindex=3></td></tr>
	<tr><td><b>Quoatation Date: </b></td><td><input name="qn" size="30" type="date" tabindex=4></td></tr>
	<tr><td>  <b> Select category (i.e. Clinic, Stationery, Sales etc.): </b></td>
	  <td>
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
	</td></tr>
	<tr><td><?php echo "<b> Date: </b>" . date('d/m/20y'); ?></td></tr>

	<tr>
	  <td width="10" height="31"><b>Item Number</b></td>
	  <td width="20" height="31"><b>Item Description</b></td>
	  <td width="100" height="31"><b>Quantity</b></td>
	  <td align="right" height="31" width="20"><b>Unit Price</b></td>
	  <td align="right" height="31" width="20"><b>Total</b></td>
	</tr>


<tr>
	  <td> <input  size="6" name="item1" type="text"></td>
	  <td> <input size="50" name="desc1" type="text"> </td>
	  <td> <input size="4" name="qty1" type="text" tabindex=5 onchange="calculate()"></td>
	  <td> <input name="uct1" type="text" tabindex=6 onchange="calculate()"></td>
	  	  <td> <input name="tot1" type="text" onchange="calculate()"></td>
	</tr>

	<tr>
	  <td><input size="6" name="item2" type="text"></td>
	  <td> <input size="50" name="desc2" type="text"> </td>
	  <td>  <input size="4" name="qty2" type="text" tabindex=7 onchange="calculate()"></td>
	  <td> <input name="uct2" type="text" tabindex=8 onchange="calculate()"></td>
	  	  <td> <input name="tot2" type="text" onchange="calculate()"></td>
	</tr>

	<tr>
	  <td><input size="6" name="item3" type="text"></td>
	  <td><input size="50" name="desc3" type="text"> </td>
	  <td><input size="4" name="qty3" type="text" tabindex=9  onchange="calculate()"></td>
	  <td><input name="uct3" type="text" tabindex=10  onchange="calculate()"></td>
	  	  <td> <input name="tot3" type="text" onchange="calculate()"></td>
	</tr>

	<tr>
	  <td><input size="6" name="item4" type="text"></td>
	  <td><input size="50" name="desc4" type="text"> </td>
	  <td><input size="4" name="qty4" type="text" tabindex=11  onchange="calculate()"></td>
	  <td><input name="uct4" type="text" tabindex=12  onchange="calculate()"></td>
	  	  <td> <input name="tot4" type="text" onchange="calculate()"></td>
	</tr>

	
	<tr><td></td><td></td><td><b>Enter the Tax and Discount amounts where applicable</b></td></tr>
	<tr><td></td><td></td><td><b>Sub-Total: </b></td><td><input type="text" name="SubTot" onchange="calculate()"></td></tr>
	<tr><td></td><td></td><td><b>Discount (e.g. 5): </b></td><td><input name="discount" maxlength=3 type="text" tabindex=14  onchange="calculate()"></td></tr>
	<tr><td></td><td></td><td><b>VAT/Tax Amount (e.g. 17.5)  </b></td><td><input name="tax" type="text" tabindex=13  onchange="calculate()"></td></tr>
	<tr><td></td><td></td><td><h3>Grand Total: </h3></td><td><input type="text" name="GrandTotal" onchange="calculate()"></td></tr>

	<tr><td></td><td></td><td><input type="reset" value="Reset"></td><td><input type="submit" tabindex=15 value="Enter Order"></td></tr>

    </form>

  </body>


</html>


<?php
   error_reporting(0);
   
   $department = $_POST['frmCategory'];
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

   $order_code = substr($department, 0,3) . date('my');  
   strtoupper($order_code);
   
   $query =  "INSERT INTO ordertable3 (item_code, description, quantity, unit_cost, total_cost, department, order_code) VALUES ('$item1','$desc1','$qty1','$uct1','$totalcost1', '$department', '$order_code')";

   $result = mysqli_query($sqlconn, $query) or die(mysql_error());

   ?>
