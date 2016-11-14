<html>
<head>

<title> Purchase Order Form </title>

</head>

<body>
  <?php
     error_reporting(0);
   require "topmenu.php";
   require "checkconnection.php";
?>



    <?php
 
        
       $query="SELECT item_code, description, unit_cost, quantity FROM ordertable3";

       $results = mysqli_query($sqlconn, $query) or die(mysql_query());
       
       if(mysqli_num_rows($results) == 0)
       {
          echo "<div style=\"width:400px; margin:auto;\"><h2> There are no items to be viewed.</h2></div>";
       }
       else
       {
       ?>
    <table class="stc" border="1" align="center" cellpadding="5">
 <tr><th> Item Code </th><th>Item Name</th><th>Unit Cost</th><th>Quantity</th><th>Total Price</th> 
   <?php
      
      while($row=mysqli_fetch_array($results, MYSQLI_ASSOC))
      {
                  extract($row);
                    echo "<tr>";

                    echo "<td>". $item_code . "</td>";
		                       
      echo "<td>". $description . "</td>";

       echo "<td>". $unit_cost . "</td>";

      echo "<td>". $quantity . "</td>";
		     	     
      echo "<td>". number_format($unit_cost * $quantity, 2)  ." </td>";
		    			
		    echo "</tr>";
                       
      
				  }
				  }
       ?>
      
         </table>
    
  </body>
  
</html>

