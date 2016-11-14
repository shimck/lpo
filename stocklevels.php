<html>
  <head>
 
  </head>
<body>
  <?php
     require "topmenu.php";
     require "checkconnection.php";
     error_reporting(0);
     
     ?>
  You can view stock levels from departments here.<br />
  Enter the category to view stock levels
  <hr />
    <form action="stocklevels.php" method="POST">

    <br /><br /> 
    View all items by category (i.e. Clinic, I.T., Consumables etc.)
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
    
    <input type="submit"/>
    <br />
    </form>

    <?php

       $category= $_POST['frmCategory'];
       
       $query="SELECT item_code, item_name, price, quantity FROM items WHERE category = '$category'";

       $results = mysqli_query($sqlconn, $query) or die(mysql_query());
       
       if(mysqli_num_rows($results) == 0)
       {
          echo "<div style=\"width:400px; margin:auto;\"><h2> There are no items to be viewed.</h2></div>";
       }
       else
       {
       ?>
    <table class="stc" border="1" align="center" cellpadding="5">
 <tr><th> Item Code </th><th>Item Name</th><th>Unit Cost</th><th>Stock On Hand</th><th>Re-Order Level</th><th>Re-Order Status</th><th>Total Price</th> 
   <?php
      
      while($row=mysqli_fetch_array($results, MYSQLI_ASSOC))
      {
                  extract($row);
                    echo "<tr>";

                    echo "<td>". $item_code . "</td>";
		                       
      echo "<td>". $item_name . "</td>";

       echo "<td>". $price . "</td>";

      echo "<td>". $quantity . "</td>";

      echo "<td> 3 </td>";

      if($quantity < 3)
	        echo "<td style=\"color:red\"> Re-Order</td>";
		     else
		     echo "<td> </td>";
		     	     
      echo "<td>". number_format($price * $quantity, 2)  ." </td>";
		    			
		    echo "</tr>";
                       
      
				  }
				  }
       ?>
      
         </table>
    
  </body>
  
</html>

