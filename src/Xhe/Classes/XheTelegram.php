<?php
namespace Xhe;

class XheTelegram extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Telegram";
	}
	  	
		function connect($api_id,$api_hash)
	{
	   	$params = array( "api_id" => $api_id , "api_hash" => $api_hash  );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function disconnect()
	{
	   	$params = array( );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
		function request_authorization($phone_number)
	{
	   	$params = array( "phone_number" => $phone_number );
	    	return $this->call_get(__FUNCTION__,$params);
	}
		function authorization($phone_number,$auth_hash,$auth_code,$auth_password="")
	{
	   	$params = array( "phone_number" => $phone_number , "auth_hash" => $auth_hash , "auth_code" => $auth_code , "auth_password" => $auth_password  );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function send_message_to_contact($phone_number,$message)
	{
	   	$params = array( "phone_number" => $phone_number , "message" => $message );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	};	
?>