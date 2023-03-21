<?php

namespace Xhe;

class XheTH  extends XheBaseDOMVisual
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Th";
	}
	};		
?>