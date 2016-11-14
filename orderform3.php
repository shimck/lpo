<html>
  <head>
    <script language="JavaScript" type="text/JavaScript" src="jdilla.js"></script>
<script src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var maxField = 10; //Input fields increment limitation
	var addButton = $('.add_button'); //Add button selector
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var fieldHTML = '<div><tr><td><input size="6" name="item[]" type="text"></td><td> <input size="50" name="desc1" type="text"></td><td> <input size="4" name="qty[]" type="text" onchange="calculate()"></td><td> <input name="uct[]" type="text" onchange="calculate()"></td><td><input name="tot[]" type="text" onchange="calculate()"></td></tr><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="remove-icon.png"/></a></div>'; //New input field html 
	var x = 1; //Initial field counter is 1
	$(addButton).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); // Add field html
		}
	});
	$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});
});
</script>
<style type="text/css">
input[type="text"]{height:20px; vertical-align:top;}
.field_wrapper div{ margin-bottom:10px;}
.add_button{ margin-top:10px; margin-left:10px;vertical-align: text-bottom;}
.remove_button{ margin-top:10px; margin-left:10px;vertical-align: text-bottom;}
</style>

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
	<tr><td><b> Vendor Name: </b></td><td><input name="vendorName" size="30" type="text"></td></tr>
	<tr><td><b>Vendor Address: </b></td><td><input name="vendorAddress" size="30" type="text"></td></tr>
	<tr><td><b>Quotation Number: </b></td><td><input name="qn" size="30" type="text"></td></tr>
	<tr><td><b>Quoatation Date: </b></td><td><input name="qn" size="30" type="text"></td></tr>
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

	<tr><td><b> Order Number: </b></td><td><input type="text" name="ordernumber"></td></tr>

	<tr>
	  <td width="20" height="31"><b>Item Number</b></td>
	  <td width="20" height="31"><b>Item Description</b></td>
	  <td width="100" height="31"><b>Quantity</b></td>
	  <td align="right" height="31" width="20"><b>Unit Price</b></td>
	  <td align="right" height="31" width="20"><b>Total</b></td>
	</tr>


<tr>
	  <td> <input  size="6" name="item[]" type="text"></td>
	  <td> <input size="50" name="desc[]" type="text"> </td>
	  <td> <input size="4" name="qty[]" type="text" onchange="calculate()"></td>
	  <td> <input name="uct[]" type="text" onchange="calculate()"></td>
	  	  <td> <input name="tot[]" type="text" onchange="calculate()"></td>
	</tr>


	
	<tr><td></td><td></td><td><b>Enter the Tax and Discount amounts where applicable</b></td></tr>
	<tr><td></td><td></td><td><b>Sub-Total: </b></td><td><input type="text" name="SubTot" onchange="calculate()"></td></tr>
	<tr><td></td><td></td><td><b>VAT/Tax Amount (e.g. 17.5)  </b></td><td><input name="tax" type="text" onchange="calculate()"></td></tr>
	<tr><td></td><td></td><td><b>Discount (e.g. 5): </b></td><td><input name="discount" maxlength=3 type="text" onchange="calculate()"></td></tr>
	<tr><td></td><td></td><td><h3>Grand Total: </h3></td><td><input type="text" name="GrandTotal" onchange="calculate()"></td></tr>

	<tr><td></td><td></td><td><input type="reset" value="Reset"></td><td><input type="submit"  value="Enter Order"></td></tr>

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
