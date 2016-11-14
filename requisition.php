<?php

require "topmenu.php";

?>

<html>
<head>
</head>
<body>

<h4>
Make a requisition for items here. Select the category and submit your request.

</h4>

<hr />

<form method="post" action="reqpdf.php">
Select the location: <select name="location">
<option selected> 1000 </option>
      <option> 2000 </option>
      <option> 3000 </option>
      <option> 4000 </option>
      <option> 5000 </option>
      <option> 6000 </option>
      <option> Other</option>

</select>
<br /><br />
Select the Category: <select name="reqcategory">
<option selected> IT </option>
      <option> Stationery </option>
      <option> Office Equipment </option>
      <option> General Services </option>
      <option> Sales </option>
      <option> After Sales </option>
      <option> Clinic </option>
      <option> Misc. </option>
</select>
<input type="submit" value="Submit"/>
</form>

</body>




</html>