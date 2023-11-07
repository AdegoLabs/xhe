<?php
namespace Xhe;
class XheTelegram extends XheBaseObject
{
	/////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ /////////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Telegram";
	}
	////////////////////////////////////////////////////////////////////////////////////////////
  	
	// соединится
	function connect($api_id,$api_hash)
	{
	   	$params = array( "api_id" => $api_id , "api_hash" => $api_hash  );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	// отсоединится
	function disconnect()
	{
	   	$params = array( );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}
	// запросить авторизацию
	function request_authorization($phone_number)
	{
	   	$params = array( "phone_number" => $phone_number );
	    	return $this->call_get(__FUNCTION__,$params);
	}
	// автризоваться
	function authorization($phone_number,$auth_hash,$auth_code,$auth_password="")
	{
	   	$params = array( "phone_number" => $phone_number , "auth_hash" => $auth_hash , "auth_code" => $auth_code , "auth_password" => $auth_password  );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	////////////////////////////////////////////////////////////////////////////////////////////

	// отправить сообщение контакту
	function send_message_to_contact($phone_number,$message)
	{
	   	$params = array( "phone_number" => $phone_number , "message" => $message );
	    	return $this->call_boolean(__FUNCTION__,$params);
	}

	////////////////////////////////////////////////////////////////////////////////////////////
};	
?>