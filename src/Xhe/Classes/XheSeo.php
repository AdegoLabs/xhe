<?php
namespace Xhe;

class XheSEO extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Seo";
	}
	  	
	
		function get_alexa_rank($site)
	{
	   	$params = array( "site" => $site );
	    	return $this->call_get(__FUNCTION__,$params);
	}

	
		function get_sitemap($site,$file,$timeout=99999)
	{
	   	$params = array( "site" => $site , "file" => $file  );
	    	return $this->call_get(__FUNCTION__,$params,$timeout);
	}
		function get_all_sitemap_links($site,$file,$timeout=99999)
	{
	   	$params = array( "site" => $site , "file" => $file  );
	    	return $this->call_get(__FUNCTION__,$params,$timeout);
	}
   	   	function get_all_outside_links($site,$file,$timeout=99999,$separator="<br>")
   	{
	   	$params = array( "site" => $site , "file" => $file  , "separator" => $separator );
	    	return $this->call_get(__FUNCTION__,$params,$timeout);
	}   

	};	
?>