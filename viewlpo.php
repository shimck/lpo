<?php
require "topmenu.php";
     require "checkconnection.php";
     error_reporting(0);

?>


<html>
<body>
<br />View LPOs that have been created here. <br /><br />
<hr >

<form action="viewlpo.php" method="POST">

Order Code <input type="text" name="ordercode"/>

</form>


<?php

       $ordercode= $_POST['ordercode'];
       
       $query="SELECT item_code, description, unit_cost, quantity, order_code FROM ordertable3 WHERE order_code='$ordercode'";

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
		                       
      echo "<td>". $description . "</td>";

       echo "<td>". $unit_cost . "</td>";

      echo "<td>". $quantity . "</td>";

      echo "<td> 3 </td>";

      if($quantity < 3)
	        echo "<td style=\"color:red\"> Re-Order</td>";
		     else
		     echo "<td> </td>";
		     	     
      echo "<td>". number_format($unit_cost * $quantity, 2)  ." </td>";
		    			
		    echo "</tr>";
                       
      
				  }
				  }
       ?>
      
         </table>
    
  </body>
  
</html>


