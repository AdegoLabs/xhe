<?php

namespace Xhe;

class XheStrong  extends XheBaseDOMVisual
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Strong";
	}
	};		
?>