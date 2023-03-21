<?php
namespace Xhe;

class XheWordFile extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "WordFile";
	}
	
	   	function get_table_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	

	
	   	function read($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
   	   	function read_table_by_number($path,$number) 
   	{
		$params = array( "path" => $path , "number" => $number);
		return $this->call_get(__FUNCTION__,$params);
   	}

	
           	function convert($inpath,$outpath) 
   	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	};
?>