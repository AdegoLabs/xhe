<?php
namespace Xhe;

class XheTesseractOCR extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "TesseractOCR";
	}
	
	   	function recognize($path,$language="rus+eng") 
   	{
		$params = array( "path" => $path , "language" => $language);
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	   	function get_segmented_regions($path,$language="rus+eng",$pageLevel=3) 
   	{
		$params = array( "path" => $path , "language" => $language, "pageLevel" => $pageLevel);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	
	   	function get_region_by_text($path,$text,$language="rus+eng") 
   	{
		$params = array( "path" => $path , "language" => $language, "text" => $text);
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	

	
	   	function set_allowed_chars($allowed_chars="") 
   	{
		$params = array( "allowed_chars" => $allowed_chars );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
   	   	function set_denieded_chars($denieded_chars="") 
   	{
		$params = array( "denieded_chars" => $denieded_chars );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	};
?>