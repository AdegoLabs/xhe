<?php

namespace Xhe;

class XheU  extends XheBaseDOMVisual
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "U";
	}
	};		
?>