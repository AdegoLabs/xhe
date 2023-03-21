<?php

namespace Xhe;

class XheMeta  extends XheBaseDOMVisual
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Meta";
	}
	};		
?>