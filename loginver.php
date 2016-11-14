<?php

	//$verifier = $_POST["verifier"];

	//write to log file
	$fp = fopen("loginlogfile.txt","a");
	fwrite($fp, date("ymd").",".date("H:i").",");

	//$verifier=trim($verifier);
	//read from data base but for the mean time
	if($verifier)
	{
		fwrite($fp,"success\r\n");
	}
	else
	{
		fwrite($fp,"failed\r\n");
	}
	
	fclose($fp);




?>