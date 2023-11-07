<?php
namespace Xhe;
class XheYandexVision extends XheBaseObject
{
	////////////////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ ///////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "YandexVision";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// задать язык
   	function set_language($language="ru+en") 
   	{
		$params = array( "language" => $language);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// задать folder id
   	function set_folder_id($folder_id)
   	{
		$params = array( "folder_id" => $folder_id);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// задать токен для авторизации
   	function set_auth_token($token) 
   	{
		$params = array( "token" => $token);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// задать api key
   	function set_api_key($api_key) 
   	{
		$params = array( "api_key" => $api_key);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// распознать картинку
   	function recognize($path,$type_image="image") 
   	{
		$params = array( "path" => $path , "type_image" => $type_image);
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// получить все регионы с текстом
   	function get_segmented_regions($path) 
   	{
		$params = array( "path" => $path);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")		
			return null;
		return $res;
   	}    	
	// получить регион по его тексту
   	function get_region_by_text($path,$text) 
   	{
		$params = array( "path" => $path , "text" => $text);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};
?>