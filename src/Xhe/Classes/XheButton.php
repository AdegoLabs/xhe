<?php

namespace Xhe;

class XheButton extends XheButtonCompatible {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Button";
	}
        };	
?>