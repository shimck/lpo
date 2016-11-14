<?php
if(isset($_REQUEST['submit'])){
	$field_values_array = $_REQUEST['field_name'];
	
	print '<pre>';
	print_r($field_values_array);
	print '</pre>';
	
	foreach($field_values_array as $value){
		//your database query goes here
	}
}


       require "topmenu.php";
       require "checkconnection.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
<script language="JavaScript" type="text/JavaScript" src="jdilla.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MLC Purchase Order Form</title>
   <script src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var maxField = 10; //Input fields increment limitation
	var addButton = $('.add_button'); //Add button selector
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var fieldHTML = '<tr id="genrow"><td><input size="6" name="item[]" type="text"></td><td> <input size="50" name="desc1" type="text"></td><td> <input size="9" name="qty[]" type="text" onchange="calculate()"></td><td> <input name="uct[]" type="text" size="10" onchange="calculate()"></td><td> <input name="tot[]" type="text" onchange="calculate()"></td><td><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="remove-icon.png"/></a></tr></td>';
	
	var x = 1; //Initial field counter is 1
	$(addButton).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); // Add field html
		}
	});
	$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		$('tr#genrow:last').remove(); //Remove field html
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

</head>


<body>


    <form action="orderform.php" name="ofrm" method="post">
      <table class="field_wrapper" border="0">
	<tr><td><b> Vendor Name: </b></td><td><input name="vendorName" size="30" type="text" tabindex=1></td></tr>
	<tr><td><b>Vendor Address: </b></td><td><input name="vendorAddress" size="30" type="text" tabindex=2></td></tr>
	<tr><td><b>Quotation Number: </b></td><td><input name="qnumber" size="30" type="text" tabindex=3></td></tr>
	<tr><td><b>Quoatation Date: </b></td><td><input name="qdate" size="30" type="date" tabindex=4></td></tr>
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


 <tr><td><input size="6" name="item[]" type="text"></td><td> <input size="50" name="desc1" type="text"></td><td> <input size="9" name="qty1" type="text" onchange="calculate()"></td><td> <input name="uct1" type="text"  size="10" onchange="calculate()"></td><td> <input name="tot1" type="text" onchange="calculate()"></td><td><a href="javascript:void(0);" class="add_button" title="Add field"><img src="add-icon.png"/></a></td></tr>

<p></p>
	



</form>










</body>
</html>
