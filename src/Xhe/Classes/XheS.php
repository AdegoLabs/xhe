<?php

namespace Xhe;

class XheS  extends XheBaseDOMVisual
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "S";
	}
	};		
?>