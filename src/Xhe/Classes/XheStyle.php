<?php

namespace Xhe;

class XheStyle  extends XheBaseDOMVisual
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Style";
	}
	};		
?>