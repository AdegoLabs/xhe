<?php

namespace Xhe;

class XheBaseObject {

	var $server;
	var $password;
	var $prefix;

	static $COMMAND_TIME=100;
	static $COMMAND_TRY_COUNT=3;
	public static $server_tab=-1;

	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
	}
	function call($command,$timeout=-1)
	{
		if ($timeout==-1)
			$timeout=XHEBaseObject::$COMMAND_TIME;

		$url = "http://".$this->server."/".$command;

		if($this->password!="")
		{
			if(strstr($url,"&")!=false || strstr($url,"?")!=false)
				$url .= "&password=".base64_encode($this->password);
			else
				$url .= "?password=".base64_encode($this->password);
		}
		if(XHEBaseObject::$server_tab!=-1)
		{
			if(strstr($url,"&")!=false || strstr($url,"?")!=false)
				$url = $url."&server_tab=".base64_encode(XHEBaseObject::$server_tab);
			else
				$url = $url."?server_tab=".base64_encode(XHEBaseObject::$server_tab);
		}
		$postvars="";
		if(strstr($url,"?"))
      		{
         		$indexPost=strpos($url,"?",0);
			$postvars=substr($url,$indexPost+1,strlen($url)-$indexPost);
			$url=substr($url,0,$indexPost);
	   	}
      		for ($i=0;$i<XHEBaseObject::$COMMAND_TRY_COUNT;$i++)
		{
					$headers = array("Content-Type:application/x-www-form-urlencoded");
	      		$cUrl = curl_init();
      			curl_setopt($cUrl, CURLOPT_URL, $url);
      			curl_setopt($cUrl, CURLOPT_POST, 1);      
	      		curl_setopt($cUrl, CURLOPT_POSTFIELDS, $postvars);
					curl_setopt($cUrl, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($cUrl, CURLINFO_HEADER_OUT, TRUE);
      			curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, 1);
      			curl_setopt($cUrl, CURLOPT_TIMEOUT, $timeout);
					$html=curl_exec($cUrl);
						curl_close($cUrl);
			if ($html===false)
				continue;
			else
				break;
		}
			
		$bClosePHPIfNotConnected = false;
		$bWarningPHPIfNotConnected = false;
		if ($bClosePHPIfNotConnected===true && $html===false)
		{
			die("Connection error 404!");
			
		}
                if ($bWarningPHPIfNotConnected===true && $html===false)
  			echo("PHP not connected to Application. Check Application and PHP port and connection to Application.\nCommand $url?$postvars not runned.\n");
    		
	        $html = trim($html);
		//usleep(30000); 
		return $html;
	}


	function call_boolean($command,$params,$timeout=-1)
	{
		if ($this->call($this->get_command_string($command,$params),$timeout)=="true")
			return true;
		else
			return false;
	}
	function call_get($command,$params,$timeout=-1)
	{
		$res = $this->call($this->get_command_string($command,$params),$timeout);
		if ($res=="false")
			return false;
		else
		{
			if ($res=="-1")
				return -1;
			else
				return $res;
		}
	}

	function get_command_string($command,$params)
	{
		if ($this->prefix!="")
			$send_command=$this->prefix.".".$command;
		else
			$send_command=$command;
		$func_params=array_keys($params);		
		$func_param_values=array_values($params);
		$params="";		
		for ($i=0;$i<count($func_params);$i++)
		{
			if ($i==0)
				$params=$params."?";
			else
				$params=$params."&";			
			$params=$params.$func_params[$i]."=".base64_encode($func_param_values[$i]);
		}
		$send_command=$send_command.$params;
		return $send_command;

	}

}
?>