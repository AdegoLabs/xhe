<?php

namespace Xhe;

class XheBody extends XheBodyCompatible {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Body";
	}
	
		function disable_onunload_message($frame=-1) 
	{
		$params = array( "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	};		
?>