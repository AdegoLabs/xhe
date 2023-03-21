<?php

namespace Xhe;

class XheHiddenInput extends XheInputCompatible {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "HiddenInput";
	}
	};		
?>