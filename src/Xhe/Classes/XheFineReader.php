<?php
namespace Xhe;

class XheFineReaderOCR extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "FineReaderOCR";
	}
	
	   	function set_language($language="Russin English") 
   	{
		$params = array( "language" => $language);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	   	function set_program_folder($path) 
   	{
		$params = array( "path" => $path);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	
	   	function recognize($path) 
   	{
		$params = array( "path" => $path);
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	   	function convert($inpath,$outpath) 
   	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	};
?>