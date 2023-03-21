<?php

namespace Xhe;

class XheTR  extends XheBaseDOMVisual
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Tr";
	}
	};		
?>