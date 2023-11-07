<?php
namespace Xhe;
class XheTesseractOCR extends XheBaseObject
{
	////////////////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ ///////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "TesseractOCR";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// распознать картинку
   	function recognize($path,$language="rus+eng",$tesseract_version=5,$timeout=600) 
   	{
		$params = array( "path" => $path , "language" => $language, "tesseract_version" => $tesseract_version, "timeout" => $timeout);
		return $this->call_get(__FUNCTION__,$params,$timeout);
   	}    	
	// получить регионы текста
   	function get_segmented_regions($path,$language="rus+eng",$pageLevel=3) 
   	{
		$params = array( "path" => $path , "language" => $language, "pageLevel" => $pageLevel);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	
	// получить регион текста
   	function get_region_by_text($path,$text,$language="rus+eng") 
   	{
		$params = array( "path" => $path , "language" => $language, "text" => $text);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// задать разрешенные символы
   	function set_allowed_chars($allowed_chars="") 
   	{
		$params = array( "allowed_chars" => $allowed_chars );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
   	// задать запрещенные символы
   	function set_denieded_chars($denieded_chars="") 
   	{
		$params = array( "denieded_chars" => $denieded_chars );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	// задать параметры 
   	function set_params($params_str="") 
   	{
		$params = array( "params_str" => $params_str );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// получить параметры 
   	function get_params($version=5) 
   	{
		$params = array( "version" => $version );
		return $this->call_get(__FUNCTION__,$params);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};
?>