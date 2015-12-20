<?php
	include_once("PHPSend.php");
	
	$arr = array();
	$state = array();
	
	//Connect 20 PHPsends at same time
	
	for ($i = 0; $i<20; $i++)
	{
		$arr[$i]=new PHPSsend();
		$succ = $arr[$i]->PHPSconnect("localhost","passwurt","11223");
		echo "connected $i. - result: $succ\n";
		$state[$i]=$succ;
		sleep(1);
	}
	
	//Some message
	
	for ($i = 0; $i<20; $i++)
	{
		if ($state[$i]==0)
			$arr[$i]->PHPScommand("say Connector ".$i." says Hello!");
	}
	
	//Disconnect now
	
	for ($i = 0; $i<20; $i++)
	{
		if ($state[$i]==0)
			$arr[$i]->PHPSdisconnect();
	}
?>