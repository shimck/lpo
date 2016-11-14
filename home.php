<?php
error_reporting(0);
session_start();
if(isset($_SESSION['emailaddress']))
{
	$emailadd = $_SESSION['emailaddress'];
}

require "topmenu.php";

?>



<body>
<p>
	Welcome <?php echo $emailadd; ?> to the Mechanical Lloyd LPO System. You may use this system <br/><br />
	to raise LPOs, view your current stock levels or make <br /><br /> requisition requests for items from stores.<br /><br />
	If you have any issues navigate to the <b> Help </b> section for more information

</p>

</body>
</html>