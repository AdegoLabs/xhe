<?php
namespace Xhe;

class XheYandexVision extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "YandexVision";
	}
	
	   	function set_language($language="ru+en") 
   	{
		$params = array( "language" => $language);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	   	function set_folder_id($folder_id)
   	{
		$params = array( "folder_id" => $folder_id);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	   	function set_auth_token($token) 
   	{
		$params = array( "token" => $token);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	   	function set_api_key($api_key) 
   	{
		$params = array( "api_key" => $api_key);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	
	   	function recognize($path) 
   	{
		$params = array( "path" => $path);
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	   	function get_segmented_regions($path) 
   	{
		$params = array( "path" => $path);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")		
			return null;
		return $res;
   	}    	
	   	function get_region_by_text($path,$text) 
   	{
		$params = array( "path" => $path , "text" => $text);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	

	};
?>