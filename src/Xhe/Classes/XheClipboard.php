<?php

namespace Xhe;

class XheClipboard extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Clipboard";
	}	
	
	
		function get_text()
	{			  
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}

	
		function put_text($text)
	{
		$params = array( "text" => $text );
		return $this->call_boolean(__FUNCTION__,$params);
	}
		function put_html($html, $url = "")
	{
		$params = array( "html" => $html , "url" => $url);
		return $this->call_boolean(__FUNCTION__,$params);
	}

	};	
?>