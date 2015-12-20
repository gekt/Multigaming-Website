<?php

include("PHPSendConf.php");

class PHPSresponse
{
	var $msg;
	var $from;
	
	function isFrom($who)
	{
		if ($who==$from)
			return true;
		else
			return false;
	}
}

function recv($socket)
{
	$r=socket_read($socket, 256, PHP_NORMAL_READ);
	return substr($r,0,-1);
}

function PHPSauth($pass)
{
	global $PHPSpassword, $PHPSuseWhitelist, $PHPSpostPassword, $PHPSwhitelist;
	
	$from=$_SERVER['REMOTE_ADDR'];
	if ($PHPSuseWhitelist && !in_array($from,$PHPSwhitelist))
		return 1;
	if ($pass==sha1($PHPSpostPassword))
		return 0;
	else
		return 2;
}

class PHPSsend
{
	var $socket=null;
	
	function PHPSconnect($adress, $password, $port=11223)
	{
		$this->socket = socket_create(AF_INET, SOCK_STREAM, 0);
		
		socket_set_block($this->socket);
		
		$result = socket_connect($this->socket, $adress, $port);
		
		if ($this->socket==null)
				return 1;
		
		socket_write($this->socket, sha1($password)."\n", strlen(sha1($password))+2); //auth
		$result=recv($this->socket);
		
		if ($result=="PHPSpass0")
			return 0;
		else if ($result=="PHPSpass1")
			return 2;
		else if ($result=="PHPSpass2")
			return 3;
		else if ($result=="PHPSbusy")
			return 4;
		else 
			return 5;
	}
	
	function PHPScommand($command)
	{
		socket_write($this->socket, "[server]\n",10);
		socket_write($this->socket, $command."\n",strlen($command)+2);
		$result=recv($this->socket);
		
		if ($result!="PHPScmd0")
			return 1;
		return 0;
	}
	
	function PHPScommandAsPlayer($player,$command)
	{
		socket_write($this->socket, $player."\n",strlen($player)+2);
		socket_write($this->socket, $command."\n",strlen($command)+2);
		$result=recv($this->socket);
		
		if ($result!="PHPScmd0")
			return 1;
		return 0;
	}
	
	function PHPSdisconnect()
	{
		socket_write($this->socket, "[server]\n",10);
		socket_write($this->socket, "PHPSdisconnect\n",15);
		$result=recv($this->socket);
		
		if ($result!="PHPSdisconnect0")
			return 1;
		return 0;
	}
	
	function PHPSrecv()
	{
		$result=recv($this->socket);
		$resp=explode(':',$result,2);
		$r=new PHPresponse();
		$r->from=$resp[0];
		$r->msg=$resp[1];
		return $r;
	}
	
	function PHPSrecvMsg()
	{
		$result=recv($this->socket);
		$resp=explode(':',$result,2);
		return $resp[1];
	}
}

?>