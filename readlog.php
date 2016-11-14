<?php

error_reporting(0);

include 'start.php';

	$selyear = $_POST['selyear'];

	if($selyear == "")
	{
?>
		<h3> Mechanical Lloyd Co. Ltd. LPO System || Access Logs </h3>
		<form name="frmLogs" action="" method="post">
		Select a Year
		<select name="selyear">
		<option value="16"> 2016 </option>
		<option value="17"> 2017 </option>
		<option value="18"> 2018 </option>
		<option value="19"> 2019 </option>
		<option value="20"> 2020 </option>
		<option value="21"> 2021 </option>
		<option value="22"> 2022 </option>
		<option value="23"> 2023 </option>
		<option value="24"> 2024 </option>
		<option value="25"> 2025 </option>
		<option value="26"> 2026 </option>
		<option value="27"> 2027 </option>
		<option value="28"> 2028 </option>
		<option value="29"> 2029 </option>
		<option value="30"> 2030 </option>
		</select>
		<p>
		<input type="submit" name="submit" value="Submit">
		</form>
<?php
}//end of if(selyear...

else
{
	$arr = file("loginlogfile.txt");
	$more = "yes";
	$i = 0;

	while($i < count($arr) && $more == "yes")
	{
		$next=trim($arr[$i]);
		$parts = explode(",",$next);
		$date = $parts[0];


		 $year = substr($date,0,2);

		if($year == $selyear)
		{
			$month = substr($date,2,2);
			$month = $month * 1;
			$res = $parts[2];

			if($res == "failed")
			{
				$fail[$month]++;
				$failure++;
			}
			else
			{
				$succeeded[$month]++;
				$successful++;
	
			}
			$total[$month]++;
		}
		else if($year > $selyear)
		     $more = "no";
		     $i++;
			

		}//end of while
		print "<h3>Breakdown of login accesses for year: 20" . $selyear. "</h3>";
		print "<table border=1>\n";
		print "<tr><td> Month </td> <td> Successes </td><td> Failures </td><td> Total </td></tr>\n";

		for($i = 1; $i <= 12; $i++)
		{
			print "<tr>\n";
			print "<td>" . $i . "</td>\n";
			print "<td>" . $succeeded[$i] . "</td>\n";
			print "<td>" . $fail[$i] . "</td>\n";
			print "<td>" . $total[$i] . "</td>\n";
			print "</tr>\n";

		}
		print "<tr><td><b>Total</b></td><td><b>" .$successful ." </b></td><td><b>" .$failure
		."</b></td><td><b>" . ($successful + $failure). "</b></td></tr>\n";
		print "</table>\n";
		

	}//end of else

include 'end.php';
?>